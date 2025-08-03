<?php

use Core\App;
use Core\Database;
use Core\Validator;

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

$firstName = $_POST['first_name'] ?? '';
$lastName = $_POST['last_name'] ?? '';
$phone = $_POST['phone'] ?? '';
$fitnessLevel = $_POST['fitness_level'] ?? 'beginner';
$emergencyContactName = $_POST['emergency_contact_name'] ?? '';
$emergencyContactPhone = $_POST['emergency_contact_phone'] ?? '';
$medicalConditions = $_POST['medical_conditions'] ?? '';
$marketingConsent = isset($_POST['marketing_consent']) ? 1 : 0;

// Validate required fields
if (!Validator::string($firstName, 1, 100) || !Validator::string($lastName, 1, 100)) {
    echo json_encode(['success' => false, 'message' => 'first and last name are required']);
    exit;
}

if (!in_array($fitnessLevel, ['beginner', 'intermediate', 'advanced'])) {
    $fitnessLevel = 'beginner';
}

try {
    $db = App::resolve(Database::class);
    $studentId = auth()['id'];
    
    // Update user basic info
    $db->query("
        UPDATE users 
        SET first_name = :first_name, last_name = :last_name, phone = :phone
        WHERE id = :user_id
    ", [
        'first_name' => $firstName,
        'last_name' => $lastName,
        'phone' => $phone,
        'user_id' => $studentId
    ]);
    
    // Update student profile
    $db->query("
        UPDATE student_profiles 
        SET fitness_level = :fitness_level, emergency_contact_name = :emergency_contact_name, 
            emergency_contact_phone = :emergency_contact_phone, medical_conditions = :medical_conditions,
            marketing_consent = :marketing_consent
        WHERE user_id = :user_id
    ", [
        'fitness_level' => $fitnessLevel,
        'emergency_contact_name' => $emergencyContactName,
        'emergency_contact_phone' => $emergencyContactPhone,
        'medical_conditions' => $medicalConditions,
        'marketing_consent' => $marketingConsent,
        'user_id' => $studentId
    ]);
    
    echo json_encode(['success' => true]);
    
} catch (Exception $e) {
    error_log("Update student profile error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'failed to update profile']);
}