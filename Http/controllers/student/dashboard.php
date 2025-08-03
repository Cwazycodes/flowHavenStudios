<?php

use Core\App;
use Core\Database;
use Core\User;

// Ensure student access (or admin)
if (!isAuthenticated()) {
    redirect('/');
    exit;
}

$db = App::resolve(Database::class);
$userModel = new User();
$studentId = auth()['id'];

try {
    // Get student profile with user details
    $student_profile = $userModel->getUserWithProfile($studentId);
    
    // If no profile exists, create default profile data
    if (!$student_profile) {
        $student_profile = array_merge(auth(), [
            'fitness_level' => 'beginner',
            'preferred_location_name' => '',
            'emergency_contact_name' => '',
            'emergency_contact_phone' => '',
            'medical_conditions' => '',
            'marketing_consent' => 0,
            'profile_image' => null,
            'phone' => ''
        ]);
    }
    
    // Ensure all required keys exist with defaults
    $student_profile = array_merge([
        'first_name' => 'Student',
        'last_name' => '',
        'email' => '',
        'phone' => '',
        'fitness_level' => 'beginner',
        'preferred_location_name' => '',
        'emergency_contact_name' => '',
        'emergency_contact_phone' => '',
        'medical_conditions' => '',
        'marketing_consent' => 0,
        'profile_image' => null
    ], $student_profile);
    
    // Get student statistics with proper null handling
    $bookingStats = $db->query("
        SELECT 
            COUNT(*) as total_bookings,
            SUM(CASE WHEN cs.start_time >= DATE_SUB(NOW(), INTERVAL 30 DAY) THEN 1 ELSE 0 END) as monthly_bookings,
            SUM(CASE WHEN cs.start_time > NOW() THEN 1 ELSE 0 END) as upcoming_classes,
            SUM(CASE WHEN cs.end_time < NOW() THEN 1 ELSE 0 END) as completed_classes
        FROM bookings b
        JOIN class_slots cs ON b.slot_id = cs.id
        WHERE b.student_id = :student_id 
        AND b.status = 'confirmed'
    ", ['student_id' => $studentId])->find();
    
    // Ensure we have default values if query returns null
    $stats = [
        'total_bookings' => $bookingStats['total_bookings'] ?? 0,
        'monthly_bookings' => $bookingStats['monthly_bookings'] ?? 0,
        'upcoming_classes' => $bookingStats['upcoming_classes'] ?? 0,
        'completed_classes' => $bookingStats['completed_classes'] ?? 0
    ];
    
    // Get upcoming bookings with instructor details
    $upcoming_bookings = $db->query("
        SELECT 
            b.*,
            cs.start_time,
            cs.end_time,
            cs.available_beds,
            cs.class_type,
            cs.description,
            CONCAT(iu.first_name, ' ', iu.last_name) as instructor_name,
            COUNT(b2.id) as total_booked
        FROM bookings b
        JOIN class_slots cs ON b.slot_id = cs.id
        JOIN users iu ON cs.instructor_id = iu.id
        LEFT JOIN bookings b2 ON cs.id = b2.slot_id AND b2.status = 'confirmed'
        WHERE b.student_id = :student_id 
        AND b.status = 'confirmed'
        AND cs.start_time > NOW()
        GROUP BY b.id
        ORDER BY cs.start_time ASC
    ", ['student_id' => $studentId])->get();
    
    // Get booking history
    $booking_history = $db->query("
        SELECT 
            b.*,
            cs.start_time,
            cs.end_time,
            cs.class_type,
            CONCAT(iu.first_name, ' ', iu.last_name) as instructor_name
        FROM bookings b
        JOIN class_slots cs ON b.slot_id = cs.id
        JOIN users iu ON cs.instructor_id = iu.id
        WHERE b.student_id = :student_id
        ORDER BY cs.start_time DESC
        LIMIT 25
    ", ['student_id' => $studentId])->get();
    
    // Get available slots that the student hasn't booked yet
    $available_slots = $db->query("
        SELECT 
            cs.*,
            CONCAT(iu.first_name, ' ', iu.last_name) as instructor_name,
            COUNT(b.id) as booked_beds
        FROM class_slots cs
        JOIN users iu ON cs.instructor_id = iu.id
        LEFT JOIN bookings b ON cs.id = b.slot_id AND b.status = 'confirmed'
        LEFT JOIN bookings sb ON cs.id = sb.slot_id AND sb.student_id = :student_id AND sb.status = 'confirmed'
        WHERE cs.start_time > NOW() 
        AND cs.status = 'scheduled'
        AND sb.id IS NULL
        GROUP BY cs.id
        HAVING booked_beds < cs.available_beds
        ORDER BY cs.start_time ASC
        LIMIT 15
    ", ['student_id' => $studentId])->get();
    
    // Get favorite instructors (most booked with)
    $favorite_instructors = $db->query("
        SELECT 
            iu.id,
            CONCAT(iu.first_name, ' ', iu.last_name) as instructor_name,
            COUNT(b.id) as class_count,
            ip.bio,
            ip.specializations
        FROM bookings b
        JOIN class_slots cs ON b.slot_id = cs.id
        JOIN users iu ON cs.instructor_id = iu.id
        LEFT JOIN instructor_profiles ip ON iu.id = ip.user_id
        WHERE b.student_id = :student_id 
        AND b.status = 'confirmed'
        GROUP BY iu.id
        ORDER BY class_count DESC
        LIMIT 5
    ", ['student_id' => $studentId])->get();
    
} catch (Exception $e) {
    error_log("Student dashboard error: " . $e->getMessage());
    // Set default values if queries fail
    $student_profile = array_merge(auth(), [
        'first_name' => auth()['first_name'] ?? 'Student',
        'last_name' => auth()['last_name'] ?? '',
        'email' => auth()['email'] ?? '',
        'phone' => '',
        'fitness_level' => 'beginner',
        'preferred_location_name' => '',
        'emergency_contact_name' => '',
        'emergency_contact_phone' => '',
        'medical_conditions' => '',
        'marketing_consent' => 0,
        'profile_image' => null
    ]);
    $stats = [
        'total_bookings' => 0,
        'monthly_bookings' => 0,
        'upcoming_classes' => 0,
        'completed_classes' => 0
    ];
    $upcoming_bookings = [];
    $booking_history = [];
    $available_slots = [];
    $favorite_instructors = [];
}

view('student/dashboard.view.php', [
    'title' => 'Student Dashboard',
    'activePage' => 'dashboard',
    'student_profile' => $student_profile,
    'stats' => $stats,
    'upcoming_bookings' => $upcoming_bookings,
    'booking_history' => $booking_history,
    'available_slots' => $available_slots,
    'favorite_instructors' => $favorite_instructors
]);