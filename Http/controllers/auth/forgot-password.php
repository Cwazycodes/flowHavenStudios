<?php

use Core\PasswordReset;
use Core\Validator;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'method not allowed']);
    exit;
}

$email = $_POST['email'] ?? '';

// validate email
if (!Validator::email($email)) {
    echo json_encode(['success' => false, 'message' => 'please provide a valid email address']);
    exit;
}

$passwordReset = new PasswordReset();

// check if email exists
if (!$passwordReset->emailExists($email)) {
    // for security, we don't reveal if email exists or not
    echo json_encode([
        'success' => true, 
        'message' => 'if an account with that email exists, you will receive password reset instructions.'
    ]);
    exit;
}

try {
    // create reset token
    $token = $passwordReset->createResetToken($email);
    
    // in a real application, you would send an email here
    // for now, we'll just log it or return it for testing
    // TODO: implement email sending
    
    // for development/testing, you could log the reset link:
    error_log("password reset link: " . "http://localhost:8000/reset-password?token=" . $token);
    
    echo json_encode([
        'success' => true,
        'message' => 'if an account with that email exists, you will receive password reset instructions.',
        // remove this in production:
        'debug_reset_link' => "http://localhost:8000/reset-password?token=" . $token
    ]);
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'an error occurred. please try again.'
    ]);
}