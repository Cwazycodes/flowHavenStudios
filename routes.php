<?php
// Simplified routes.php

// Public routes
$router->get('/', 'index.php');
$router->get('/instructors', 'instructors.php');
$router->get('/faq', 'faq.php');

// Admin routes
$router->post('/admin/login', 'admin/password-check.php');
$router->get('/admin/dashboard', 'admin/dashboard.php');
$router->get('/admin/logout', 'admin/logout.php');
$router->post('/admin/cancel', 'admin/cancel.php');
$router->post('/admin/create-slot', 'admin/create-slot.php');
$router->post('/admin/edit-slot', 'admin/edit-slot.php');
$router->post('/admin/delete-slot', 'admin/delete-slot.php');

// Booking routes
$router->get('/book', 'bookings/index.php');
$router->get('/book/slot', 'bookings/slot.php');
$router->post('/book/start', 'bookings/start.php');
$router->get('/book/confirm', 'bookings/confirm.php');

// t&c
$router->get('/termsandconditions', 'termsandconditions.php');
?>