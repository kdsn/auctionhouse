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
