<?php

use Core\PasswordReset;
use Core\Validator;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'method not allowed']);
    exit;
}

$token = $_POST['token'] ?? '';
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';

// validate inputs
if (empty($token)) {
    echo json_encode(['success' => false, 'message' => 'invalid reset token']);
    exit;
}

if (!Validator::string($password, 6)) {
    echo json_encode(['success' => false, 'message' => 'password must be at least 6 characters long']);
    exit;
}

if ($password !== $confirmPassword) {
    echo json_encode(['success' => false, 'message' => 'passwords do not match']);
    exit;
}

$passwordReset = new PasswordReset();

try {
    // verify token
    $resetRequest = $passwordReset->verifyToken($token);
    
    if (!$resetRequest) {
        echo json_encode(['success' => false, 'message' => 'invalid or expired reset token']);
        exit;
    }
    
    // update password
    $passwordReset->updatePassword($resetRequest['email'], $password);
    
    // mark token as used
    $passwordReset->useToken($token);
    
    echo json_encode([
        'success' => true,
        'message' => 'password updated successfully! you can now sign in with your new password.'
    ]);
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'an error occurred. please try again.'
    ]);
}