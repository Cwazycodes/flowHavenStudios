<?php

use Core\App;
use Core\Database;

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

$input = json_decode(file_get_contents('php://input'), true);
$userId = $input['user_id'] ?? null;

if (!$userId) {
    echo json_encode(['success' => false, 'message' => 'user id required']);
    exit;
}

// Don't allow deactivating yourself
if ($userId == auth()['id']) {
    echo json_encode(['success' => false, 'message' => 'cannot deactivate your own account']);
    exit;
}

try {
    $db = App::resolve(Database::class);
    
    // Check if user exists
    $user = $db->query("SELECT id, role FROM users WHERE id = :id", ['id' => $userId])->find();
    
    if (!$user) {
        echo json_encode(['success' => false, 'message' => 'user not found']);
        exit;
    }
    
    // Deactivate user
    $db->query("
        UPDATE users 
        SET status = 'inactive' 
        WHERE id = :user_id
    ", ['user_id' => $userId]);
    
    // If it's an instructor, cancel all their future slots
    if ($user['role'] === 'instructor') {
        $db->query("
            UPDATE class_slots 
            SET status = 'cancelled' 
            WHERE instructor_id = :instructor_id AND start_time > NOW() AND status = 'scheduled'
        ", ['instructor_id' => $userId]);
        
        // Cancel all bookings for those slots
        $db->query("
            UPDATE bookings b
            JOIN class_slots cs ON b.slot_id = cs.id
            SET b.status = 'cancelled', b.cancelled_at = NOW(), b.cancelled_by = :admin_id
            WHERE cs.instructor_id = :instructor_id AND cs.start_time > NOW() AND b.status = 'confirmed'
        ", [
            'instructor_id' => $userId,
            'admin_id' => auth()['id']
        ]);
    }
    
    echo json_encode(['success' => true]);
    
} catch (Exception $e) {
    error_log("Deactivate user error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'failed to deactivate user']);
}