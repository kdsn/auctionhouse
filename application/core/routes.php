<?php

// Offentlige routes, uden begrænsninger.
$router->get('', '../application/controllers/default.php');
$router->get('auktioner', '../application/controllers/auctionList.php');
$router->get('auktion', '../application/controllers/auction.php');
$router->get('shop', '../application/controllers/shop.php');
$router->get('kontakt', '../application/controllers/contact.php');

$router->post('login', '../application/controllers/login.php');

// router der kræver man ikke er logget ind.
if (!User::permissions('user') && !User::permissions('staff') && !User::permissions('admin'))
{
    $router->get('login', '../application/controllers/login.php');
    $router->get('recover', '../application/controllers/login.php');


    $router->post('recover', '../application/controllers/login.php');
}

// Private router, der kræver loign.
if (User::permissions('user') || User::permissions('staff') || User::permissions('admin'))
{
    $router->get('profil', '../application/controllers/profile.php');
    $router->get('logout', '../application/controllers/login.php');

    $router->post('profil', '../application/controllers/profile.php');
}

// Private router, der kræver staff eller admin rettighed.
if (User::permissions('staff') || User::permissions('admin'))
{
    $router->get('admin', '../application/controllers/adminDashboard.php');
}


// Private router, der kræver admin rettighed.
if (User::permissions('admin'))
{
    $router->get('test', '../application/controllers/adminDashboard.php');
}

// Fejl router.
$router->get('403', '../application/controllers/errors.php');
$router->get('404', '../application/controllers/errors.php');
