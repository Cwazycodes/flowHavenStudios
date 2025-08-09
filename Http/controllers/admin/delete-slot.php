<?php
use Core\App;
use Core\Database;
use Core\Session;
require_once base_path('vendor/autoload.php');

use Stripe\Stripe;
use Stripe\Refund;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Set your secret Stripe key
Stripe::setApiKey('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');

if (!($_SESSION['admin_logged_in'] ?? false)) {
    redirect('/admin/login');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = App::resolve(Database::class);
    
    $slotId = (int)($_POST['slot_id'] ?? 0);
    
    if (!$slotId) {
        Session::flash('error', 'Invalid slot ID provided.');
        redirect('/admin/dashboard');
    }
    
    // Get slot details
    $slot = $db->query("
        SELECT slot_time FROM time_slots WHERE id = :id
    ", ['id' => $slotId])->find();
    
    if (!$slot) {
        Session::flash('error', 'Time slot not found.');
        redirect('/admin/dashboard');
    }
    
    // Get all bookings for this slot with payment information
    $bookings = $db->query("
        SELECT b.*, bg.stripe_payment_id, bg.ref, ts.slot_time
        FROM bookings b
        JOIN booking_groups bg ON b.booking_group_id = bg.id
        JOIN time_slots ts ON b.time_slot_id = ts.id
        WHERE b.time_slot_id = :slot_id
    ", ['slot_id' => $slotId])->get();
    
    // Process refunds and send cancellation emails
    foreach ($bookings as $booking) {
        $refundSuccessful = false;
        $refundAmount = 20.00; // £20.00 per bed
        
        // Attempt Stripe refund
        try {
            $refund = Refund::create([
                'payment_intent' => $booking['stripe_payment_id'],
                'amount' => 2000 // £20.00 in pence per bed
            ]);
            $refundSuccessful = true;
            error_log("Stripe refund successful for booking ID: " . $booking['id']);
        } catch (Exception $e) {
            error_log("Stripe refund failed: " . $e->getMessage());
        }
        
        // Send cancellation email
        if ($refundSuccessful) {
            sendSlotCancellationEmail($booking, $refundAmount);
        }
    }
    
    // Delete all bookings for this slot
    $db->query("DELETE FROM bookings WHERE time_slot_id = :slot_id", ['slot_id' => $slotId]);
    
    // Delete booking groups that no longer have bookings
    $db->query("
        DELETE bg FROM booking_groups bg
        LEFT JOIN bookings b ON bg.id = b.booking_group_id
        WHERE b.id IS NULL
    ");
    
    // Delete the time slot
    $db->query("DELETE FROM time_slots WHERE id = :id", ['id' => $slotId]);
    
    Session::flash('success', 'Time slot deleted successfully. All affected customers have been refunded and notified.');
}

function sendSlotCancellationEmail($booking, $refundAmount) {
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'admin@flowhavenstudios.com';
        $mail->Password = 'ggyjcchsxmawgjmj';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email content
        $mail->setFrom('admin@flowhavenstudios.com', 'Flow Haven Studios');
        $mail->addAddress($booking['email'], $booking['first_name'] . ' ' . $booking['last_name']);
        $mail->isHTML(true);
        $mail->Subject = 'Session Cancellation & Full Refund - Flow Haven Studios';
        
        // Get the base URL for the logo
        $baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
        $logoUrl = $baseUrl . '/assets/images/flowHavenTransparent.png';
        
        // Parse the slot_time datetime
        $slotDateTime = new DateTime($booking['slot_time']);
        $formattedDate = $slotDateTime->format('l, F j, Y');
        $formattedTime = $slotDateTime->format('g:i A');
        
        // Create HTML email template
        $emailBody = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Cancellation - Flow Haven Studios</title>
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
        .cancellation-details {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            border-left: 4px solid #dc3545;
        }
        .cancellation-details h2 {
            color: #dc3545;
            margin-top: 0;
            font-size: 20px;
            font-weight: 600;
        }
        .refund-details {
            background-color: #d4edda;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            border-left: 4px solid #28a745;
        }
        .refund-details h2 {
            color: #28a745;
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
            background-color: #fff3cd;
            color: #856404;
            padding: 15px;
            border-radius: 6px;
            margin: 20px 0;
            font-weight: 500;
            border-left: 4px solid #ffc107;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="' . $logoUrl . '" alt="Flow Haven Studios Logo">
            <h1>Session Cancellation Notice</h1>
        </div>
        
        <div class="content">
            <div class="greeting">Hi ' . htmlspecialchars($booking['first_name']) . ',</div>
            
            <p>We regret to inform you that we need to cancel your upcoming Pilates session at Flow Haven Studios due to unforeseen scheduling changes. We sincerely apologize for any inconvenience this may cause.</p>
            
            <div class="cancellation-details">
                <h2>❌ Cancelled Session Details</h2>
                <div class="detail-row">
                    <span class="detail-label">Date:</span> ' . $formattedDate . '
                </div>
                <div class="detail-row">
                    <span class="detail-label">Time:</span> ' . $formattedTime . '
                </div>
                <div class="detail-row">
                    <span class="detail-label">Booking Reference:</span> ' . htmlspecialchars($booking['ref']) . '
                </div>
            </div>
            
            <div class="refund-details">
                <h2>💰 Full Refund Processing</h2>
                <div class="detail-row">
                    <span class="detail-label">Refund Amount:</span> £' . number_format($refundAmount, 2) . '
                </div>
                <div class="detail-row">
                    <span class="detail-label">Processing Time:</span> 5-10 business days
                </div>
                <div class="detail-row">
                    <span class="detail-label">Refund Method:</span> Original payment method
                </div>
            </div>
            
            <div class="important-note">
                <strong>Good news:</strong> Your full refund has been processed automatically and will appear on your original payment method within 5-10 business days. No action is required from you.
            </div>
            
            <div class="section">
                <h3>We\'d Love to Welcome You Back</h3>
                <p>While we\'re truly sorry about this cancellation, we hope you\'ll give us another chance to provide you with an amazing Pilates experience. Our doors are always open, and we\'d love to welcome you to Flow Haven Studios at a more suitable time.</p>
                
                <div style="text-align: center; margin: 25px 0;">
                    <a href="' . $baseUrl . '/book" class="btn">Book Another Session</a>
                </div>
            </div>
            
            <div class="contact-info">
                <h3>Questions or Concerns?</h3>
                <p>If you have any questions about this cancellation or your refund, please don\'t hesitate to reach out:<br>
                <strong>📧 admin@flowhavenstudios.com</strong></p>
            </div>
            
            <p style="text-align: center; font-size: 18px; color: #845d45; font-weight: 600; margin: 30px 0;">
                Thank you for your understanding
            </p>
            
            <p style="text-align: center;">
                Sincere apologies,<br>
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
        
        // Plain text version
        $mail->AltBody = "Hi " . $booking['first_name'] . ",

We regret to inform you that we need to cancel your upcoming Pilates session at Flow Haven Studios due to unforeseen scheduling changes.

Cancelled Session Details:
Date: " . $formattedDate . "
Time: " . $formattedTime . "
Booking Reference: " . $booking['ref'] . "

Full Refund Information:
Amount: £" . number_format($refundAmount, 2) . "
Processing Time: 5-10 business days
Method: Original payment method

Your full refund has been processed automatically and will appear on your original payment method within 5-10 business days.

We'd love to welcome you back! Book another session at: " . $baseUrl . "/book

Questions? Contact us at admin@flowhavenstudios.com

Thank you for your understanding.

Sincere apologies,
The Flow Haven Team";

        // Send email
        $mail->send();
        error_log("Slot cancellation email sent successfully to " . $booking['email']);
        
    } catch (Exception $e) {
        // Log email sending error
        error_log("Slot cancellation email could not be sent. Mailer Error: {$mail->ErrorInfo}");
    }
}

redirect('/admin/dashboard');