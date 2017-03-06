<?php

$user = User::userData()->username;

echo $twig->render('admin.dashboard.view.php', array(
    'user'      => $user,
));