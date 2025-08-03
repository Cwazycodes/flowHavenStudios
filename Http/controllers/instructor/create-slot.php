<?php

use Core\App;
use Core\Database;

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

$date = $_POST['date'] ?? '';
$startTime = $_POST['start_time'] ?? '';
$endTime = $_POST['end_time'] ?? '';
$availableBeds = $_POST['available_beds'] ?? 6;
$classType = $_POST['class_type'] ?? 'reformer pilates';
$description = $_POST['description'] ?? '';

// Validate inputs
if (!$date || !$startTime || !$endTime) {
    echo json_encode(['success' => false, 'message' => 'date and times are required']);
    exit;
}

// Check if date is not in the past
if (strtotime($date) < strtotime('today')) {
    echo json_encode(['success' => false, 'message' => 'cannot create slots for past dates']);
    exit;
}

// Combine date and time
$startDateTime = $date . ' ' . $startTime;
$endDateTime = $date . ' ' . $endTime;

// Validate that end time is after start time
if (strtotime($endDateTime) <= strtotime($startDateTime)) {
    echo json_encode(['success' => false, 'message' => 'end time must be after start time']);
    exit;
}

try {
    $db = App::resolve(Database::class);
    $instructorId = auth()['id'];
    
    // Check for conflicting slots
    $conflictingSlot = $db->query("
        SELECT id FROM class_slots 
        WHERE instructor_id = :instructor_id 
        AND status = 'scheduled'
        AND ((start_time <= :start_time AND end_time > :start_time)
             OR (start_time < :end_time AND end_time >= :end_time)
             OR (start_time >= :start_time AND end_time <= :end_time))
    ", [
        'instructor_id' => $instructorId,
        'start_time' => $startDateTime,
        'end_time' => $endDateTime
    ])->find();
    
    if ($conflictingSlot) {
        echo json_encode(['success' => false, 'message' => 'you already have a class scheduled during this time']);
        exit;
    }
    
    // Create the slot
    $db->query("
        INSERT INTO class_slots (instructor_id, location_id, start_time, end_time, available_beds, class_type, description) 
        VALUES (:instructor_id, :location_id, :start_time, :end_time, :available_beds, :class_type, :description)
    ", [
        'instructor_id' => $instructorId,
        'location_id' => 1, // Default to Bethnal Green for now
        'start_time' => $startDateTime,
        'end_time' => $endDateTime,
        'available_beds' => $availableBeds,
        'class_type' => $classType,
        'description' => $description
    ]);
    
    echo json_encode(['success' => true]);
    
} catch (Exception $e) {
    error_log("Create slot error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'failed to create slot']);
}