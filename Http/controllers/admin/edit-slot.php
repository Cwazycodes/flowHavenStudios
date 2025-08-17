<?php
use Core\App;
use Core\Database;
use Core\Session;
require_once base_path('vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!($_SESSION['admin_logged_in'] ?? false)) {
    redirect('/admin/login');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = App::resolve(Database::class);
    
    $slotId = (int)($_POST['slot_id'] ?? 0);
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $capacity = (int)($_POST['capacity'] ?? 6);
    $womenOnly = (int)($_POST['women_only'] ?? 0);
    
    if (!$slotId || !$date || !$time || $capacity < 1) {
        Session::flash('error', 'Invalid slot data provided.');
        redirect('/admin/dashboard');
    }
    
    $newSlotDateTime = $date . ' ' . $time . ':00';
    
    // Get current slot data
    $currentSlot = $db->query("
        SELECT slot_time, capacity, women_only FROM time_slots WHERE id = :id
    ", ['id' => $slotId])->find();
    
    if (!$currentSlot) {
        Session::flash('error', 'Time slot not found.');
        redirect('/admin/dashboard');
    }
    
    // Check for conflicts with other slots (excluding current slot)
    $conflicts = $db->query("
        SELECT id FROM time_slots 
        WHERE id != :slot_id 
        AND ABS(TIMESTAMPDIFF(MINUTE, slot_time, :slot_time)) < 60
    ", [
        'slot_id' => $slotId,
        'slot_time' => $newSlotDateTime
    ])->get();
    
    if (!empty($conflicts)) {
        Session::flash('error', 'This time slot conflicts with an existing slot. There must be at least 10 minutes between slots.');
        redirect('/admin/dashboard');
    }
    
    // Get bookings for this slot to send update emails
    $bookings = $db->query("
        SELECT b.*, bg.ref, ts.slot_time as old_slot_time
        FROM bookings b
        JOIN booking_groups bg ON b.booking_group_id = bg.id
        JOIN time_slots ts ON b.time_slot_id = ts.id
        WHERE b.time_slot_id = :slot_id
    ", ['slot_id' => $slotId])->get();
    
    // Check if class type is changing and send notification if needed
    $typeChanged = ($currentSlot['women_only'] != $womenOnly);
    
    // Update the time slot
    $db->query("
        UPDATE time_slots 
        SET slot_time = :slot_time, capacity = :capacity, women_only = :women_only 
        WHERE id = :id
    ", [
        'id' => $slotId,
        'slot_time' => $newSlotDateTime,
        'capacity' => $capacity,
        'women_only' => $womenOnly
    ]);
    
    // Send update emails to affected customers
    foreach ($bookings as $booking) {
        sendSlotUpdateEmail($booking, $newSlotDateTime, $currentSlot['slot_time'], $typeChanged, $womenOnly);
    }
    
    $slotType = $womenOnly ? 'women-only' : 'mixed';
    Session::flash('success', "Time slot updated successfully ({$slotType} class). Customers have been notified of the change.");
}

function sendSlotUpdateEmail($booking, $newSlotDateTime, $oldSlotDateTime, $typeChanged, $womenOnly) {
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
        $mail->addAddress($booking['email'], $booking['first_name'] . ' ' . $booking['last_name']);
        $mail->isHTML(true);
        $mail->Subject = 'Important: Your Pilates Session Details Have Changed - Flow Haven Studios';
        
        // Get the base URL for the logo
        $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
        $logoUrl = $baseUrl . '/assets/images/flowHavenTransparent.png';
        
        // Parse the old and new slot times
        $oldSlotDateTime = new DateTime($oldSlotDateTime);
        $newSlotDateTimeObj = new DateTime($newSlotDateTime);
        
        $oldFormattedDate = $oldSlotDateTime->format('l, F j, Y');
        $oldFormattedTime = $oldSlotDateTime->format('g:i A');
        
        $newFormattedDate = $newSlotDateTimeObj->format('l, F j, Y');
        $newFormattedTime = $newSlotDateTimeObj->format('g:i A');
        
        $classType = $womenOnly ? 'women-only' : 'mixed';
        
        // Create HTML email template
        $emailBody = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Update - Flow Haven Studios</title>
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
        .update-notice {
            background-color: #fff3cd;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            border-left: 4px solid #ffc107;
        }
        .update-notice h2 {
            color: #856404;
            margin-top: 0;
            font-size: 20px;
            font-weight: 600;
        }
        .time-comparison {
            display: flex;
            justify-content: space-between;
            margin: 20px 0;
            flex-wrap: wrap;
        }
        .time-box {
            flex: 1;
            min-width: 250px;
            margin: 10px;
            padding: 15px;
            border-radius: 6px;
            text-align: center;
        }
        .old-time {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .new-time {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }
        .class-type-notice {
            background-color: #f2e9dc;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            border-left: 4px solid #845d45;
        }
        .class-type-notice h2 {
            color: #845d45;
            margin-top: 0;
            font-size: 20px;
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
        @media (max-width: 600px) {
            .time-comparison {
                flex-direction: column;
            }
            .time-box {
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="' . $logoUrl . '" alt="Flow Haven Studios Logo">
            <h1>Session Update</h1>
        </div>
        
        <div class="content">
            <div class="greeting">Hi ' . htmlspecialchars($booking['first_name']) . ',</div>
            
            <p>We need to inform you of an important change to your upcoming Pilates session at Flow Haven Studios. Due to scheduling adjustments, your session details have been updated.</p>
            
            <div class="update-notice">
                <h2>⚠️ Session Details Changed</h2>
                <p>Your session has been updated. Please see the details below and update your calendar accordingly.</p>
            </div>';
            
        // Only show time comparison if time/date actually changed
        if ($oldSlotDateTime != $newSlotDateTimeObj) {
            $emailBody .= '
            <div class="time-comparison">
                <div class="time-box old-time">
                    <h3 style="margin-top: 0; color: #721c24;">Previous Time</h3>
                    <p style="margin: 0; font-weight: 600;">' . $oldFormattedDate . '<br>' . $oldFormattedTime . '</p>
                </div>
                <div class="time-box new-time">
                    <h3 style="margin-top: 0; color: #0c5460;">New Time</h3>
                    <p style="margin: 0; font-weight: 600;">' . $newFormattedDate . '<br>' . $newFormattedTime . '</p>
                </div>
            </div>';
        }
        
        // Show class type notice if it changed
        if ($typeChanged) {
            $emailBody .= '
            <div class="class-type-notice">
                <h2>👥 Class Type Update</h2>
                <p><strong>This session is now a ' . $classType . ' class.</strong></p>
                ' . ($womenOnly ? '<p>This session is now exclusively for women.</p>' : '<p>This session is now open to all genders.</p>') . '
            </div>';
        }
        
        $emailBody .= '
            <div class="booking-details">
                <h2>📋 Updated Booking Details</h2>
                <div class="detail-row">
                    <span class="detail-label">Date:</span> ' . $newFormattedDate . '
                </div>
                <div class="detail-row">
                    <span class="detail-label">Time:</span> ' . $newFormattedTime . '
                </div>
                <div class="detail-row">
                    <span class="detail-label">Class Type:</span> ' . $classType . '
                </div>
                <div class="detail-row">
                    <span class="detail-label">Booking Reference:</span> ' . htmlspecialchars($booking['ref']) . '
                </div>
            </div>
            
            <div class="important-note">
                <strong>Please arrive 10 minutes before your updated session time.</strong> Don\'t forget to bring your grip socks!
            </div>
            
            <div class="section">
                <h3>📍 Same Location</h3>
                <p><strong>Workspace, Pillbox Unit G01</strong><br>
                115 Coventry Road<br>
                Bethnal Green<br>
                E2 6GH</p>
            </div>
            
            <div class="section">
                <h3>🚪 Entry Instructions (Unchanged)</h3>
                <p>When you arrive:</p>
                <ol>
                    <li>If the gate is locked, press 1 on the intercom to be let in.</li>
                    <li>Once you\'ve walked up the stairs, press 1 again at the main building doors to gain entry.</li>
                </ol>
            </div>
            
            <div class="contact-info">
                <h3>❓ Questions About This Change?</h3>
                <p>If you have any questions about your updated session or if this change doesn\'t work for you, please don\'t hesitate to reach out:<br>
                <strong>📧 admin@flowhavenstudios.com</strong></p>
            </div>
            
            <div style="text-align: center; margin: 30px 0;">
                <p><strong>Please ensure you\'ve completed the waiver if you haven\'t already:</strong></p>
                <a href="https://form.jotform.com/252106508214346" class="btn">Complete Waiver Form</a>
            </div>
            
            <p style="text-align: center; font-size: 18px; color: #845d45; font-weight: 600; margin: 30px 0;">
                We apologize for any inconvenience and look forward to seeing you!
            </p>
            
            <p style="text-align: center;">
                Warm wishes,<br>
                <strong>The Flow Haven Team</strong>
            </p>
        </div>
        
        <div class="footer">
            <img src="' . $logoUrl . '" alt="Flow Haven Studios">
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
        
        // Create plain text version
        $textBody = "Hi " . $booking['first_name'] . ",

Your Pilates session details at Flow Haven Studios have been updated.";

        if ($oldSlotDateTime != $newSlotDateTimeObj) {
            $textBody .= "

PREVIOUS TIME:
Date: " . $oldFormattedDate . "
Time: " . $oldFormattedTime . "

NEW TIME:
Date: " . $newFormattedDate . "
Time: " . $newFormattedTime;
        }

        if ($typeChanged) {
            $textBody .= "

CLASS TYPE UPDATE:
This session is now a " . $classType . " class.";
        }

        $textBody .= "

UPDATED BOOKING DETAILS:
Date: " . $newFormattedDate . "
Time: " . $newFormattedTime . "
Class Type: " . $classType . "
Booking Reference: " . $booking['ref'] . "

Location (unchanged):
Workspace, Pillbox Unit G01
115 Coventry Road
Bethnal Green
E2 6GH

Please arrive 10 minutes before your updated session time and bring grip socks.

Complete your waiver if you haven't already: https://form.jotform.com/252106508214346

Questions? Contact us at admin@flowhavenstudios.com

We apologize for any inconvenience and look forward to seeing you!

Warm wishes,
The Flow Haven Team";

        $mail->AltBody = $textBody;

        // Send email
        $mail->send();
        error_log("Slot update email sent successfully to " . $booking['email']);
        
    } catch (Exception $e) {
        // Log email sending error
        error_log("Slot update email could not be sent. Mailer Error: {$mail->ErrorInfo}");
    }
}

redirect('/admin/dashboard');