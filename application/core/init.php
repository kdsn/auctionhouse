<?php
session_start();

require '../application/core/functions.php';

/** @noinspection PhpIncludeInspection */
App::bind('config', require '../application/core/config.php');

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));

$loader = new Twig_Loader_Filesystem('../application/views');
$twig = new Twig_Environment($loader);

// Create a connection, once only.
$pc = array(
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

new \Pixie\Connection('mysql', $pc, 'QB');
