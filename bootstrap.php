<?php

use Core\App;
use Core\Container;
use Core\Database;
use Core\User;
use Core\Location;
use Core\PasswordReset;

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

$container->bind('Core\PasswordReset', function () {
    return new PasswordReset();
});

App::setContainer($container);


