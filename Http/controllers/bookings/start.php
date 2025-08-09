<?php

require_once base_path('vendor/autoload.php');

use Core\App;
use Core\Database;
use Stripe\Stripe;
use Stripe\Checkout\Session;

\Stripe\Stripe::setApiKey('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'); 

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$db = App::resolve(Database::class);

$quantity = max(1, (int) $_POST['quantity']);
$slot = $db->query("SELECT capacity FROM time_slots WHERE id = :id", [
  'id' => $_POST['slot_id']
])->find();

if (!$slot || $slot['capacity'] < $quantity) {
  abort(403); 
}

$ref = uniqid('booking_');
// Save booking data in session
$_SESSION['bookings'][$ref] = [
  'slot_id' => $_POST['slot_id'],
  'email' => $_POST['email'],
  'phone' => $_POST['phone'],
  'quantity' => $quantity,
  'first_name' => $_POST['first_name'],
  'last_name' => $_POST['last_name'],
];


// Build success and cancel URLs
$domain = 'https://flowhavenf-fsystem.onrender.com'; // Replace with your domain
$success_url = $domain . '/book/confirm?ref=' . $ref;
$cancel_url = $domain . '/book'; // optional

// Create Checkout session
$session = Session::create([
  'payment_method_types' => ['card', 'revolut_pay'],
  'mode' => 'payment',
  'customer_email' => $_POST['email'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'gbp',
      'product_data' => [
        'name' => 'Flow Haven F&F Pilates Class Booking',
      ],
      'unit_amount' => 2000, // £15.00
    ],
    'quantity' => $quantity,
    ]],
    'success_url' => $success_url,
    'cancel_url' => $cancel_url,
  ]);
  
  $_SESSION['bookings'][$ref]['session_id'] = $session->id;

// Redirect to Stripe checkout page
header('Location: ' . $session->url);
exit;
