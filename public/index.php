<?php

require '../vendor/autoload.php';
require '../application/core/init.php';

/** @noinspection PhpIncludeInspection */
require Router::load('../application/core/routes.php')
    ->direct(Request::uri(), Request::method());