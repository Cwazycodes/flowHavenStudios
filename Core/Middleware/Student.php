<?php

namespace Core\Middleware;

class Student
{
    public function handle()
    {
        if (!isset($_SESSION['user']) || !in_array($_SESSION['user']['role'], ['admin', 'instructor', 'student'])) {
            header('location: /');
            exit();
        }
    }
}

