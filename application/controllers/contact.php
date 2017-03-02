<?php
if (isset (User::userData()->user))
{
    $user = User::userData()->user;
}
else
{
    $user = null;
}

echo $twig->render('contact.view.php', array(
    'user'      => $user,
));