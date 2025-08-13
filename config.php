<?php

return [
    'database' => [
        'host' => $_ENV['DB_HOST'] ?? 'localhost',
        'port' => $_ENV['DB_PORT'] ?? 3306,
        'dbname' => $_ENV['DB_DATABASE'] ?? '',
        'charset' => $_ENV['DB_CHARSET'] ?? 'utf8mb4',
    ],

    'email' => [
        'smtp_host' => $_ENV['SMTP_HOST'] ?? 'smtp.gmail.com',
        'smtp_port' => $_ENV['SMTP_PORT'] ?? 587,
        'smtp_username' => $_ENV['SMTP_USERNAME'] ?? '',
        'smtp_password' => $_ENV['SMTP_PASSWORD'] ?? '',
        'smtp_encryption' => $_ENV['SMTP_ENCRYPTION'] ?? 'tls',
        'from_email' => $_ENV['FROM_EMAIL'] ?? '',
        'from_name' => $_ENV['FROM_NAME'] ?? 'Flow Haven Studios',
        'reply_to' => $_ENV['REPLY_TO_EMAIL'] ?? '',
        'app_url' => $_ENV['APP_URL'] ?? 'http://localhost:8000'
    ],

    'stripe' => [
        'secret_key' => $_ENV['STRIPE_SECRET_KEY'] ?? '',
        'public_key' => $_ENV['STRIPE_PUBLIC_KEY'] ?? ''
    ],

    'app' => [
        'url' => $_ENV['APP_URL'] ?? 'http://localhost:8000',
        'environment' => $_ENV['APP_ENV'] ?? 'production'
    ]
];