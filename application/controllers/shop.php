<?php
if (isset (User::userData()->user))
{
    $user = User::userData()->user;
}
else
{
    $user = null;
}

echo $twig->render('shop.view.php', array(
    'user'      => $user,
));