<?php

return [
    'database' => [
        'host' => 'localhost',
        'port' => 3306,
        'dbname' => 'fh_test',
        'charset' => 'utf8mb4'
    ],

    'email' => [
        // SMTP settings - you'll need to configure these
        'smtp_host' => 'smtp.gmail.com', 
        'smtp_port' => 587,
        'smtp_username' => 'your-email@gmail.com', 
        'smtp_password' => 'your-app-password', 
        'smtp_encryption' => 'tls', // or 'ssl'
        
        // Email settings
        'from_email' => 'noreply@flowhaven.com',
        'from_name' => 'Flow Haven Studios',
        'reply_to' => 'hello@flowhaven.com',
        
        // App settings
        'app_url' => 'http://localhost:8000', // change to the domain in production
        'company_name' => 'Flow Haven Studios'
    ]

    //
];