<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$id = $_GET['id'] ?? null;

if (!$id) {
    abort(404);
}

$slot = $db->query("SELECT * FROM time_slots WHERE id = :id", ['id' => $id])->find();

if (!$slot) {
    abort(404);
}

view('bookings/slot.view.php', ['activePage' => 'booking', 'slot' => $slot]);