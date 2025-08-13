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

        // Server settings using environment variables
        $this->mailer->isSMTP();
        $this->mailer->Host = $_ENV['SMTP_HOST'];
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = $_ENV['SMTP_USERNAME'];
        $this->mailer->Password = $_ENV['SMTP_PASSWORD'];
        $this->mailer->SMTPSecure = $_ENV['SMTP_ENCRYPTION'];
        $this->mailer->Port = $_ENV['SMTP_PORT'];

        // Default sender
        $this->mailer->setFrom(
            $_ENV['FROM_EMAIL'], 
            $_ENV['FROM_NAME']
        );
        $this->mailer->addReplyTo($_ENV['REPLY_TO_EMAIL']);

        // Content settings
        $this->mailer->isHTML(true);
        $this->mailer->CharSet = 'UTF-8';
    }

    public function sendPasswordReset($email, $token, $userName = '')
    {
        try {
            $resetUrl = $_ENV['APP_URL'] . '/reset-password?token=' . $token;
            
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
                    
                    <a href='" . $_ENV['APP_URL'] . "' class='button'>explore classes</a>
                    
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

ready to book your first class? visit our website at " . $_ENV['APP_URL'] . " or give us a call.

if you have any questions, don't hesitate to reach out. welcome to the family!

---
flow haven studios
boutique reformer pilates studio in bethnal green
find your flow
        ";
    }

    // Add other email methods with environment variables...
    // (I'll include key methods for brevity)
}