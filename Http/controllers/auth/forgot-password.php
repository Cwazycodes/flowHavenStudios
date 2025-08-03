<?php

use Core\PasswordReset;
use Core\EmailService;
use Core\User;
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
    // get user info for personalization
    $userModel = new User();
    $user = $userModel->findByEmail($email);
    $userName = $user ? $user['first_name'] : '';
    
    // create reset token
    $token = $passwordReset->createResetToken($email);
    
    // send email
    $emailService = new EmailService();
    $emailResult = $emailService->sendPasswordReset($email, $token, $userName);
    
    if ($emailResult['success']) {
        echo json_encode([
            'success' => true,
            'message' => 'password reset instructions have been sent to your email address.'
        ]);
    } else {
        // log the error but don't reveal it to user
        error_log("Password reset email failed: " . ($emailResult['error'] ?? 'unknown error'));
        echo json_encode([
            'success' => true, // still return success for security
            'message' => 'if an account with that email exists, you will receive password reset instructions.'
        ]);
    }
    
} catch (Exception $e) {
    error_log("Password reset error: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'an error occurred. please try again.'
    ]);
}