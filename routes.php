<?php
// Simplified routes.php

// Public routes
$router->get('/', 'index.php');
$router->get('/instructors', 'instructors.php');
$router->get('/faq', 'faq.php');

// Admin password check
$router->post('/admin/login', 'admin/password-check.php');

// Admin dashboard (protected by session check)
$router->get('/admin/dashboard', 'admin/dashboard.php');

// Admin logout
$router->get('/admin/logout', 'admin/logout.php');

?>