<?php

class User
{
    // create user
    public static function create($fields = [])
    {
        $hashed = password_hash($fields['password'], PASSWORD_BCRYPT, [App::get('config')['hashing']['cost']]);

        App::get('database')->insert('USER', [
            'username'      => $fields['user'],
            'password'  => $hashed
        ]);

        $last_id = App::get('database')->last_id();

        App::get('database')->insert('USER_INFO', [
            'user_id'   => $last_id,
            'email'     => $fields['email']
        ]);

        Session::put(App::get('config')['session']['session_name'], $last_id . ":" . crc32('user'));
    }

    public static function updateUser($fields = [])
    {
        $user = explode(":", $_SESSION['user']);
        $user = $user[0];

        $data = array(
            'first_name'    => $fields['f_name'],
            'last_name'     => $fields['l_name'],
            'address'       => $fields['address'],
            'zip'           => $fields['zip'],
            'city'          => $fields['city'],
            'email'         => $fields['email'],
            'phone'         => $fields['phone']
        );

        QB::table('USER_INFO')->where('user_id', $user)->update($data);
    }

    public static function updatePass($fields = [])
    {
        //update db

        $hashed = password_hash($fields['password'], PASSWORD_BCRYPT, [App::get('config')['hashing']['cost']]);

        if(User::lostPass() || User::isUser())
        {
            if(User::lostPass()) {
                $mail = $_REQUEST['mail'];
                $user = QB::table('USER_INFO')->where('email', $mail)->get();

                $data = array(
                    'password' => $hashed,
                    'recover_hash' => null
                );

                QB::table('USER')->where('id', $user[0]->user_id)->update($data);


                $user = QB::table('USER')->where('id', $user[0]->user_id)->get();

                Session::put(App::get('config')['session']['session_name'], $user[0]->id . ":" . crc32($user[0]->permissions));
            }
        }
        else
        {
            Redirect::to('403');
        }
    }

    public static function lostPass()
    {
        $mail = $_REQUEST['mail'];
        $hash = $_REQUEST['recover_hash'];

        $user = QB::table('USER_INFO')->where('email', $mail)->get();

        if (QB::table('USER_INFO')->where('email', $mail)->count() == 1) {
            $user = QB::table('USER')->where('id', $user[0]->user_id)->get();

            $dbt = strtotime($user[0]->updated_at);
            $now = strtotime(date("Y-m-d H:i:s"));
            $time = round(($now - $dbt) / 60,0);

            return $user[0]->recover_hash == $hash && $time < 30 ? true : false;
        }
        else
        {
            return false;
        }
    }

    public static function recoverPass($fields = [])
    {
        $recover_hash = randomHash(128, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $mail = $fields['email'];

        $user = QB::table('USER_INFO')->where('email', $mail)->get();
        $id = $user[0]->user_id;
        $name = $user[0]->first_name ? $user[0]->first_name : "";

        $data = array(
            'recover_hash'    => $recover_hash
        );

        QB::table('USER')->where('id', $id)->update($data);

        $adr = $_SERVER['HTTP_HOST'];
        $recover_hash = urlencode($recover_hash);
        $link = "$adr/recover?mail=$mail&recover_hash=$recover_hash";

        $subject = "Re. Genskab Adgangskode til $adr";
        $body = "Hej $name <p>Du kan følge dette link for at genskabe din kode: <a href='$link'>$link</a></p>";
        $altBody = "Hej $name, Du kan kopiere følgende link og sætte det i adresse feltet i din browser for at genskabe din kode. $link";

        Mailer::send($fields['email'], $subject, $body, $altBody) ? "Der er nu sendt en mail med link til at genskabe din kode" : "Der opstod en fejl";
    }

    // log user in
    public static function login($fields = [])
    {
        $username = $fields['username'];
        $password = $fields['password'];
        $remember = $fields['remember'];

        $user = QB::table('USER')->where('username', $username)->get();

        $hash = $user[0]->password;
        $id = $user[0]->id;

        if (password_verify($password, $hash))
        {

            if (password_needs_rehash($hash, PASSWORD_DEFAULT, [App::get('config')['hashing']['cost']]))
            {
                $newHash = password_hash($fields['password'], PASSWORD_DEFAULT, [App::get('config')['hashing']['cost']]);

                $data = array(
                    'password'    => $newHash
                );

                QB::table('USER')->where('id', $id)->update($data);
            }

            if ($remember === true)
            {
                $remember_identifier = randomHash(128);
                $remember_token = randomHash(128);

                $data = array(
                    'user_id'               => $id,
                    'remember_identifier'   => $remember_identifier,
                    'remember_token'        => hash('whirlpool', $remember_token)
                );
                QB::table('USER_HASH')->insert($data);

                Cookie::put(
                    App::get('config')['auth']['cookie_name'],
                    "{$remember_identifier}___{$remember_token}",
                    App::get('config')['auth']['cookie_expiry']
                );
            }

            Session::put(App::get('config')['session']['session_name'], $id . ":" . crc32($user[0]->permissions));
            Redirect::to('#');
        }
        else
        {
            $_SESSION['error'] = "Brugernavn og adgangskode er ikke et match.";
        }

    }

    // Remember user
    public static function cookieLogin()
    {
        $data = Cookie::get(App::get('config')['auth']['cookie_name']);
        $credentials = explode('___' , $data);

        if(empty(trim($data)) || count($credentials) !== 2)
        {
            Cookie::delete(App::get('config')['auth']['cookie_name']);
            Redirect::to('#');
        }
        else
        {
            $identifier = $credentials[0];
            $token = $credentials[1];

            $user = QB::table('USER_HASH')->select('*')->where('remember_identifier', '=', $identifier)->get();

            if ($user && hashCheck('whirlpool', $user[0]->remember_token, $token))
            {
                // Opdater databasen så vi kan rydde op i ikke længere aktive cookies
                $data = array(
                    'updated_at' => date("Y-m-d H:i:s")
                );
                QB::table('USER_HASH')->where('user_id', $user[0]->user_id)->update($data);

                // Fornyer cookie udløb
                Cookie::put(
                    App::get('config')['auth']['cookie_name'],
                    "{$identifier}___{$token}",
                    App::get('config')['auth']['cookie_expiry']
                );

                $user = QB::table('USER')->select('*')->where('id', '=', $user[0]->user_id)->get();
                Session::put(App::get('config')['session']['session_name'], $user[0]->id . ":" . crc32($user[0]->permissions));
            }
            else
            {
                QB::table('USER_HASH')->where('remember_identifier', '=', $identifier)->delete();
                Cookie::delete(App::get('config')['auth']['cookie_name']);
                Redirect::to('#');
            }

        }
    }

    // user data
    public static function userData()
    {
        if (isset($_SESSION['user']))
        {
            $user = explode(":", $_SESSION['user']);
            $user = $user[0];

            $userData = QB::table('USER')->where('id', $user)->get();

            $userData = $userData[0];
            return $userData;
        }
    }

    public static function userInfo()
    {
        if (isset($_SESSION['user']))
        {
            $user = explode(":", $_SESSION['user']);
            $user = $user[0];

            $userInfo = QB::table('USER_INFO')->where('user_id', $user)->get();

            $userInfo = $userInfo[0];
            return $userInfo;
        }
    }

    // list users


    // log user out
    public static function logout()
    {
        Session::delete(App::get('config')['session']['session_name']);
        Cookie::delete(App::get('config')['auth']['cookie_name']);
        Redirect::to('#');
    }

    // user id
    public static function id()
    {
        if (isset($_SESSION['user']))
        {
            $user = explode(":", $_SESSION['user']);
            return $user[0];
        }
        else
        {
            return null;
        }
    }

    // user permissions
    public static function permissions($rights)
    {
        $rights = crc32($rights);
        if (isset($_SESSION['user']))
        {
            $user = explode(":", $_SESSION['user']);
            $user = $user[1];
        }
        else
        {
            $user = "guest";
        }

        return $rights == $user ? true : false;
    }

    // user logged in
    public static function isUser()
    {
        if (isset ($_SESSION['user']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}