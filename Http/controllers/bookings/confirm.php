<?php

use Core\App;
use Core\Database;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once base_path('vendor/autoload.php');
use Stripe\Stripe;
use Stripe\Checkout\Session;
$db = App::resolve(Database::class);

Stripe::setApiKey($_ENV['STRIPE_SECRET_KEY']);

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

$ref = $_GET['ref'] ?? null;
if (!$ref || !isset($_SESSION['bookings'][$ref])) {
  abort(403);
}

$data = $_SESSION['bookings'][$ref];
unset($_SESSION['bookings'][$ref]);
$existing = $db->query("SELECT id FROM booking_groups WHERE ref = :ref", ['ref' => $ref])->find();

if ($existing) {
  // Already confirmed — prevent duplicate booking
  redirect('/book/thankyou'); // or show a "Booking already confirmed" message
}
$session = Session::retrieve($data['session_id']);
$paymentIntent = $session->payment_intent;

// Insert booking group
$db->query("INSERT INTO booking_groups (ref, slot_id, email, phone, stripe_payment_id)
  VALUES (:ref, :slot_id, :email, :phone, :stripe_payment_id)", [
  'ref' => $ref,
  'slot_id' => $data['slot_id'],
  'email' => $data['email'],
  'phone' => $data['phone'],
  'stripe_payment_id' => $paymentIntent
]);

$groupID = $db->getLastInsertId();

for ($i = 0; $i < $data['quantity']; $i++) {
  $db->query("INSERT INTO bookings (time_slot_id, booking_group_id, first_name, last_name, email, phone)
    VALUES (:slot_id, :group_id, :first_name, :last_name, :email, :phone)", [
    'slot_id' => $data['slot_id'],
    'group_id' => $groupID,
    'first_name' => $data['first_name'],
    'last_name' => $data['last_name'],
    'email' => $data['email'],
    'phone' => $data['phone'],
  ]);
}

// Decrease capacity
$db->query("UPDATE time_slots SET capacity = capacity - :qty WHERE id = :slot_id", [
  'qty' => $data['quantity'],
  'slot_id' => $data['slot_id']
]);

// Get slot details for email
$slotDetails = $db->query("SELECT slot_time FROM time_slots WHERE id = :slot_id", [
  'slot_id' => $data['slot_id']
])->find();

$slotDateTime = new DateTime($slotDetails['slot_time']);
$formattedDate = $slotDateTime->format('l, F j, Y');
$formattedTime = $slotDateTime->format('g:i A');

// Payment is confirmed, proceed to send the email
$mail = new PHPMailer(true);

try {
  // SMTP configuration
  $mail->isSMTP();
  $mail->Host = $_ENV['SMTP_HOST'];
  $mail->SMTPAuth = true;
  $mail->Username = $_ENV['SMTP_USERNAME'];
  $mail->Password = $_ENV['SMTP_PASSWORD'];
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port = 587;

  // Email content
  $mail->setFrom($_ENV['SMTP_USERNAME'], 'Flow Haven Studios');
  $mail->addAddress($data['email'], $data['first_name'] . ' ' . $data['last_name']);
  $mail->isHTML(true);
  $mail->Subject = 'Your Flow Haven Studios Booking Confirmation';
  
  // Get the base URL for the logo
  $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
  $logoUrl = $baseUrl . '/assets/images/flowHavenTransparent.png';
  
  // Create HTML email template
  $emailBody = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - Flow Haven Studios</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Quicksand", sans-serif;
            line-height: 1.6;
            color: #3a3222;
            margin: 0;
            padding: 0;
            background-color: #f2e9dc;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #845d45;
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        .header img {
            max-width: 120px;
            height: auto;
            margin-bottom: 15px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }
        .content {
            padding: 30px 25px;
        }
        .greeting {
            font-size: 18px;
            margin-bottom: 20px;
            color: #845d45;
            font-weight: 600;
        }
        .booking-details {
            background-color: #f2e9dc;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            border-left: 4px solid #845d45;
        }
        .booking-details h2 {
            color: #845d45;
            margin-top: 0;
            font-size: 20px;
            font-weight: 600;
        }
        .detail-row {
            margin: 8px 0;
            font-size: 16px;
        }
        .detail-label {
            font-weight: 600;
            color: #845d45;
        }
        .section {
            margin: 25px 0;
        }
        .section h3 {
            color: #845d45;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
        }
        .icon {
            margin-right: 8px;
            font-size: 20px;
        }
        .important-note {
            background-color: #845d45;
            color: white;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
            font-weight: 500;
        }
        .contact-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 6px;
            text-align: center;
            margin: 20px 0;
        }
        .footer {
            background-color: #e8d7c3;
            padding: 25px;
            text-align: center;
            color: #845d45;
        }
        .footer img {
            max-width: 100px;
            height: auto;
            margin-bottom: 15px;
        }
        .social-links {
            margin: 15px 0;
        }
        .social-links a {
            color: #845d45;
            text-decoration: none;
            margin: 0 10px;
            font-weight: 500;
        }
        .btn {
            display: inline-block;
            background-color: #845d45;
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            margin: 15px 0;
        }
        ul {
            padding-left: 20px;
        }
        li {
            margin: 8px 0;
        }
        /* Email client compatibility */
        table {
            border-collapse: collapse;
        }
        img {
            border: 0;
            outline: none;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="' . $logoUrl . '" alt="Flow Haven Studios Logo" style="max-width: 120px; height: auto; margin-bottom: 15px; display: block; margin-left: auto; margin-right: auto;">
            <h1>Thank you for your booking!</h1>
        </div>
        
        <div class="content">
            <div class="greeting">Hi ' . htmlspecialchars($data['first_name']) . ',</div>
            
            <p>Thank you for booking your Pilates session with Flow Haven Studios - we can\'t wait to welcome you! Below are your session details and some important information to help you prepare:</p>
            
            <div class="booking-details">
                <h2>🗓 Booking Details</h2>
                <div class="detail-row">
                    <span class="detail-label">Date:</span> ' . $formattedDate . '
                </div>
                <div class="detail-row">
                    <span class="detail-label">Time:</span> ' . $formattedTime . '
                </div>
                <div class="detail-row">
                    <span class="detail-label">Number of beds reserved:</span> ' . $data['quantity'] . '
                </div>
                <div class="detail-row">
                    <span class="detail-label">Booking Reference:</span> ' . $ref . '
                </div>
            </div>
            
            <div class="section">
                <h3><span class="icon">📍</span>Location</h3>
                <p><strong>Workspace, Pillbox Unit G01</strong><br>
                115 Coventry Road<br>
                Bethnal Green<br>
                E2 6GH</p>
            </div>
            
            <div class="section">
                <h3><span class="icon">🚗</span>Getting Here</h3>
                <p><strong>By Tube/Train:</strong> We\'re just a 3-minute walk from Bethnal Green Underground and Overground stations.</p>
                <p><strong>By Bus:</strong> Numerous bus routes stop nearby for your convenience.</p>
                <p><strong>By Car:</strong></p>
                <ul>
                    <li>Pay & Display from Mon - Fri (9am - 5:30) right outside of the studio. Free parking is available outside of those hours and on weekends.</li>
                    <li>You can also park at Sainsbury\'s (90-minute limit) - just a 5-minute walk from us.</li>
                </ul>
            </div>
            
            <div class="section">
                <h3><span class="icon">🚪</span>Entry Instructions</h3>
                <p>When you arrive:</p>
                <ol>
                    <li>If the gate is locked, press 1 on the intercom to be let in.</li>
                    <li>Once you\'ve walked up the stairs, press 1 again at the main building doors to gain entry.</li>
                </ol>
                <div class="important-note">
                    Please arrive 10 minutes before your class starts. There\'s a 5-minute grace period, but unfortunately, anyone arriving later than that won\'t be able to join the session.
                </div>
            </div>
            
            <div class="section">
                <h3><span class="icon">🧦</span>What to Bring</h3>
                <ul>
                    <li>Grip socks are required for all Pilates classes.</li>
                    <li>If you don\'t have a pair, they\'ll be available for purchase at the studio on the day.</li>
                </ul>
            </div>
            
            <div class="section">
                <h3><span class="icon">⚠️</span>Important Notes</h3>
                <ul>
                    <li>If you are pregnant or recovering from an injury, please inform your instructor before the class.</li>
                    <li>By attending the class, you acknowledge that you are participating at your own risk and release flow haven from any liability.</li>
                    <li>We may be taking photos and videos during the session for promotional purposes. If you prefer not to be photographed, just let a team member know - we completely respect your privacy.</li>
                </ul>
            </div>
            
            <div class="contact-info">
                <h3><span class="icon">❓</span>Questions or Concerns?</h3>
                <p>We\'re here to help! Feel free to reach out to us anytime at:<br>
                <strong>📧 admin@flowhavenstudios.com</strong></p>
            </div>
            
            <div style="text-align: center; margin: 30px 0;">
                <p><strong>Please fill out the waiver below before your lesson:</strong></p>
                <a href="https://form.jotform.com/252106508214346" class="btn">Complete Waiver Form</a>
            </div>
            
            <p style="text-align: center; font-size: 18px; color: #845d45; font-weight: 600; margin: 30px 0;">
                We\'re excited to flow with you soon!
            </p>
            
            <p style="text-align: center;">
                Warm wishes,<br>
                <strong>The Flow Haven Team</strong>
            </p>
        </div>
        
        <div class="footer">
            <img src="' . $logoUrl . '" alt="Flow Haven Studios" style="max-width: 100px; height: auto; margin-bottom: 15px;">
            <p style="font-weight: 600; margin-bottom: 10px;">boutique reformer pilates studio in bethnal green. find your flow.</p>
            <div class="social-links">
                <a href="https://www.instagram.com/flowhavenstudios?igsh=Z3k2djhwazl0NXRl&utm_source=qr">Instagram</a>
                <a href="https://www.tiktok.com/@flowhavenstudios?_t=ZN-8yKnbkG5uYY&_r=1">TikTok</a>
            </div>
            <p style="font-size: 12px; margin-top: 15px;">&copy; ' . date('Y') . ' flowhaven studios. all rights reserved.</p>
        </div>
    </div>
</body>
</html>';

  $mail->Body = $emailBody;
  
  // Plain text version - FIXED to use the correct datetime formatting
  $mail->AltBody = "Hi " . $data['first_name'] . ",

Thank you for booking your Pilates session with Flow Haven Studios!

Booking Details:
Date: " . $formattedDate . "
Time: " . $formattedTime . "
Number of beds reserved: " . $data['quantity'] . "
Booking Reference: " . $ref . "

Location:
Workspace, Pillbox Unit G01
115 Coventry Road
Bethnal Green
E2 6GH

Please arrive 10 minutes before your class starts and bring grip socks.

Complete your waiver: https://form.jotform.com/252106508214346

Questions? Contact us at admin@flowhavenstudios.com

Warm wishes,
The Flow Haven Team";

  // Send email
  $mail->send();
  error_log("Booking confirmation email sent successfully to " . $data['email']);
  
} catch (Exception $e) {
  // Log email sending error
  error_log("Email could not be sent. Mailer Error: {$mail->ErrorInfo}");
}

view('bookings/thankyou.view.php', ['activePage' => 'booking']);
?>