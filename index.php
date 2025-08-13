<?php
// This file should be placed in the root directory
// Move the contents of public/index.php here and update paths

use Core\Session;
use Core\ValidationException;

session_start();

const BASE_PATH = __DIR__.'/';

require BASE_PATH.'Core/functions.php';

// Load Composer autoloader first
require BASE_PATH.'vendor/autoload.php';

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require BASE_PATH."{$class}.php";
});

require BASE_PATH.'bootstrap.php';

$router = new \Core\Router();
$routes = require BASE_PATH.'routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    return redirect($router->previousUrl());
}

Session::unflash();