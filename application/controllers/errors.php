<?php

if (isset (User::userData()->user))
{
    $user = User::userData()->user;
}
else
{
    $user = null;
}

$error = trim($_SERVER['REQUEST_URI'], '/');
$filename = "../application/views/error/$error.view.php";


if (file_exists($filename))
{
    echo $twig->render("error/$error.view.php", array(
        'user'  => $user
    ));
}
else
{

    echo $twig->render("error/404.view.php", array(
        'user'  => $user
    ));
}