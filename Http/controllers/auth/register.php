<?php

use Core\Authenticator;
use Core\Validator;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Collect form data
$userData = [
    'first_name' => $_POST['first_name'] ?? '',
    'last_name' => $_POST['last_name'] ?? '',
    'email' => $_POST['email'] ?? '',
    'phone' => $_POST['phone'] ?? '',
    'password' => $_POST['password'] ?? '',
    'role' => $_POST['role'] ?? 'student',
    // Student-specific fields
    'fitness_level' => $_POST['fitness_level'] ?? 'beginner',
    'emergency_contact_name' => $_POST['emergency_contact_name'] ?? '',
    'emergency_contact_phone' => $_POST['emergency_contact_phone'] ?? '',
    'medical_conditions' => $_POST['medical_conditions'] ?? '',
    'marketing_consent' => isset($_POST['marketing_consent']) ? true : false
];

// Validate required fields
$errors = [];

if (!Validator::string($userData['first_name'], 1, 100)) {
    $errors['first_name'] = 'First name is required and must be less than 100 characters';
}

if (!Validator::string($userData['last_name'], 1, 100)) {
    $errors['last_name'] = 'Last name is required and must be less than 100 characters';
}

if (!Validator::email($userData['email'])) {
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($userData['password'], 6)) {
    $errors['password'] = 'Password must be at least 6 characters long';
}

// Validate role (only allow student for public registration)
if (!in_array($userData['role'], ['student'])) {
    $userData['role'] = 'student';
}

if (!empty($errors)) {
    echo json_encode(['success' => false, 'message' => 'Validation failed', 'errors' => $errors]);
    exit;
}

$auth = new Authenticator();
$result = $auth->register($userData);

if ($result['success']) {
    echo json_encode([
        'success' => true, 
        'message' => 'Account created successfully! Please sign in to continue.',
        'user_id' => $result['user_id']
    ]);
} else {
    echo json_encode(['success' => false, 'message' => $result['message']]);
}
