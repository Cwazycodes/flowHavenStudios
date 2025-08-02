<?php

namespace Core;

class Authenticator
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function attempt($email, $password)
    {
        $user = $this->userModel->findByEmail($email);

        if ($user && $user['status'] === 'active') {
            if (password_verify($password, $user['password'])) {
                $this->login($user);
                $this->userModel->updateLastLogin($user['id']);
                return true;
            }
        }

        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'role' => $user['role']
        ];

        // Set role-specific session variables for backwards compatibility
        if ($user['role'] === 'admin') {
            $_SESSION['admin_logged_in'] = true;
        } elseif ($user['role'] === 'instructor') {
            $_SESSION['instructor_logged_in'] = true;
        } elseif ($user['role'] === 'student') {
            $_SESSION['student_logged_in'] = true;
        }

        session_regenerate_id(true);
    }

    public function register($userData)
    {
        // Check if email already exists
        if ($this->userModel->emailExists($userData['email'])) {
            return ['success' => false, 'message' => 'Email already exists'];
        }

        try {
            $userId = $this->userModel->create($userData);
            
            // Create profile based on role
            if ($userData['role'] === 'student') {
                $this->userModel->createStudentProfile($userId, $userData);
            } elseif ($userData['role'] === 'instructor') {
                $this->userModel->createInstructorProfile($userId, $userData);
            }

            return ['success' => true, 'user_id' => $userId];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => 'Registration failed'];
        }
    }

    public function logout()
    {
        Session::destroy();
    }

    public function user()
    {
        return $_SESSION['user'] ?? null;
    }

    public function check()
    {
        return isset($_SESSION['user']);
    }

    public function isAdmin()
    {
        return $this->check() && $_SESSION['user']['role'] === 'admin';
    }

    public function isInstructor()
    {
        return $this->check() && $_SESSION['user']['role'] === 'instructor';
    }

    public function isStudent()
    {
        return $this->check() && $_SESSION['user']['role'] === 'student';
    }

    public function hasRole($role)
    {
        return $this->check() && $_SESSION['user']['role'] === $role;
    }
}