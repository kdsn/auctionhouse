<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if (Token::check($_POST['token']))
    {
        $user = new User();
        $_token = Token::generate();

        if (isset($_REQUEST['mail_upd']))
        {
            $validate = new Validate();
            $validation = $validate->check(
                $_POST, [
                'email' => [
                    'name' => 'Email',
                    'required' => true,
                    'exists' => 'USER_INFO'
                ]
            ]);

            if ($validation->passed())
            {
                User::recoverPass([
                    'email' => filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL)
                ]);
            }
            else
            {
                echo $twig->render('password.view.php', array(
                    'errors' => $validation->errors(),
                    'titel' => 'Genskab adgangskode',
                    'update'    => 'mail_upd',
                    'submit' => 'Genskab',
                    'token' => $_token
                ));
            }
        }

        if (isset($_REQUEST['recover']))
        {
            $validate = new Validate();
            $validation = $validate->check(
                $_POST, [
                'new_pass' => [
                    'name' => 'Adgangskode',
                    'required' => true,
                    'min' => 8
                ],
                're_new_pass' => [
                    'name' => 'Gentag adgangskode',
                    'required' => true,
                    'matches' => 'new_pass'
                ]
            ]);

            if ($validation->passed())
            {
                $user->updatePass([
                    'password' => trim($_POST['new_pass'])
                ]);

                Redirect::to('profil');

            }
            else
            {
                echo $twig->render('password.view.php', array(
                    'errors' => $validation->errors(),
                    'titel' => 'Genskab adgangskode',
                    'update'    => 'recover',
                    'submit' => 'Genskab',
                    'token' => $_token
                ));
            }
        }

        if (isset($_REQUEST['login']))
        {

            $validate = new Validate();
            $validation = $validate->check(
                $_POST, [
                'username' => [
                    'name' => 'Brugernavn',
                    'required' => true,
                ],
                'pass' => [
                    'name' => 'Adgangskode',
                    'required' => true
                ]
            ]);

            if ($validation->passed())
            {
                $remember = (isset($_POST['remember']) && $_POST['remember'] === 'on') ? true : false;

                $user->login([
                    'username'  => filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING),
                    'password' => trim($_POST['pass']),
                    'remember' => $remember
                ]);

                if (isset($_SESSION['error']))
                {

                    echo $twig->render('login.view.php', array(
                        'errors' => $validation->errors(),
                        'error'  => $_SESSION['error'],
                        'name'   => $_POST['username'],
                        'token'  => $_token
                    ));
                    unset($_SESSION['error']);
                }
            }
            else
            {
                echo $twig->render('login.view.php', array(
                    'errors' => $validation->errors(),
                    'name' => $_POST['username'],
                    'token' => $_token
                ));
            }
        }
        if (isset($_REQUEST['register'])) {
            $validate = new Validate();
            $validation = $validate->check(
                $_POST, [
                'username' => [
                    'name' => 'Brugernavn',
                    'required' => true,
                    'min' => 2,
                    'max' => 64,
                    'unique' => 'USER'
                ],
                'email' => [
                    'name' => 'Email adresse',
                    'required' => true,
                    'min' => 6,
                    'max' => 64,
                    'unique' => 'USER_INFO'
                ],
                'Adgangskode' => [
                    'name' => 'Adgangskode',
                    'required' => true,
                    'min' => 8
                ],
                're_pass' => [
                    'name' => 'Gentag adgangskode',
                    'required' => true,
                    'matches' => 'Adgangskode'
                ]
            ]);

            if ($validation->passed())
            {

                $user->create([
                    'user'  => filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING),
                    'email' => filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL),
                    'password' => trim($_POST['Adgangskode'])
                ]);

                Redirect::to('profil');

            }
            else
            {
                echo $twig->render('login.view.php', array(
                    'errors' => $validation->errors(),
                    'username' => $_POST['username'],
                    'email' => $_POST['email'],
                    'token' => $_token
                ));
            }
        }
    }
    else
    {
        Redirect::to('403');
    }
}
else
{
    if (trim($_SERVER['REQUEST_URI'], '/') == "logout")
    {
        User::logout();
        Redirect::to('#');
    }
    elseif (trim($_SERVER['REQUEST_URI'], '/') == "recover" || stristr(trim($_SERVER['REQUEST_URI'], '/') ,"?",true) == "recover")
    {
        $_token = Token::generate();

        if (isset($_REQUEST['mail']))
        {
            if( User::lostPass() )
            {
                echo $twig->render('password.view.php', array(
                    'titel' => 'Genskab adgangskode',
                    'update'    => 'recover',
                    'submit' => 'Genskab',
                    'token' => $_token
                ));
            }
            else
            {
                echo $twig->render('password.view.php', array(
                    'error' => 'Der var en fejl, prøv igen.',
                    'titel' => 'Genskab adgangskode',
                    'update'    => 'mail_upd',
                    'submit' => 'Genskab',
                    'token' => $_token
                ));
            }
        }
        else
        {
            echo $twig->render('password.view.php', array(
                'titel' => 'Genskab adgangskode',
                'update'    => 'mail_upd',
                'submit' => 'Genskab',
                'token' => $_token
            ));
        }
    }
    else
    {
        $_token = Token::generate();

        echo $twig->render('login.view.php', array(
            'token' => $_token
        ));
    }
}