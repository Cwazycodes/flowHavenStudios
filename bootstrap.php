<?php
// Updated bootstrap.php

use Core\App;
use Core\Container;
use Core\Database;
use Core\User;

$container = new Container();

$container->bind('Core\Database', function () {
    $config = require base_path('config.php');

    return new Database($config['database']);
});

$container->bind('Core\User', function () {
    return new User();
});

App::setContainer($container);
