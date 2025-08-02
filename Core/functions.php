<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);

    require base_path("views/{$code}.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }

    return true;
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function old($key, $default = '')
{
    return Core\Session::get('old')[$key] ?? $default;
}


/**
 * Get current authenticated user
 */
function auth()
{
    return $_SESSION['user'] ?? null;
}

/**
 * Check if user is authenticated
 */
function isAuthenticated()
{
    return isset($_SESSION['user']);
}

/**
 * Check if current user has specific role
 */
function hasRole($role)
{
    return isAuthenticated() && $_SESSION['user']['role'] === $role;
}

/**
 * Check if current user is admin
 */
function isAdmin()
{
    return hasRole('admin');
}

/**
 * Check if current user is instructor
 */
function isInstructor()
{
    return hasRole('instructor');
}

/**
 * Check if current user is student
 */
function isStudent()
{
    return hasRole('student');
}

/**
 * Get user's full name
 */
function userName()
{
    $user = auth();
    return $user ? $user['first_name'] . ' ' . $user['last_name'] : '';
}
