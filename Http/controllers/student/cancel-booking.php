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

// Check authentication
if (!isAuthenticated()) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'access denied']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
$bookingId = $input['booking_id'] ?? null;

if (!$bookingId) {
    echo json_encode(['success' => false, 'message' => 'booking id required']);
    exit;
}

try {
    $db = App::resolve(Database::class);
    $studentId = auth()['id'];
    
    // Get booking details and verify ownership
    $booking = $db->query("
        SELECT b.*, cs.start_time, cs.end_time,
               CONCAT(iu.first_name, ' ', iu.last_name) as instructor_name
        FROM bookings b
        JOIN class_slots cs ON b.slot_id = cs.id
        JOIN users iu ON cs.instructor_id = iu.id
        WHERE b.id = :booking_id AND b.student_id = :student_id AND b.status = 'confirmed'
    ", [
        'booking_id' => $bookingId,
        'student_id' => $studentId
    ])->find();
    
    if (!$booking) {
        echo json_encode(['success' => false, 'message' => 'booking not found or already cancelled']);
        exit;
    }
    
    // Check cancellation policy (12 hours before class)
    $hoursUntilClass = (strtotime($booking['start_time']) - time()) / 3600;
    $lateCancellation = $hoursUntilClass < 12;
    
    // Cancel the booking
    $db->query("
        UPDATE bookings 
        SET status = 'cancelled', cancelled_at = NOW(), cancelled_by = :student_id 
        WHERE id = :booking_id
    ", [
        'booking_id' => $bookingId,
        'student_id' => $studentId
    ]);
    
    // Send cancellation confirmation email
    $student = $db->query("SELECT * FROM users WHERE id = :id", ['id' => $studentId])->find();
    $emailService = new EmailService();
    $emailService->sendCancellationConfirmationEmail(
        $student['email'],
        $student['first_name'],
        $booking['instructor_name'],
        $booking['start_time'],
        $lateCancellation
    );
    
    $message = $lateCancellation ? 
        'booking cancelled. note: cancellations within 12 hours may incur a late cancellation fee.' :
        'booking cancelled successfully.';
    
    echo json_encode(['success' => true, 'message' => $message]);
    
} catch (Exception $e) {
    error_log("Cancel booking error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'failed to cancel booking']);
}