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
    
    // Get upcoming slots with student details
    $upcoming_slots = $db->query("
        SELECT 
            cs.*,
            COUNT(b.id) as booked_beds,
            GROUP_CONCAT(
                CONCAT(u.first_name, ' ', u.last_name) 
                ORDER BY u.first_name SEPARATOR ', '
            ) as student_names
        FROM class_slots cs
        LEFT JOIN bookings b ON cs.id = b.slot_id AND b.status = 'confirmed'
        LEFT JOIN users u ON b.student_id = u.id
        WHERE cs.instructor_id = :instructor_id 
        AND cs.start_time > NOW() 
        AND cs.status = 'scheduled'
        GROUP BY cs.id
        ORDER BY cs.start_time ASC
        LIMIT 20
    ", ['instructor_id' => $instructorId])->get();
    
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
    $upcoming_slots = [];
    $recent_bookings = [];
    $completed_classes = [];
}

view('instructor/dashboard.view.php', [
    'title' => 'Instructor Dashboard',
    'activePage' => 'dashboard',
    'instructor_profile' => $instructor_profile,
    'stats' => $stats,
    'upcoming_slots' => $upcoming_slots,
    'recent_bookings' => $recent_bookings,
    'completed_classes' => $completed_classes
]);