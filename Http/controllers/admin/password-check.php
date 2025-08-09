<?php

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'method not allowed']);
    exit;
}

$password = $_POST['password'] ?? '';

// Check if password matches
if ($password === 'BethnalGreen') {
    // Set session to remember admin is logged in
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['login_time'] = time();
    
    echo json_encode([
        'success' => true, 
        'message' => 'access granted'
    ]);
} else {
    echo json_encode([
        'success' => false, 
        'message' => 'incorrect password'
    ]);
}