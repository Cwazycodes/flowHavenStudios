<?php

use Core\App;
use Core\Database;

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to home if not logged in
    header('Location: /');
    exit;
}

// Optional: Check if session is older than 2 hours and require re-login
if (isset($_SESSION['login_time']) && (time() - $_SESSION['login_time']) > 7200) {
    session_destroy();
    header('Location: /');
    exit;
}

$db = App::resolve(Database::class);

// Pagination settings
$slotsPerPage = 25;
$bookingsPerPage = 15;

// Get current page numbers from URL
$slotsPage = max(1, (int)($_GET['slots_page'] ?? 1));
$bookingsPage = max(1, (int)($_GET['bookings_page'] ?? 1));

// Calculate offsets
$slotsOffset = ($slotsPage - 1) * $slotsPerPage;
$bookingsOffset = ($bookingsPage - 1) * $bookingsPerPage;

// Get total count of future time slots
$totalSlotsResult = $db->query("
    SELECT COUNT(*) as total
    FROM time_slots 
    WHERE slot_time > NOW()
")->find();
$totalSlots = $totalSlotsResult['total'];
$totalSlotsPages = ceil($totalSlots / $slotsPerPage);

// Get total count of future bookings
$totalBookingsResult = $db->query("
    SELECT COUNT(*) as total
    FROM bookings b
    JOIN time_slots ts ON b.time_slot_id = ts.id
    WHERE ts.slot_time > NOW()
")->find();
$totalBookings = $totalBookingsResult['total'];
$totalBookingsPages = ceil($totalBookings / $bookingsPerPage);

// Get paginated future bookings with slot information (using your existing query structure)
$bookings = $db->query("
    SELECT bookings.*, time_slots.slot_time, booking_groups.ref
    FROM bookings 
    JOIN time_slots ON bookings.time_slot_id = time_slots.id 
    LEFT JOIN booking_groups ON bookings.booking_group_id = booking_groups.id
    WHERE time_slots.slot_time > NOW()
    ORDER BY slot_time
    LIMIT " . $bookingsPerPage . " OFFSET " . $bookingsOffset
)->get();

// Get paginated future time slots with booking counts AND women_only field
$timeSlots = $db->query("
    SELECT ts.id, ts.slot_time, ts.capacity, 
           COALESCE(ts.women_only, 0) as women_only,
           COALESCE(COUNT(b.id), 0) as booked_count
    FROM time_slots ts
    LEFT JOIN bookings b ON ts.id = b.time_slot_id
    WHERE ts.slot_time > NOW()
    GROUP BY ts.id, ts.slot_time, ts.capacity, ts.women_only
    ORDER BY ts.slot_time
    LIMIT " . $slotsPerPage . " OFFSET " . $slotsOffset
)->get();

view('admin/dashboard.view.php', [
    'title' => 'Admin Dashboard',
    'activePage' => 'dashboard',
    'bookings' => $bookings,
    'timeSlots' => $timeSlots,
    'slotsPage' => $slotsPage,
    'bookingsPage' => $bookingsPage,
    'totalSlotsPages' => $totalSlotsPages,
    'totalBookingsPages' => $totalBookingsPages,
    'totalSlots' => $totalSlots,
    'totalBookings' => $totalBookings
]);