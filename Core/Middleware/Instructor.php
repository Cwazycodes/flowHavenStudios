<?php

namespace Core\Middleware;

class Instructor
{
    public function handle()
    {
        if (!isset($_SESSION['user']) || !in_array($_SESSION['user']['role'], ['admin', 'instructor'])) {
            header('location: /');
            exit();
        }
    }
}

