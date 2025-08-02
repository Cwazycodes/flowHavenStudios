<?php

use Core\App;
use Core\Container;
use Core\Database;
use Core\User;
use Core\Location;

$container = new Container();

$container->bind('Core\Database', function () {
    $config = require base_path('config.php');

    return new Database($config['database']);
});

$container->bind('Core\User', function () {
    return new User();
});

$container->bind('Core\Location', function () {
    return new Location();
});

App::setContainer($container);


