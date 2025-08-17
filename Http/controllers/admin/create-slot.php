<?php
use Core\App;
use Core\Database;
use Core\Session;

if (!($_SESSION['admin_logged_in'] ?? false)) {
    redirect('/admin/login');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = App::resolve(Database::class);
    
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $capacity = (int)($_POST['capacity'] ?? 6);
    $womenOnly = (int)($_POST['women_only'] ?? 0);
    
    if (!$date || !$time || $capacity < 1) {
        Session::flash('error', 'Invalid slot data provided.');
        redirect('/admin/dashboard');
    }
    
    $slotDateTime = $date . ' ' . $time . ':00';
    
    // Validate the slot time doesn't conflict with existing slots
    // Check for slots within 60 minutes (50 min class + 10 min gap)
    $conflicts = $db->query("
        SELECT id FROM time_slots 
        WHERE ABS(TIMESTAMPDIFF(MINUTE, slot_time, :slot_time)) < 60
    ", ['slot_time' => $slotDateTime])->get();
    
    if (!empty($conflicts)) {
        Session::flash('error', 'This time slot conflicts with an existing slot. There must be at least 10 minutes between slots.');
        redirect('/admin/dashboard');
    }
    
    // Insert the new time slot with women_only field
    $db->query("
        INSERT INTO time_slots (slot_time, capacity, women_only) 
        VALUES (:slot_time, :capacity, :women_only)
    ", [
        'slot_time' => $slotDateTime,
        'capacity' => $capacity,
        'women_only' => $womenOnly
    ]);
    
    $slotType = $womenOnly ? 'women-only' : 'mixed';
    Session::flash('success', "Time slot created successfully ({$slotType} class).");
}

redirect('/admin/dashboard');