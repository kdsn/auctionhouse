<?php

$user = User::userData()->username;

$order = QB::table('ORDER')->select('*')->get();

echo $twig->render('admin.orderlist.view.php', array(
    'user'      => $user,
    'orders'  => $order
));