<?php

use Core\App;
use Core\Database;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'method not allowed']);
    exit;
}

// Check instructor permission
if (!isInstructor() && !isAdmin()) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'access denied']);
    exit;
}

$bio = $_POST['bio'] ?? '';
$specializations = $_POST['specializations'] ?? '';
$certifications = $_POST['certifications'] ?? '';
$instagramHandle = $_POST['instagram_handle'] ?? '';

try {
    $db = App::resolve(Database::class);
    $instructorId = auth()['id'];
    
    // Update instructor profile
    $db->query("
        UPDATE instructor_profiles 
        SET bio = :bio, specializations = :specializations, certifications = :certifications, instagram_handle = :instagram_handle
        WHERE user_id = :user_id
    ", [
        'bio' => $bio,
        'specializations' => $specializations,
        'certifications' => $certifications,
        'instagram_handle' => $instagramHandle,
        'user_id' => $instructorId
    ]);
    
    echo json_encode(['success' => true]);
    
} catch (Exception $e) {
    error_log("Update instructor profile error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'failed to update profile']);
}