<?php
if (isset (User::userData()->username))
{
    $user = User::userData()->username;
}
else
{
    $user = null;
}

echo $twig->render('auction.view.php', array(
    'user'      => $user,
));