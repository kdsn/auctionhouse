<?php
if (isset (User::userData()->username))
{
    $user = User::userData()->username;
}
else
{
    $user = null;
}

echo $twig->render('home.view.php', array(
    'user'      => $user,
));