<?php
if (isset (User::userData()->username))
{
    $user = User::userData()->username;
}
else
{
    $user = null;
}

$query = QB::table('AUCTION')->select('*')->orderBy('created_at', 'ASC');

$data = $query->get();

echo $twig->render('auction.view.php', array(
    'user'      => $user,
    'data'      => $data
));