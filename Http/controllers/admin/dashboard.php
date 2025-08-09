<?php

session_start();

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

// You can add any dashboard data here
$dashboard_data = [
    'login_time' => $_SESSION['login_time'] ?? time(),
    'current_time' => time()
];

view('admin/simple-dashboard.view.php', [
    'title' => 'Admin Dashboard',
    'activePage' => 'dashboard',
    'data' => $dashboard_data
]);