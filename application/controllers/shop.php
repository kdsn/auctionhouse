<?php
if (isset (User::userData()->username))
{
    $user = User::userData()->username;
}
else
{
    $user = null;
}

$categorys = QB::table('CATEGORY')->get();

echo $twig->render('shop.view.php', array(
    'user'      => $user,
    'categorys'  => $categorys
));