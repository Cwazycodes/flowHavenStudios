<?php

use Core\App;
use Core\Database;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
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

$month = $_GET['month'] ?? '';

if (!$month || !preg_match('/^\d{4}-\d{2}$/', $month)) {
    echo json_encode(['success' => false, 'message' => 'invalid month format']);
    exit;
}

try {
    $db = App::resolve(Database::class);
    
    // Get calendar data for the requested month
    $calendarStartDate = date('Y-m-01', strtotime($month . '-01'));
    $calendarEndDate = date('Y-m-t', strtotime($calendarStartDate));
    
    // Get all slots for the calendar period (including other instructors' slots)
    $calendar_slots = $db->query("
        SELECT 
            cs.*,
            CONCAT(u.first_name, ' ', u.last_name) as instructor_name,
            u.first_name as instructor_first_name,
            u.last_name as instructor_last_name,
            COUNT(b.id) as booked_beds,
            GROUP_CONCAT(
                CONCAT(su.first_name, ' ', su.last_name, '|', su.id, '|', b.id)
                ORDER BY su.first_name SEPARATOR ';;'
            ) as student_details
        FROM class_slots cs
        JOIN users u ON cs.instructor_id = u.id
        LEFT JOIN bookings b ON cs.id = b.slot_id AND b.status = 'confirmed'
        LEFT JOIN users su ON b.student_id = su.id
        WHERE cs.start_time >= :start_date 
        AND cs.start_time <= :end_date
        AND cs.status = 'scheduled'
        GROUP BY cs.id
        ORDER BY cs.start_time ASC
    ", [
        'start_date' => $calendarStartDate,
        'end_date' => $calendarEndDate
    ])->get();
    
    // Organize slots by date for calendar rendering
    $slots_by_date = [];
    foreach ($calendar_slots as $slot) {
        $date = date('Y-m-d', strtotime($slot['start_time']));
        if (!isset($slots_by_date[$date])) {
            $slots_by_date[$date] = [];
        }
        
        // Parse student details
        $students = [];
        if (!empty($slot['student_details'])) {
            $studentParts = explode(';;', $slot['student_details']);
            foreach ($studentParts as $studentPart) {
                if (!empty($studentPart)) {
                    $parts = explode('|', $studentPart);
                    if (count($parts) >= 3) {
                        $students[] = [
                            'name' => $parts[0],
                            'student_id' => $parts[1],
                            'booking_id' => $parts[2]
                        ];
                    }
                }
            }
        }
        
        $slot['students'] = $students;
        $slots_by_date[$date][] = $slot;
    }
    
    echo json_encode([
        'success' => true,
        'slots_by_date' => $slots_by_date,
        'debug' => [
            'month' => $month,
            'start_date' => $calendarStartDate,
            'end_date' => $calendarEndDate,
            'total_slots' => count($calendar_slots)
        ]
    ]);
    
} catch (Exception $e) {
    error_log("Calendar data error: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'failed to fetch calendar data',
        'error' => $e->getMessage()
    ]);
}