<?php
session_start();

use \Pixie\Connection AS sql_connect;

// Fjerner deprecated warnings
error_reporting(E_ALL ^ E_DEPRECATED);

require '../application/core/functions.php';

/** @noinspection PhpIncludeInspection */
App::bind('config', require '../application/core/config.php');

//require '../application/core/braintree.php';

// skal fjernes når alle sider er genmgået for gl. qb
App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));


$loader = new Twig_Loader_Filesystem('../application/views');
$twig = new Twig_Environment($loader, array(
    'debug' => true
));

$twig->addExtension(new Twig_Extension_Debug());

// Create a connection, once only.
$db = array(
    'driver'    => 'mysql', // Db driver
    'host'      => explode("=",App::get('config')['database']['connection'])[1],
    'database'  => App::get('config')['database']['databasename'],
    'username'  => App::get('config')['database']['username'],
    'password'  => App::get('config')['database']['password'],
    'charset'   => 'utf8', // Optional
    'collation' => 'utf8_unicode_ci', // Optional
    'prefix'    => '', // Table prefix, optional
    'options'   => array( // PDO constructor options, optional
        PDO::ATTR_TIMEOUT => 5,
        PDO::ATTR_EMULATE_PREPARES => false,
    ),
);

new sql_connect('mysql', $db, 'QB');

if (isset($_COOKIE['user_r']) && ! isset($_SESSION['user']))
{
    User::cookieLogin();
}