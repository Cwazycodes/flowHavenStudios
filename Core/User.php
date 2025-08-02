<?php

namespace Core;

class User
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function create($userData)
    {
        // Hash the password
        $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (email, password, first_name, last_name, phone, role, location_id, status) 
                VALUES (:email, :password, :first_name, :last_name, :phone, :role, :location_id, :status)";
        
        $this->db->query($sql, [
            'email' => $userData['email'],
            'password' => $userData['password'],
            'first_name' => $userData['first_name'],
            'last_name' => $userData['last_name'],
            'phone' => $userData['phone'] ?? null,
            'role' => $userData['role'] ?? 'student',
            'location_id' => $userData['location_id'] ?? 1, // Default to Bethnal Green
            'status' => $userData['status'] ?? 'active'
        ]);

        return $this->db->connection->lastInsertId();
    }

    public function findByEmail($email)
    {
        return $this->db->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email
        ])->find();
    }

    public function findById($id)
    {
        return $this->db->query('SELECT * FROM users WHERE id = :id', [
            'id' => $id
        ])->find();
    }

    public function createStudentProfile($userId, $profileData)
    {
        $sql = "INSERT INTO student_profiles (user_id, preferred_location_id, date_of_birth, emergency_contact_name, emergency_contact_phone, medical_conditions, fitness_level, marketing_consent) 
                VALUES (:user_id, :preferred_location_id, :date_of_birth, :emergency_contact_name, :emergency_contact_phone, :medical_conditions, :fitness_level, :marketing_consent)";
        
        $this->db->query($sql, [
            'user_id' => $userId,
            'preferred_location_id' => $profileData['location_id'] ?? 1, // Default to Bethnal Green
            'date_of_birth' => $profileData['date_of_birth'] ?? null,
            'emergency_contact_name' => $profileData['emergency_contact_name'] ?? null,
            'emergency_contact_phone' => $profileData['emergency_contact_phone'] ?? null,
            'medical_conditions' => $profileData['medical_conditions'] ?? null,
            'fitness_level' => $profileData['fitness_level'] ?? 'beginner',
            'marketing_consent' => $profileData['marketing_consent'] ?? false
        ]);
    }

    public function createInstructorProfile($userId, $profileData)
    {
        $sql = "INSERT INTO instructor_profiles (user_id, bio, specializations, certifications, profile_image, instagram_handle, is_featured) 
                VALUES (:user_id, :bio, :specializations, :certifications, :profile_image, :instagram_handle, :is_featured)";
        
        $this->db->query($sql, [
            'user_id' => $userId,
            'bio' => $profileData['bio'] ?? null,
            'specializations' => $profileData['specializations'] ?? null,
            'certifications' => $profileData['certifications'] ?? null,
            'profile_image' => $profileData['profile_image'] ?? null,
            'instagram_handle' => $profileData['instagram_handle'] ?? null,
            'is_featured' => $profileData['is_featured'] ?? false
        ]);
    }

    public function getUserWithProfile($userId)
    {
        $user = $this->findById($userId);
        
        if (!$user) {
            return null;
        }

        // Get user's location
        if ($user['location_id']) {
            $location = $this->db->query('SELECT * FROM locations WHERE id = :id', [
                'id' => $user['location_id']
            ])->find();
            $user['location'] = $location;
        }

        if ($user['role'] === 'student') {
            $profile = $this->db->query('SELECT sp.*, l.name as preferred_location_name FROM student_profiles sp LEFT JOIN locations l ON sp.preferred_location_id = l.id WHERE sp.user_id = :user_id', [
                'user_id' => $userId
            ])->find();
            
            $user['profile'] = $profile;
        } elseif ($user['role'] === 'instructor') {
            $profile = $this->db->query('SELECT * FROM instructor_profiles WHERE user_id = :user_id', [
                'user_id' => $userId
            ])->find();
            
            $user['profile'] = $profile;
        }

        return $user;
    }

    public function emailExists($email)
    {
        $user = $this->findByEmail($email);
        return $user !== false;
    }

    public function updateLastLogin($userId)
    {
        $this->db->query('UPDATE users SET updated_at = CURRENT_TIMESTAMP WHERE id = :id', [
            'id' => $userId
        ]);
    }
}