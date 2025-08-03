<?php

namespace Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailService
{
    protected $config;
    protected $mailer;

    public function __construct()
    {
        $this->config = require base_path('config.php');
        $this->setupMailer();
    }

    protected function setupMailer()
    {
        $this->mailer = new PHPMailer(true);

        // Server settings
        $this->mailer->isSMTP();
        $this->mailer->Host = $this->config['email']['smtp_host'];
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $this->config['email']['smtp_username'];
        $this->mailer->Password = $this->config['email']['smtp_password'];
        $this->mailer->SMTPSecure = $this->config['email']['smtp_encryption'];
        $this->mailer->Port = $this->config['email']['smtp_port'];

        // Default sender
        $this->mailer->setFrom(
            $this->config['email']['from_email'], 
            $this->config['email']['from_name']
        );
        $this->mailer->addReplyTo($this->config['email']['reply_to']);

        // Content settings
        $this->mailer->isHTML(true);
        $this->mailer->CharSet = 'UTF-8';
    }

    public function sendPasswordReset($email, $token, $userName = '')
    {
        try {
            $resetUrl = $this->config['email']['app_url'] . '/reset-password?token=' . $token;
            
            $this->mailer->clearAddresses();
            $this->mailer->addAddress($email);
            
            $this->mailer->Subject = 'reset your flow haven password';
            
            // Create HTML email content
            $htmlBody = $this->getPasswordResetTemplate($resetUrl, $userName);
            $this->mailer->Body = $htmlBody;
            
            // Create plain text version
            $textBody = $this->getPasswordResetTextTemplate($resetUrl, $userName);
            $this->mailer->AltBody = $textBody;

            $this->mailer->send();
            return ['success' => true];
            
        } catch (Exception $e) {
            error_log("Email send failed: " . $this->mailer->ErrorInfo);
            return ['success' => false, 'error' => $this->mailer->ErrorInfo];
        }
    }

    public function sendWelcomeEmail($email, $firstName)
    {
        try {
            $this->mailer->clearAddresses();
            $this->mailer->addAddress($email);
            
            $this->mailer->Subject = 'welcome to flow haven studios!';
            
            $htmlBody = $this->getWelcomeTemplate($firstName);
            $this->mailer->Body = $htmlBody;
            
            $textBody = $this->getWelcomeTextTemplate($firstName);
            $this->mailer->AltBody = $textBody;

            $this->mailer->send();
            return ['success' => true];
            
        } catch (Exception $e) {
            error_log("Welcome email send failed: " . $this->mailer->ErrorInfo);
            return ['success' => false, 'error' => $this->mailer->ErrorInfo];
        }
    }

    protected function getPasswordResetTemplate($resetUrl, $userName = '')
    {
        $greeting = $userName ? "hi " . strtolower($userName) . "," : "hi there,";
        
        return "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>reset your password - flow haven studios</title>
            <style>
                body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 0; background-color: #f2e9dc; }
                .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; }
                .header { background-color: #845d45; padding: 30px; text-align: center; }
                .header h1 { color: #ffffff; margin: 0; font-size: 24px; font-weight: 600; }
                .content { padding: 40px 30px; }
                .content h2 { color: #2b2a24; margin: 0 0 20px 0; font-size: 20px; }
                .content p { color: #666666; line-height: 1.6; margin: 0 0 20px 0; }
                .button { display: inline-block; background-color: #845d45; color: #ffffff; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-weight: 600; margin: 20px 0; }
                .button:hover { background-color: #6e4635; }
                .footer { background-color: #e8d7c3; padding: 20px 30px; text-align: center; }
                .footer p { color: #845d45; margin: 0; font-size: 14px; }
                .link { color: #845d45; text-decoration: none; }
                .small { font-size: 12px; color: #999999; margin-top: 20px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>flow haven studios</h1>
                </div>
                <div class='content'>
                    <h2>reset your password</h2>
                    <p>{$greeting}</p>
                    <p>we received a request to reset your password for your flow haven studios account. if you made this request, click the button below to create a new password:</p>
                    
                    <a href='{$resetUrl}' class='button'>reset password</a>
                    
                    <p>this link will expire in 1 hour for security reasons.</p>
                    
                    <p>if you didn't request a password reset, you can safely ignore this email. your password will remain unchanged.</p>
                    
                    <p class='small'>if the button doesn't work, copy and paste this link into your browser:<br>
                    <a href='{$resetUrl}' class='link'>{$resetUrl}</a></p>
                </div>
                <div class='footer'>
                    <p>flow haven studios - boutique reformer pilates studio in bethnal green</p>
                    <p>find your flow</p>
                </div>
            </div>
        </body>
        </html>";
    }

    protected function getPasswordResetTextTemplate($resetUrl, $userName = '')
    {
        $greeting = $userName ? "hi " . strtolower($userName) . "," : "hi there,";
        
        return "
FLOW HAVEN STUDIOS - PASSWORD RESET

{$greeting}

we received a request to reset your password for your flow haven studios account.

to reset your password, click this link:
{$resetUrl}

this link will expire in 1 hour for security reasons.

if you didn't request a password reset, you can safely ignore this email. your password will remain unchanged.

---
flow haven studios
boutique reformer pilates studio in bethnal green
find your flow
        ";
    }

    protected function getWelcomeTemplate($firstName)
    {
        return "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>welcome to flow haven studios!</title>
            <style>
                body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 0; background-color: #f2e9dc; }
                .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; }
                .header { background-color: #845d45; padding: 30px; text-align: center; }
                .header h1 { color: #ffffff; margin: 0; font-size: 24px; font-weight: 600; }
                .content { padding: 40px 30px; }
                .content h2 { color: #2b2a24; margin: 0 0 20px 0; font-size: 20px; }
                .content p { color: #666666; line-height: 1.6; margin: 0 0 20px 0; }
                .button { display: inline-block; background-color: #845d45; color: #ffffff; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-weight: 600; margin: 20px 0; }
                .footer { background-color: #e8d7c3; padding: 20px 30px; text-align: center; }
                .footer p { color: #845d45; margin: 0; font-size: 14px; }
                .features { background-color: #f9f9f9; padding: 20px; border-radius: 5px; margin: 20px 0; }
                .feature { margin-bottom: 15px; }
                .feature strong { color: #845d45; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>flow haven studios</h1>
                </div>
                <div class='content'>
                    <h2>welcome to the flow family, " . strtolower($firstName) . "!</h2>
                    <p>we're thrilled to have you join our boutique reformer pilates community in bethnal green.</p>
                    
                    <div class='features'>
                        <div class='feature'><strong>✨ personalized attention:</strong> small group classes mean you get the focus you deserve</div>
                        <div class='feature'><strong>🏋️‍♀️ expert instruction:</strong> our certified instructors will guide you safely through every movement</div>
                        <div class='feature'><strong>📍 prime location:</strong> conveniently located in the heart of bethnal green</div>
                        <div class='feature'><strong>🧘‍♀️ mind-body connection:</strong> discover strength, flexibility, and inner peace</div>
                    </div>
                    
                    <p>ready to book your first class? visit our website or give us a call. we can't wait to help you find your flow!</p>
                    
                    <a href='" . $this->config['email']['app_url'] . "' class='button'>explore classes</a>
                    
                    <p>if you have any questions, don't hesitate to reach out. welcome to the family!</p>
                </div>
                <div class='footer'>
                    <p>flow haven studios - boutique reformer pilates studio in bethnal green</p>
                    <p>find your flow</p>
                </div>
            </div>
        </body>
        </html>";
    }

    protected function getWelcomeTextTemplate($firstName)
    {
        return "
WELCOME TO FLOW HAVEN STUDIOS!

hi " . strtolower($firstName) . ",

we're thrilled to have you join our boutique reformer pilates community in bethnal green.

what makes flow haven special:
✨ personalized attention: small group classes mean you get the focus you deserve
🏋️‍♀️ expert instruction: our certified instructors will guide you safely through every movement  
📍 prime location: conveniently located in the heart of bethnal green
🧘‍♀️ mind-body connection: discover strength, flexibility, and inner peace

ready to book your first class? visit our website at " . $this->config['email']['app_url'] . " or give us a call.

if you have any questions, don't hesitate to reach out. welcome to the family!

---
flow haven studios
boutique reformer pilates studio in bethnal green
find your flow
        ";
    }

    public function sendInstructorWelcomeEmail($email, $firstName, $tempPassword)
{
    try {
        $this->mailer->clearAddresses();
        $this->mailer->addAddress($email);
        
        $this->mailer->Subject = 'welcome to the flow haven team!';
        
        $htmlBody = $this->getInstructorWelcomeTemplate($firstName, $tempPassword);
        $this->mailer->Body = $htmlBody;
        
        $textBody = $this->getInstructorWelcomeTextTemplate($firstName, $tempPassword);
        $this->mailer->AltBody = $textBody;

        $this->mailer->send();
        return ['success' => true];
        
    } catch (Exception $e) {
        error_log("Instructor welcome email failed: " . $this->mailer->ErrorInfo);
        return ['success' => false, 'error' => $this->mailer->ErrorInfo];
    }
}

public function sendBookingConfirmationEmail($email, $firstName, $instructorName, $startTime, $endTime)
{
    try {
        $this->mailer->clearAddresses();
        $this->mailer->addAddress($email);
        
        $this->mailer->Subject = 'class booking confirmed - flow haven studios';
        
        $htmlBody = $this->getBookingConfirmationTemplate($firstName, $instructorName, $startTime, $endTime);
        $this->mailer->Body = $htmlBody;
        
        $textBody = $this->getBookingConfirmationTextTemplate($firstName, $instructorName, $startTime, $endTime);
        $this->mailer->AltBody = $textBody;

        $this->mailer->send();
        return ['success' => true];
        
    } catch (Exception $e) {
        error_log("Booking confirmation email failed: " . $this->mailer->ErrorInfo);
        return ['success' => false, 'error' => $this->mailer->ErrorInfo];
    }
}

public function sendBookingCancellationEmail($email, $firstName, $instructorName, $startTime)
{
    try {
        $this->mailer->clearAddresses();
        $this->mailer->addAddress($email);
        
        $this->mailer->Subject = 'class booking cancelled - flow haven studios';
        
        $htmlBody = $this->getBookingCancellationTemplate($firstName, $instructorName, $startTime);
        $this->mailer->Body = $htmlBody;
        
        $textBody = $this->getBookingCancellationTextTemplate($firstName, $instructorName, $startTime);
        $this->mailer->AltBody = $textBody;

        $this->mailer->send();
        return ['success' => true];
        
    } catch (Exception $e) {
        error_log("Booking cancellation email failed: " . $this->mailer->ErrorInfo);
        return ['success' => false, 'error' => $this->mailer->ErrorInfo];
    }
}

public function sendClassCancellationEmail($email, $firstName, $instructorName, $startTime)
{
    try {
        $this->mailer->clearAddresses();
        $this->mailer->addAddress($email);
        
        $this->mailer->Subject = 'class cancelled - flow haven studios';
        
        $htmlBody = $this->getClassCancellationTemplate($firstName, $instructorName, $startTime);
        $this->mailer->Body = $htmlBody;
        
        $textBody = $this->getClassCancellationTextTemplate($firstName, $instructorName, $startTime);
        $this->mailer->AltBody = $textBody;

        $this->mailer->send();
        return ['success' => true];
        
    } catch (Exception $e) {
        error_log("Class cancellation email failed: " . $this->mailer->ErrorInfo);
        return ['success' => false, 'error' => $this->mailer->ErrorInfo];
    }
}

public function sendCancellationConfirmationEmail($email, $firstName, $instructorName, $startTime, $lateCancellation = false)
{
    try {
        $this->mailer->clearAddresses();
        $this->mailer->addAddress($email);
        
        $this->mailer->Subject = 'booking cancellation confirmed - flow haven studios';
        
        $htmlBody = $this->getCancellationConfirmationTemplate($firstName, $instructorName, $startTime, $lateCancellation);
        $this->mailer->Body = $htmlBody;
        
        $textBody = $this->getCancellationConfirmationTextTemplate($firstName, $instructorName, $startTime, $lateCancellation);
        $this->mailer->AltBody = $textBody;

        $this->mailer->send();
        return ['success' => true];
        
    } catch (Exception $e) {
        error_log("Cancellation confirmation email failed: " . $this->mailer->ErrorInfo);
        return ['success' => false, 'error' => $this->mailer->ErrorInfo];
    }
}

// Email template methods (add to EmailService.php)
protected function getInstructorWelcomeTemplate($firstName, $tempPassword)
{
    return "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <title>welcome to flow haven studios!</title>
        <style>
            body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 0; background-color: #f2e9dc; }
            .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; }
            .header { background-color: #845d45; padding: 30px; text-align: center; }
            .header h1 { color: #ffffff; margin: 0; font-size: 24px; font-weight: 600; }
            .content { padding: 40px 30px; }
            .content h2 { color: #2b2a24; margin: 0 0 20px 0; font-size: 20px; }
            .content p { color: #666666; line-height: 1.6; margin: 0 0 20px 0; }
            .credentials { background-color: #f9f7f4; padding: 20px; border-radius: 5px; margin: 20px 0; }
            .footer { background-color: #e8d7c3; padding: 20px 30px; text-align: center; }
            .footer p { color: #845d45; margin: 0; font-size: 14px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>flow haven studios</h1>
            </div>
            <div class='content'>
                <h2>welcome to the team, " . strtolower($firstName) . "!</h2>
                <p>we're thrilled to have you join our instructor team at flow haven studios.</p>
                
                <p>your instructor account has been created with the following temporary credentials:</p>
                
                <div class='credentials'>
                    <p><strong>email:</strong> [your email address]</p>
                    <p><strong>temporary password:</strong> {$tempPassword}</p>
                </div>
                
                <p>please log in and change your password as soon as possible. you can also update your bio, certifications, and other profile information from your instructor dashboard.</p>
                
                <p>we look forward to working with you to help our students find their flow!</p>
            </div>
            <div class='footer'>
                <p>flow haven studios - boutique reformer pilates studio in bethnal green</p>
                <p>find your flow</p>
            </div>
        </div>
    </body>
    </html>";
}

protected function getBookingConfirmationTemplate($firstName, $instructorName, $startTime, $endTime)
{
    $classDate = date('l, F j, Y', strtotime($startTime));
    $classTime = date('g:i A', strtotime($startTime)) . ' - ' . date('g:i A', strtotime($endTime));
    
    return "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <title>class booking confirmed</title>
        <style>
            body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 0; background-color: #f2e9dc; }
            .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; }
            .header { background-color: #845d45; padding: 30px; text-align: center; }
            .header h1 { color: #ffffff; margin: 0; font-size: 24px; font-weight: 600; }
            .content { padding: 40px 30px; }
            .content h2 { color: #2b2a24; margin: 0 0 20px 0; font-size: 20px; }
            .content p { color: #666666; line-height: 1.6; margin: 0 0 20px 0; }
            .class-details { background-color: #f9f7f4; padding: 20px; border-radius: 5px; margin: 20px 0; }
            .footer { background-color: #e8d7c3; padding: 20px 30px; text-align: center; }
            .footer p { color: #845d45; margin: 0; font-size: 14px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>flow haven studios</h1>
            </div>
            <div class='content'>
                <h2>your class is booked!</h2>
                <p>hi " . strtolower($firstName) . ",</p>
                <p>your reformer pilates class has been successfully booked. here are your class details:</p>
                
                <div class='class-details'>
                    <p><strong>instructor:</strong> {$instructorName}</p>
                    <p><strong>date:</strong> {$classDate}</p>
                    <p><strong>time:</strong> {$classTime}</p>
                    <p><strong>location:</strong> bethnal green studio</p>
                    <p><strong>address:</strong> 115 coventry road, london, e2 6gb</p>
                </div>
                
                <p><strong>what to bring:</strong></p>
                <ul>
                    <li>water bottle</li>
                    <li>towel</li>
                    <li>comfortable athletic wear</li>
                </ul>
                
                <p><strong>please arrive 10 minutes early</strong> to get settled in.</p>
                
                <p>if you need to cancel, please do so at least 12 hours before class time to avoid cancellation fees.</p>
                
                <p>we can't wait to see you on the reformer!</p>
            </div>
            <div class='footer'>
                <p>flow haven studios - boutique reformer pilates studio in bethnal green</p>
                <p>find your flow</p>
            </div>
        </div>
    </body>
    </html>";
}

protected function getInstructorWelcomeTextTemplate($firstName, $tempPassword)
{
    return "
WELCOME TO THE FLOW HAVEN TEAM!

hi " . strtolower($firstName) . ",

we're thrilled to have you join our instructor team at flow haven studios.

your instructor account has been created with the following temporary credentials:

email: [your email address]
temporary password: {$tempPassword}

please log in and change your password as soon as possible. you can also update your bio, certifications, and other profile information from your instructor dashboard.

we look forward to working with you to help our students find their flow!

---
flow haven studios
boutique reformer pilates studio in bethnal green
find your flow
    ";
}

protected function getBookingConfirmationTextTemplate($firstName, $instructorName, $startTime, $endTime)
{
    $classDate = date('l, F j, Y', strtotime($startTime));
    $classTime = date('g:i A', strtotime($startTime)) . ' - ' . date('g:i A', strtotime($endTime));
    
    return "
CLASS BOOKING CONFIRMED - FLOW HAVEN STUDIOS

hi " . strtolower($firstName) . ",

your reformer pilates class has been successfully booked. here are your class details:

instructor: {$instructorName}
date: {$classDate}
time: {$classTime}
location: bethnal green studio
address: 115 coventry road, london, e2 6gb

what to bring:
- water bottle
- towel
- comfortable athletic wear

please arrive 10 minutes early to get settled in.

if you need to cancel, please do so at least 12 hours before class time to avoid cancellation fees.

we can't wait to see you on the reformer!

---
flow haven studios
boutique reformer pilates studio in bethnal green
find your flow
    ";
}

protected function getBookingCancellationTemplate($firstName, $instructorName, $startTime)
{
    $classDate = date('l, F j, Y', strtotime($startTime));
    $classTime = date('g:i A', strtotime($startTime));
    
    return "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <title>class booking cancelled</title>
        <style>
            body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 0; background-color: #f2e9dc; }
            .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; }
            .header { background-color: #845d45; padding: 30px; text-align: center; }
            .header h1 { color: #ffffff; margin: 0; font-size: 24px; font-weight: 600; }
            .content { padding: 40px 30px; }
            .content h2 { color: #2b2a24; margin: 0 0 20px 0; font-size: 20px; }
            .content p { color: #666666; line-height: 1.6; margin: 0 0 20px 0; }
            .class-details { background-color: #f9f7f4; padding: 20px; border-radius: 5px; margin: 20px 0; }
            .footer { background-color: #e8d7c3; padding: 20px 30px; text-align: center; }
            .footer p { color: #845d45; margin: 0; font-size: 14px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>flow haven studios</h1>
            </div>
            <div class='content'>
                <h2>booking cancelled</h2>
                <p>hi " . strtolower($firstName) . ",</p>
                <p>your booking has been cancelled by the studio. we apologize for any inconvenience.</p>
                
                <div class='class-details'>
                    <p><strong>instructor:</strong> {$instructorName}</p>
                    <p><strong>date:</strong> {$classDate}</p>
                    <p><strong>time:</strong> {$classTime}</p>
                    <p><strong>status:</strong> cancelled</p>
                </div>
                
                <p>if this cancellation was due to instructor unavailability or studio issues, you will receive a full refund within 3-5 business days.</p>
                
                <p>we'd love to help you rebook for another time. please check our website or contact us directly.</p>
                
                <p>thank you for your understanding.</p>
            </div>
            <div class='footer'>
                <p>flow haven studios - boutique reformer pilates studio in bethnal green</p>
                <p>find your flow</p>
            </div>
        </div>
    </body>
    </html>";
}

protected function getBookingCancellationTextTemplate($firstName, $instructorName, $startTime)
{
    $classDate = date('l, F j, Y', strtotime($startTime));
    $classTime = date('g:i A', strtotime($startTime));
    
    return "
CLASS BOOKING CANCELLED - FLOW HAVEN STUDIOS

hi " . strtolower($firstName) . ",

your booking has been cancelled by the studio. we apologize for any inconvenience.

cancelled class details:
instructor: {$instructorName}
date: {$classDate}
time: {$classTime}
status: cancelled

if this cancellation was due to instructor unavailability or studio issues, you will receive a full refund within 3-5 business days.

we'd love to help you rebook for another time. please check our website or contact us directly.

thank you for your understanding.

---
flow haven studios
boutique reformer pilates studio in bethnal green
find your flow
    ";
}

protected function getClassCancellationTemplate($firstName, $instructorName, $startTime)
{
    $classDate = date('l, F j, Y', strtotime($startTime));
    $classTime = date('g:i A', strtotime($startTime));
    
    return "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <title>class cancelled</title>
        <style>
            body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 0; background-color: #f2e9dc; }
            .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; }
            .header { background-color: #845d45; padding: 30px; text-align: center; }
            .header h1 { color: #ffffff; margin: 0; font-size: 24px; font-weight: 600; }
            .content { padding: 40px 30px; }
            .content h2 { color: #2b2a24; margin: 0 0 20px 0; font-size: 20px; }
            .content p { color: #666666; line-height: 1.6; margin: 0 0 20px 0; }
            .class-details { background-color: #f9f7f4; padding: 20px; border-radius: 5px; margin: 20px 0; }
            .footer { background-color: #e8d7c3; padding: 20px 30px; text-align: center; }
            .footer p { color: #845d45; margin: 0; font-size: 14px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>flow haven studios</h1>
            </div>
            <div class='content'>
                <h2>class cancelled</h2>
                <p>hi " . strtolower($firstName) . ",</p>
                <p>unfortunately, your upcoming class has been cancelled due to instructor unavailability.</p>
                
                <div class='class-details'>
                    <p><strong>instructor:</strong> {$instructorName}</p>
                    <p><strong>date:</strong> {$classDate}</p>
                    <p><strong>time:</strong> {$classTime}</p>
                    <p><strong>status:</strong> cancelled</p>
                </div>
                
                <p>you will receive a full refund within 3-5 business days. no action is needed on your part.</p>
                
                <p>we sincerely apologize for the inconvenience and would love to help you reschedule. please check our website for available alternative times.</p>
                
                <p>thank you for your understanding and continued support.</p>
            </div>
            <div class='footer'>
                <p>flow haven studios - boutique reformer pilates studio in bethnal green</p>
                <p>find your flow</p>
            </div>
        </div>
    </body>
    </html>";
}

protected function getClassCancellationTextTemplate($firstName, $instructorName, $startTime)
{
    $classDate = date('l, F j, Y', strtotime($startTime));
    $classTime = date('g:i A', strtotime($startTime));
    
    return "
CLASS CANCELLED - FLOW HAVEN STUDIOS

hi " . strtolower($firstName) . ",

unfortunately, your upcoming class has been cancelled due to instructor unavailability.

cancelled class details:
instructor: {$instructorName}
date: {$classDate}
time: {$classTime}
status: cancelled

you will receive a full refund within 3-5 business days. no action is needed on your part.

we sincerely apologize for the inconvenience and would love to help you reschedule. please check our website for available alternative times.

thank you for your understanding and continued support.

---
flow haven studios
boutique reformer pilates studio in bethnal green
find your flow
    ";
}

protected function getCancellationConfirmationTemplate($firstName, $instructorName, $startTime, $lateCancellation = false)
{
    $classDate = date('l, F j, Y', strtotime($startTime));
    $classTime = date('g:i A', strtotime($startTime));
    $feeMessage = $lateCancellation ? 
        "<p><strong>note:</strong> since this cancellation was made within 12 hours of class time, a late cancellation fee may apply as per our policy.</p>" :
        "<p>since you cancelled with more than 12 hours notice, no cancellation fee applies.</p>";
    
    return "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
        <title>cancellation confirmed</title>
        <style>
            body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 0; background-color: #f2e9dc; }
            .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; }
            .header { background-color: #845d45; padding: 30px; text-align: center; }
            .header h1 { color: #ffffff; margin: 0; font-size: 24px; font-weight: 600; }
            .content { padding: 40px 30px; }
            .content h2 { color: #2b2a24; margin: 0 0 20px 0; font-size: 20px; }
            .content p { color: #666666; line-height: 1.6; margin: 0 0 20px 0; }
            .class-details { background-color: #f9f7f4; padding: 20px; border-radius: 5px; margin: 20px 0; }
            .footer { background-color: #e8d7c3; padding: 20px 30px; text-align: center; }
            .footer p { color: #845d45; margin: 0; font-size: 14px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>flow haven studios</h1>
            </div>
            <div class='content'>
                <h2>cancellation confirmed</h2>
                <p>hi " . strtolower($firstName) . ",</p>
                <p>your class cancellation has been processed successfully.</p>
                
                <div class='class-details'>
                    <p><strong>instructor:</strong> {$instructorName}</p>
                    <p><strong>date:</strong> {$classDate}</p>
                    <p><strong>time:</strong> {$classTime}</p>
                    <p><strong>status:</strong> cancelled by you</p>
                </div>
                
                {$feeMessage}
                
                <p>we hope to see you in a future class. you can book another session anytime through your dashboard.</p>
                
                <p>thank you for choosing flow haven studios.</p>
            </div>
            <div class='footer'>
                <p>flow haven studios - boutique reformer pilates studio in bethnal green</p>
                <p>find your flow</p>
            </div>
        </div>
    </body>
    </html>";
}

protected function getCancellationConfirmationTextTemplate($firstName, $instructorName, $startTime, $lateCancellation = false)
{
    $classDate = date('l, F j, Y', strtotime($startTime));
    $classTime = date('g:i A', strtotime($startTime));
    $feeMessage = $lateCancellation ? 
        "note: since this cancellation was made within 12 hours of class time, a late cancellation fee may apply as per our policy." :
        "since you cancelled with more than 12 hours notice, no cancellation fee applies.";
    
    return "
CANCELLATION CONFIRMED - FLOW HAVEN STUDIOS

hi " . strtolower($firstName) . ",

your class cancellation has been processed successfully.

cancelled class details:
instructor: {$instructorName}
date: {$classDate}
time: {$classTime}
status: cancelled by you

{$feeMessage}

we hope to see you in a future class. you can book another session anytime through your dashboard.

thank you for choosing flow haven studios.

---
flow haven studios
boutique reformer pilates studio in bethnal green
find your flow
    ";
}

}



