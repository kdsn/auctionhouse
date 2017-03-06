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
    }

    public static function updateUser()
    {
        //
    }

    public static function updatePass()
    {
        //
    }

    // log user in
    public static function login($fields = [])
    {
        $username = $fields['username'];
        $fields['password'];

        $user = App::get('database')->selectWhere(
            'USER', 'username', "$username"
        );


        $password = $fields['password'];
        $hash = $user[0]->password;

        if (password_verify($password, $hash))
        {
            /*
            if (password_needs_rehash($hash, PASSWORD_DEFAULT, [App::get('config')['hashing']['cost']]))
            {
                $newHash = password_hash($fields['password'], PASSWORD_DEFAULT, [App::get('config')['hashing']['cost']]);
            }
            */
            Session::put(App::get('config')['session']['session_name'], $user[0]->id . ":" . crc32($user[0]->permissions));
            Redirect::to('#');
        }

    }

    // user data
    public static function userData()
    {
        if (isset($_SESSION['user']))
        {
            $user = explode(":", $_SESSION['user']);
            $user = $user[0];

            $userData = App::get('database')->selectWhere(
                'USER', 'id', "$user"
            );
            $userData = $userData[0];
            return $userData;
        }
    }

    // list users


    // log user out
    public static function logout()
    {
        Session::delete(App::get('config')['session']['session_name']);
        Redirect::to('#');
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