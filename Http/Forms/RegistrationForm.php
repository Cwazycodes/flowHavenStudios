<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class RegistrationForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        // Validate required fields
        if (!Validator::string($attributes['first_name'] ?? '', 1, 100)) {
            $this->errors['first_name'] = 'First name is required and must be less than 100 characters.';
        }

        if (!Validator::string($attributes['last_name'] ?? '', 1, 100)) {
            $this->errors['last_name'] = 'Last name is required and must be less than 100 characters.';
        }

        if (!Validator::email($attributes['email'] ?? '')) {
            $this->errors['email'] = 'Please provide a valid email address.';
        }

        if (!Validator::string($attributes['password'] ?? '', 6)) {
            $this->errors['password'] = 'Password must be at least 6 characters long.';
        }

        // Validate password confirmation if provided
        if (isset($attributes['confirm_password'])) {
            if ($attributes['password'] !== $attributes['confirm_password']) {
                $this->errors['confirm_password'] = 'Passwords do not match.';
            }
        }

        // Validate phone if provided
        if (!empty($attributes['phone']) && !$this->isValidPhone($attributes['phone'])) {
            $this->errors['phone'] = 'Please provide a valid phone number.';
        }

        // Validate role
        if (!in_array($attributes['role'] ?? 'student', ['admin', 'instructor', 'student'])) {
            $this->errors['role'] = 'Invalid role specified.';
        }

        // Validate fitness level for students
        if (($attributes['role'] ?? 'student') === 'student') {
            if (!in_array($attributes['fitness_level'] ?? 'beginner', ['beginner', 'intermediate', 'advanced'])) {
                $this->errors['fitness_level'] = 'Invalid fitness level.';
            }
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }

    protected function isValidPhone($phone)
    {
        // Basic phone validation - can be enhanced based on requirements
        $phone = preg_replace('/[^0-9+\-\s\(\)]/', '', $phone);
        return strlen($phone) >= 10 && strlen($phone) <= 20;
    }
}