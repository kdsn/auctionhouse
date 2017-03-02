<?php

$user = User::userData()->user;

echo $twig->render('admin.dashboard.view.php', array(
    'user'      => $user,
));