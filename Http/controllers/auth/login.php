<?php

use Core\Authenticator;
use Core\Validator;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Validate input
if (!Validator::email($email)) {
    echo json_encode(['success' => false, 'message' => 'Please provide a valid email address']);
    exit;
}

if (!Validator::string($password)) {
    echo json_encode(['success' => false, 'message' => 'Please provide a password']);
    exit;
}

$auth = new Authenticator();

if ($auth->attempt($email, $password)) {
    $user = $auth->user();
    
    // Determine redirect based on role
    $redirect = '/';
    if ($user['role'] === 'admin') {
        $redirect = '/admin/dashboard';
    } elseif ($user['role'] === 'instructor') {
        $redirect = '/instructor/dashboard';
    } elseif ($user['role'] === 'student') {
        $redirect = '/student/dashboard';
    }
    
    echo json_encode([
        'success' => true, 
        'message' => 'Login successful',
        'redirect' => $redirect,
        'user' => [
            'name' => $user['first_name'] . ' ' . $user['last_name'],
            'role' => $user['role']
        ]
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid email or password']);
}
