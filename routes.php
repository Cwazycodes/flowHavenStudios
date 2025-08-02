<?php
// Updated routes.php

// Public routes
$router->get('/', 'index.php');

// API routes
$router->get('/api/locations', 'api/locations.php');

// Authentication routes
$router->post('/auth/login', 'auth/login.php');
$router->post('/auth/register', 'auth/register.php');
$router->get('/auth/logout', 'auth/logout.php');

// Admin routes
$router->get('/admin/dashboard', 'admin/dashboard.php')->only('admin');
$router->get('/admin/users', 'admin/users.php')->only('admin');
$router->get('/admin/instructors', 'admin/instructors.php')->only('admin');

// Instructor routes
$router->get('/instructor/dashboard', 'instructor/dashboard.php')->only('instructor');
$router->get('/instructor/classes', 'instructor/classes.php')->only('instructor');

// Student routes
$router->get('/student/dashboard', 'student/dashboard.php')->only('student');
$router->get('/student/bookings', 'student/bookings.php')->only('student');

// General authenticated routes
$router->get('/profile', 'profile.php')->only('auth');

?>