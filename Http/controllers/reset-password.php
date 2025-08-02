<?php

$token = $_GET['token'] ?? '';

if (empty($token)) {
    redirect('/');
    exit;
}

// verify token exists and is valid
$passwordReset = new Core\PasswordReset();
$resetRequest = $passwordReset->verifyToken($token);

if (!$resetRequest) {
    // Token is invalid or expired
    view('auth/invalid-token.view.php', [
        'title' => 'invalid reset link',
        'activePage' => 'reset'
    ]);
    exit;
}

view('auth/reset-password.view.php', [
    'title' => 'reset password',
    'activePage' => 'reset',
    'token' => $token
]);