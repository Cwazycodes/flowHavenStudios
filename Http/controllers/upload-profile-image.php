<?php

use Core\App;
use Core\Database;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'method not allowed']);
    exit;
}

// Check authentication
if (!isAuthenticated()) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'access denied']);
    exit;
}

if (!isset($_FILES['profile_image']) || $_FILES['profile_image']['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['success' => false, 'message' => 'no file uploaded or upload error']);
    exit;
}

$file = $_FILES['profile_image'];

// Validate file type
$allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
if (!in_array($file['type'], $allowedTypes)) {
    echo json_encode(['success' => false, 'message' => 'only jpg, jpeg, and png files are allowed']);
    exit;
}

// Validate file size (5MB max)
if ($file['size'] > 5 * 1024 * 1024) {
    echo json_encode(['success' => false, 'message' => 'file size must be less than 5mb']);
    exit;
}

try {
    // Create uploads directory if it doesn't exist
    $uploadDir = base_path('public/uploads/profiles/');
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    
    // Generate unique filename
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = 'profile_' . auth()['id'] . '_' . time() . '.' . $extension;
    $filepath = $uploadDir . $filename;
    $webPath = '/uploads/profiles/' . $filename;
    
    // Move uploaded file
    if (!move_uploaded_file($file['tmp_name'], $filepath)) {
        echo json_encode(['success' => false, 'message' => 'failed to save file']);
        exit;
    }
    
    // Update user's profile image in database
    $db = App::resolve(Database::class);
    $db->query("
        UPDATE users 
        SET profile_image = :profile_image 
        WHERE id = :user_id
    ", [
        'profile_image' => $webPath,
        'user_id' => auth()['id']
    ]);
    
    echo json_encode(['success' => true, 'image_url' => $webPath]);
    
} catch (Exception $e) {
    error_log("Upload profile image error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'failed to upload image']);
}
