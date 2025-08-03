<?php

use Core\App;
use Core\Database;

// Ensure admin access
if (!isAdmin()) {
    redirect('/');
    exit;
}

$db = App::resolve(Database::class);

try {
    // Get system statistics
    $stats = [];
    
    // Total users by role
    $userStats = $db->query("
        SELECT 
            COUNT(*) as total_users,
            SUM(CASE WHEN role = 'student' THEN 1 ELSE 0 END) as total_students,
            SUM(CASE WHEN role = 'instructor' THEN 1 ELSE 0 END) as total_instructors,
            SUM(CASE WHEN status = 'active' THEN 1 ELSE 0 END) as active_users
        FROM users
    ")->find();
    
    $stats = array_merge($stats, $userStats);
    
    // Today's bookings
    $todaysBookings = $db->query("
        SELECT COUNT(*) as todays_bookings
        FROM bookings b 
        JOIN class_slots cs ON b.slot_id = cs.id 
        WHERE DATE(cs.start_time) = CURDATE() 
        AND b.status = 'confirmed'
    ")->find();
    
    $stats['todays_bookings'] = $todaysBookings['todays_bookings'];
    
    // Recent bookings with details
    $recent_bookings = $db->query("
        SELECT 
            b.id,
            b.status,
            cs.start_time,
            cs.end_time,
            CONCAT(u.first_name, ' ', u.last_name) as student_name,
            CONCAT(iu.first_name, ' ', iu.last_name) as instructor_name
        FROM bookings b
        JOIN users u ON b.student_id = u.id
        JOIN class_slots cs ON b.slot_id = cs.id
        JOIN users iu ON cs.instructor_id = iu.id
        WHERE b.created_at >= DATE_SUB(NOW(), INTERVAL 7 DAYS)
        ORDER BY b.created_at DESC
        LIMIT 20
    ")->get();
    
    // Upcoming slots with booking counts
    $upcoming_slots = $db->query("
        SELECT 
            cs.*,
            CONCAT(u.first_name, ' ', u.last_name) as instructor_name,
            COUNT(b.id) as booked_beds
        FROM class_slots cs
        JOIN users u ON cs.instructor_id = u.id
        LEFT JOIN bookings b ON cs.id = b.slot_id AND b.status = 'confirmed'
        WHERE cs.start_time > NOW() 
        AND cs.status = 'scheduled'
        GROUP BY cs.id
        ORDER BY cs.start_time ASC
        LIMIT 15
    ")->get();
    
    // Get all instructors for management
    $instructors = $db->query("
        SELECT 
            u.*,
            ip.bio,
            ip.specializations,
            ip.certifications,
            ip.is_featured
        FROM users u
        LEFT JOIN instructor_profiles ip ON u.id = ip.user_id
        WHERE u.role = 'instructor' 
        AND u.status = 'active'
        ORDER BY u.first_name, u.last_name
    ")->get();
    
    // Get students with booking counts
    $students = $db->query("
        SELECT 
            u.*,
            sp.fitness_level,
            COUNT(b.id) as total_bookings
        FROM users u
        LEFT JOIN student_profiles sp ON u.id = sp.user_id
        LEFT JOIN bookings b ON u.id = b.student_id
        WHERE u.role = 'student' 
        AND u.status = 'active'
        GROUP BY u.id
        ORDER BY u.first_name, u.last_name
        LIMIT 50
    ")->get();
    
} catch (Exception $e) {
    error_log("Admin dashboard error: " . $e->getMessage());
    // Set default values if queries fail
    $stats = [
        'total_users' => 0,
        'total_students' => 0,
        'total_instructors' => 0,
        'todays_bookings' => 0
    ];
    $recent_bookings = [];
    $upcoming_slots = [];
    $instructors = [];
    $students = [];
}

view('admin/dashboard.view.php', [
    'title' => 'Admin Dashboard',
    'activePage' => 'dashboard',
    'stats' => $stats,
    'recent_bookings' => $recent_bookings,
    'upcoming_slots' => $upcoming_slots,
    'instructors' => $instructors,
    'students' => $students
]);