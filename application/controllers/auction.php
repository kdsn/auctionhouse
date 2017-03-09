<?php
if (isset (User::userData()->username))
{
    $user = User::userData()->username;
}
else
{
    $user = null;
}

$query = QB::table('USER')->select('*')->orderBy('created_at', 'ASC');


echo $twig->render('auction.view.php', array(
    'user'      => $user,
    'data'      => $data
));