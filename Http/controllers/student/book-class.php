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

// Check student permission
if (!isAuthenticated()) {
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
    $studentId = auth()['id'];
    
    // Get slot details
    $slot = $db->query("
        SELECT cs.*, CONCAT(u.first_name, ' ', u.last_name) as instructor_name,
               (SELECT COUNT(*) FROM bookings WHERE slot_id = cs.id AND status = 'confirmed') as booked_beds
        FROM class_slots cs
        JOIN users u ON cs.instructor_id = u.id
        WHERE cs.id = :slot_id AND cs.status = 'scheduled' AND cs.start_time > NOW()
    ", ['slot_id' => $slotId])->find();
    
    if (!$slot) {
        echo json_encode(['success' => false, 'message' => 'slot not available']);
        exit;
    }
    
    // Check if slot is full
    if ($slot['booked_beds'] >= $slot['available_beds']) {
        echo json_encode(['success' => false, 'message' => 'class is fully booked']);
        exit;
    }
    
    // Check if student already booked this slot
    $existingBooking = $db->query("
        SELECT id FROM bookings 
        WHERE student_id = :student_id AND slot_id = :slot_id AND status = 'confirmed'
    ", [
        'student_id' => $studentId,
        'slot_id' => $slotId
    ])->find();
    
    if ($existingBooking) {
        echo json_encode(['success' => false, 'message' => 'you have already booked this class']);
        exit;
    }
    
    // Create booking
    $db->query("
        INSERT INTO bookings (student_id, slot_id, status, payment_status, amount) 
        VALUES (:student_id, :slot_id, 'confirmed', 'paid', 25.00)
    ", [
        'student_id' => $studentId,
        'slot_id' => $slotId
    ]);
    
    // Send confirmation email
    $student = $db->query("SELECT * FROM users WHERE id = :id", ['id' => $studentId])->find();
    $emailService = new EmailService();
    $emailService->sendBookingConfirmationEmail(
        $student['email'],
        $student['first_name'],
        $slot['instructor_name'],
        $slot['start_time'],
        $slot['end_time']
    );
    
    echo json_encode(['success' => true]);
    
} catch (Exception $e) {
    error_log("Book class error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'failed to book class']);
}