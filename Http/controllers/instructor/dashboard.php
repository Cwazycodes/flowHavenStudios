<?php

use Core\App;
use Core\Database;
use Core\User;

// Ensure instructor access
if (!isInstructor() && !isAdmin()) {
    redirect('/');
    exit;
}

$db = App::resolve(Database::class);
$userModel = new User();
$instructorId = auth()['id'];

try {
    // Get instructor profile with user details
    $instructor_profile = $userModel->getUserWithProfile($instructorId);
    
    if (!$instructor_profile) {
        redirect('/');
        exit;
    }
    
    // Get instructor statistics
    $stats = [];
    
    // Total slots created by this instructor
    $slotStats = $db->query("
        SELECT 
            COUNT(*) as total_slots,
            SUM(CASE WHEN start_time >= DATE_SUB(NOW(), INTERVAL 7 DAY) 
                AND start_time <= DATE_ADD(NOW(), INTERVAL 7 DAY) THEN 1 ELSE 0 END) as weekly_slots,
            SUM(CASE WHEN DATE(start_time) = CURDATE() THEN 1 ELSE 0 END) as todays_classes
        FROM class_slots 
        WHERE instructor_id = :instructor_id 
        AND status = 'scheduled'
    ", ['instructor_id' => $instructorId])->find();
    
    $stats = array_merge($stats, $slotStats);
    
    // Total bookings for this instructor
    $bookingStats = $db->query("
        SELECT COUNT(b.id) as total_bookings
        FROM bookings b
        JOIN class_slots cs ON b.slot_id = cs.id
        WHERE cs.instructor_id = :instructor_id 
        AND b.status = 'confirmed'
    ", ['instructor_id' => $instructorId])->find();
    
    $stats['total_bookings'] = $bookingStats['total_bookings'];
    
    // Get current month and year for calendar
    $currentMonth = date('Y-m');
    $currentYear = date('Y');
    $currentMonthNum = date('n');
    
    // Get calendar data for current month only (not next month)
    $calendarStartDate = date('Y-m-01', strtotime($currentMonth . '-01'));
    $calendarEndDate = date('Y-m-t', strtotime($currentMonth . '-01')); // Changed this line
    
    // Debug: Add some logging to see what we're fetching
    error_log("Calendar date range: " . $calendarStartDate . " to " . $calendarEndDate);
    
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
    
    // Debug: Log the slots data structure
    error_log("Slots by date count: " . count($slots_by_date));
    error_log("Slots by date keys: " . implode(', ', array_keys($slots_by_date)));
    
    // Get recent bookings for this instructor's classes
    $recent_bookings = $db->query("
        SELECT 
            b.*,
            cs.start_time,
            cs.end_time,
            cs.class_type,
            CONCAT(u.first_name, ' ', u.last_name) as student_name,
            u.email as student_email
        FROM bookings b
        JOIN class_slots cs ON b.slot_id = cs.id
        JOIN users u ON b.student_id = u.id
        WHERE cs.instructor_id = :instructor_id
        AND b.created_at >= DATE_SUB(NOW(), INTERVAL 14 DAYS)
        ORDER BY b.created_at DESC
        LIMIT 15
    ", ['instructor_id' => $instructorId])->get();
    
    // Get class history/completed classes
    $completed_classes = $db->query("
        SELECT 
            cs.*,
            COUNT(b.id) as students_attended
        FROM class_slots cs
        LEFT JOIN bookings b ON cs.id = b.slot_id AND b.status = 'confirmed'
        WHERE cs.instructor_id = :instructor_id 
        AND cs.end_time < NOW()
        AND cs.status = 'scheduled'
        GROUP BY cs.id
        ORDER BY cs.start_time DESC
        LIMIT 10
    ", ['instructor_id' => $instructorId])->get();
    
} catch (Exception $e) {
    error_log("Instructor dashboard error: " . $e->getMessage());
    // Set default values if queries fail
    $instructor_profile = auth();
    $stats = [
        'total_slots' => 0,
        'weekly_slots' => 0,
        'todays_classes' => 0,
        'total_bookings' => 0
    ];
    $slots_by_date = [];
    $recent_bookings = [];
    $completed_classes = [];
    $currentMonth = date('Y-m');
    $currentYear = date('Y');
    $currentMonthNum = date('n');
}

view('instructor/dashboard.view.php', [
    'title' => 'Instructor Dashboard',
    'activePage' => 'dashboard',
    'instructor_profile' => $instructor_profile,
    'stats' => $stats,
    'slots_by_date' => $slots_by_date,
    'recent_bookings' => $recent_bookings,
    'completed_classes' => $completed_classes,
    'current_month' => $currentMonth,
    'current_year' => $currentYear,
    'current_month_num' => $currentMonthNum
]);