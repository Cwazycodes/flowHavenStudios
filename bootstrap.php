<?php

use Core\App;
use Core\Container;
use Core\Database;

$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

$container = new Container();

$container->bind('Core\Database', function () {
    $config = require base_path('config.php');

    return new Database($config['database']);
});

App::setContainer($container);