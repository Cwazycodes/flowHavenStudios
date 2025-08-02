<?php

use Core\Location;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'method not allowed']);
    exit;
}

try {
    $locationModel = new Location();
    $locations = $locationModel->getAll();
    
    echo json_encode([
        'success' => true,
        'locations' => $locations
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'failed to fetch locations'
    ]);
}