<?php
// Updated routes.php

// Public routes
$router->get('/', 'index.php');

// API routes
$router->get('/api/locations', 'api/locations.php');

// Authentication routes
$router->post('/auth/login', 'auth/login.php');
$router->post('/auth/register', 'auth/register.php');
$router->post('/auth/forgot-password', 'auth/forgot-password.php');
$router->post('/auth/reset-password', 'auth/reset-password.php');
$router->get('/reset-password', 'reset-password.php');
$router->get('/auth/logout', 'auth/logout.php');

// Admin routes
$router->get('/admin/dashboard', 'admin/dashboard.php')->only('admin');
$router->get('/admin/users', 'admin/users.php')->only('admin');
$router->get('/admin/instructors', 'admin/instructors.php')->only('admin');
$router->post('/admin/create-instructor', 'admin/create-instructor.php')->only('admin');
$router->post('/admin/cancel-booking', 'admin/cancel-booking.php')->only('admin');
$router->post('/admin/deactivate-user', 'admin/deactivate-user.php')->only('admin');
$router->post('/admin/upload-profile-image', 'upload-profile-image.php')->only('admin');

// Instructor routes
$router->get('/instructor/dashboard', 'instructor/dashboard.php')->only('instructor');
$router->get('/instructor/classes', 'instructor/classes.php')->only('instructor');
$router->get('/instructor/calendar-data', 'instructor/calendar-data.php')->only('instructor');
$router->post('/instructor/create-slot', 'instructor/create-slot.php')->only('instructor');
$router->post('/instructor/cancel-slot', 'instructor/cancel-slot.php')->only('instructor');
$router->post('/instructor/update-profile', 'instructor/update-profile.php')->only('instructor');
$router->post('/instructor/upload-profile-image', 'upload-profile-image.php')->only('instructor');

// Student routes
$router->get('/student/dashboard', 'student/dashboard.php')->only('student');
$router->get('/student/bookings', 'student/bookings.php')->only('student');
$router->post('/student/book-class', 'student/book-class.php')->only('student');
$router->post('/student/cancel-booking', 'student/cancel-booking.php')->only('student');
$router->post('/student/update-profile', 'student/update-profile.php')->only('student');
$router->post('/student/upload-profile-image', 'upload-profile-image.php')->only('student');

// General authenticated routes
$router->get('/profile', 'profile.php')->only('auth');

?>