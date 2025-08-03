<?php

use Core\App;
use Core\Database;
use Core\EmailService;

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

$input = json_decode(file_get_contents('php://input'), true);
$slotId = $input['slot_id'] ?? null;

if (!$slotId) {
    echo json_encode(['success' => false, 'message' => 'slot id required']);
    exit;
}

try {
    $db = App::resolve(Database::class);
    $instructorId = auth()['id'];
    
    // Get slot details and verify ownership (unless admin)
    $whereClause = isAdmin() ? "WHERE cs.id = :slot_id" : "WHERE cs.id = :slot_id AND cs.instructor_id = :instructor_id";
    $params = isAdmin() ? ['slot_id' => $slotId] : ['slot_id' => $slotId, 'instructor_id' => $instructorId];
    
    $slot = $db->query("
        SELECT cs.*, CONCAT(u.first_name, ' ', u.last_name) as instructor_name
        FROM class_slots cs
        JOIN users u ON cs.instructor_id = u.id
        " . $whereClause, $params)->find();
    
    if (!$slot) {
        echo json_encode(['success' => false, 'message' => 'slot not found or access denied']);
        exit;
    }
    
    // Get all bookings for this slot
    $bookings = $db->query("
        SELECT b.*, u.first_name, u.last_name, u.email
        FROM bookings b
        JOIN users u ON b.student_id = u.id
        WHERE b.slot_id = :slot_id AND b.status = 'confirmed'
    ", ['slot_id' => $slotId])->get();
    
    // Cancel the slot
    $db->query("
        UPDATE class_slots 
        SET status = 'cancelled' 
        WHERE id = :slot_id
    ", ['slot_id' => $slotId]);
    
    // Cancel all bookings for this slot
    $db->query("
        UPDATE bookings 
        SET status = 'cancelled', cancelled_at = NOW(), cancelled_by = :cancelled_by
        WHERE slot_id = :slot_id AND status = 'confirmed'
    ", [
        'slot_id' => $slotId,
        'cancelled_by' => auth()['id']
    ]);
    
    // Send cancellation emails to all affected students
    $emailService = new EmailService();
    foreach ($bookings as $booking) {
        $emailService->sendClassCancellationEmail(
            $booking['email'],
            $booking['first_name'],
            $slot['instructor_name'],
            $slot['start_time']
        );
    }
    
    echo json_encode(['success' => true]);
    
} catch (Exception $e) {
    error_log("Cancel slot error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'failed to cancel slot']);
}