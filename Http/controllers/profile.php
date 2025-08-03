<?php

use Core\App;
use Core\Database;
use Core\User;

// Ensure user is authenticated
if (!isAuthenticated()) {
    redirect('/');
    exit;
}

$userModel = new User();
$userId = auth()['id'];
$userRole = auth()['role'];

try {
    // Get user profile with role-specific details
    $user_profile = $userModel->getUserWithProfile($userId);
    
    if (!$user_profile) {
        redirect('/');
        exit;
    }
    
    // Redirect to appropriate dashboard instead of showing generic profile
    if ($userRole === 'admin') {
        redirect('/admin/dashboard');
    } elseif ($userRole === 'instructor') {
        redirect('/instructor/dashboard');
    } elseif ($userRole === 'student') {
        redirect('/student/dashboard');
    } else {
        redirect('/');
    }
    
} catch (Exception $e) {
    error_log("Profile controller error: " . $e->getMessage());
    redirect('/');
}