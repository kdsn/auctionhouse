<?php

if (isset (User::userData()->user))
{
    $user = User::userData()->user;
}
else
{
    $user = null;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    //
}
else
{
    $user_id = Session::get(App::get('config')['session']['session_name']);

    $user_info = App::get('database')->selectWhere(
        'users_info', 'id', $user_id
    );

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