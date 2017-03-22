<?php

// Offentlige routes, uden begrænsninger.
$router->get('', '../application/controllers/default.php');
$router->get('auktioner', '../application/controllers/auctionList.php');
$router->get('auktion', '../application/controllers/auction.php');
$router->get('shop', '../application/controllers/shop.php');
$router->get('produkter', '../application/controllers/products.php');
$router->get('kontakt', '../application/controllers/contact.php');
$router->get('kurv', '../application/controllers/cart.php');


$router->post('login', '../application/controllers/login.php');
$router->post('produkter', '../application/controllers/products.php');
$router->post('kurv', '../application/controllers/cart.php');

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

    $router->post('auktion', '../application/controllers/auction.php');
}

// Private router, der kræver staff eller admin rettighed.
if (User::permissions('staff') || User::permissions('admin'))
{
    $router->get('admin', '../application/controllers/adminDashboard.php');
    $router->get('deleteAuction', '../application/controllers/deleteAuction.php');
    $router->get('createAuction','../application/controllers/createAuction.php');
    $router->post('createAuction','../application/controllers/createAuction.php');
    $router->post('deleteAuctionImage','../application/controllers/deleteAuctionImage.php');
}


// Private router, der kræver admin rettighed.
if (User::permissions('admin'))
{
    $router->get('test', '../application/controllers/adminDashboard.php');
}

// Fejl router.
$router->get('403', '../application/controllers/errors.php');
$router->get('404', '../application/controllers/errors.php');
