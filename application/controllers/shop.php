<?php
if (isset (User::userData()->username))
{
    $user = User::userData()->username;
}
else
{
    $user = null;
}

echo $twig->render('shop.view.php', array(
    'user'      => $user,
));