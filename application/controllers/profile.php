<?php

if (isset (User::userData()->username))
{
    $user = User::userData()->username;
}
else
{
    $user = null;
}

$user_id = Session::get(App::get('config')['session']['session_name']);

$user_info = App::get('database')->selectWhere(
    'USER_INFO', 'user_id', $user_id
);

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if (Token::check($_POST['token']))
    {
        $_token = Token::generate();

        $validate = new Validate();
        $validation = $validate->check(
            $_POST, [
            'zip'       =>[
                'name'      => 'Post nummer',
                'min'       => 3,
                'max'       => 4,
            ]

        ]);

        if ($validation->passed())
        {

            $user = new User();

            $user->updateUser([
                'f_name'  => filter_var(trim($_POST['f_name']), FILTER_SANITIZE_STRING),
                'l_name'  => filter_var(trim($_POST['l_name']), FILTER_SANITIZE_STRING),
                'address'  => filter_var(trim($_POST['address']), FILTER_SANITIZE_STRING),
                'zip'  => filter_var(trim($_POST['zip']), FILTER_SANITIZE_NUMBER_INT),
                'city'  => filter_var(trim($_POST['city']), FILTER_SANITIZE_STRING),
                'email' => filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL),
                'phone' => filter_var(trim($_POST['phone']), FILTER_SANITIZE_NUMBER_INT)
            ]);

            Redirect::to('profil');

        }
        else
        {
            echo $twig->render('profile.view.php', array(
                'user'      => $user,
                'f_name'    => $user_info[0]->first_name,
                'l_name'    => $user_info[0]->last_name,
                'address'   => $user_info[0]->address,
                'zip'       => $user_info[0]->zip,
                'city'      => $user_info[0]->city,
                'email'     => $user_info[0]->email,
                'phone'     => $user_info[0]->phone,
                'token'     => $_token
            ));
        }
    }
    else
    {
        Redirect::to('403');
    }
}
else
{

    $_token = Token::generate();

    echo $twig->render('profile.view.php', array(
        'user'      => $user,
        'f_name'    => $user_info[0]->first_name,
        'l_name'    => $user_info[0]->last_name,
        'address'   => $user_info[0]->address,
        'zip'       => $user_info[0]->zip,
        'city'      => $user_info[0]->city,
        'email'     => $user_info[0]->email,
        'phone'     => $user_info[0]->phone,
        'token'     => $_token
    ));

}