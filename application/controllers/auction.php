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

dd($query);

echo $twig->render('auction.view.php', array(
    'user'      => $user,
    'data'      => $data
));