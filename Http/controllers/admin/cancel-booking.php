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

// Check admin permission
if (!isAdmin()) {
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
    
    // Get booking details before cancellation
    $booking = $db->query("
        SELECT b.*, u.first_name, u.last_name, u.email, cs.start_time, cs.end_time,
               CONCAT(iu.first_name, ' ', iu.last_name) as instructor_name
        FROM bookings b
        JOIN users u ON b.student_id = u.id
        JOIN class_slots cs ON b.slot_id = cs.id
        JOIN users iu ON cs.instructor_id = iu.id
        WHERE b.id = :booking_id
    ", ['booking_id' => $bookingId])->find();
    
    if (!$booking) {
        echo json_encode(['success' => false, 'message' => 'booking not found']);
        exit;
    }
    
    // Cancel the booking
    $db->query("
        UPDATE bookings 
        SET status = 'cancelled', cancelled_at = NOW(), cancelled_by = :admin_id 
        WHERE id = :booking_id
    ", [
        'booking_id' => $bookingId,
        'admin_id' => auth()['id']
    ]);
    
    // Send cancellation email to student
    $emailService = new EmailService();
    $emailService->sendBookingCancellationEmail(
        $booking['email'], 
        $booking['first_name'],
        $booking['instructor_name'],
        $booking['start_time']
    );
    
    echo json_encode(['success' => true]);
    
} catch (Exception $e) {
    error_log("Cancel booking error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'failed to cancel booking']);
}