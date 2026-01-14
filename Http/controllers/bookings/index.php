<?php

// use Core\App;
// use Core\Database;

// $db = App::resolve(Database::class);

// $slots = $db->query("SELECT * FROM time_slots WHERE slot_time > NOW() ORDER BY slot_time")->get();

// $grouped = [];

// foreach ($slots as $slot) {
//     $timestamp = strtotime($slot['slot_time']);
//     $dayLabel = date('l, d-m-Y', $timestamp); // e.g. "Saturday, 2025-08-02"
//     $time = date('H:i', $timestamp);

//     if (!isset($grouped[$dayLabel])) {
//         $grouped[$dayLabel] = [];
//     }

//     $grouped[$dayLabel][] = [
//         'id' => $slot['id'],
//         'time' => $time,
//         'capacity' => $slot['capacity'],
//         'datetime' => $slot['slot_time'],
//         'women_only' => $slot['women_only'] ?? 0, // Include women_only field
//     ];
// }

view("bookings/index.view.php", [
    'activePage' => 'booking',
]);