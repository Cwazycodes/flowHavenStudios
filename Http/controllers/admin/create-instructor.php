<?php

use Core\Database;
use Core\User;
use Core\EmailService;
use Core\Validator;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'method not allowed']);
    exit;
}

// Check admin permission
if (!isAdmin()) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'access denied']);
    exit;
}

$userData = [
    'first_name' => $_POST['first_name'] ?? '',
    'last_name' => $_POST['last_name'] ?? '',
    'email' => $_POST['email'] ?? '',
    'phone' => $_POST['phone'] ?? '',
    'role' => 'instructor',
    'password' => bin2hex(random_bytes(8)), // Generate temporary password
    'bio' => $_POST['bio'] ?? '',
    'specializations' => $_POST['specializations'] ?? '',
    'certifications' => $_POST['certifications'] ?? '',
    'instagram_handle' => $_POST['instagram_handle'] ?? '',
    'is_featured' => isset($_POST['is_featured']) ? 1 : 0
];

// Validate required fields
$errors = [];
if (!Validator::string($userData['first_name'], 1, 100)) {
    $errors[] = 'first name is required';
}
if (!Validator::string($userData['last_name'], 1, 100)) {
    $errors[] = 'last name is required';
}
if (!Validator::email($userData['email'])) {
    $errors[] = 'valid email is required';
}

if (!empty($errors)) {
    echo json_encode(['success' => false, 'message' => implode(', ', $errors)]);
    exit;
}

try {
    $userModel = new User();
    
    // Check if email exists
    if ($userModel->emailExists($userData['email'])) {
        echo json_encode(['success' => false, 'message' => 'email already exists']);
        exit;
    }
    
    // Create user
    $userId = $userModel->create($userData);
    
    // Create instructor profile
    $userModel->createInstructorProfile($userId, $userData);
    
    // Send welcome email with temporary password
    $emailService = new EmailService();
    $emailResult = $emailService->sendInstructorWelcomeEmail($userData['email'], $userData['first_name'], $userData['password']);
    
    echo json_encode(['success' => true, 'user_id' => $userId]);
    
} catch (Exception $e) {
    error_log("Create instructor error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'failed to create instructor account']);
}