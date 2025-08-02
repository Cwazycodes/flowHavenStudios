<?php

namespace Core;

class PasswordReset
{
    protected $db;

    public function __construct()
    {
        $this->db = App::resolve(Database::class);
    }

    public function createResetToken($email)
    {
        // generate a secure random token
        $token = bin2hex(random_bytes(32));
        
        // token expires in 1 hour
        $expiresAt = date('Y-m-d H:i:s', strtotime('+1 hour'));
        
        // delete any existing tokens for this email
        $this->deleteExistingTokens($email);
        
        // insert new token
        $sql = "INSERT INTO password_reset_tokens (email, token, expires_at) VALUES (:email, :token, :expires_at)";
        
        $this->db->query($sql, [
            'email' => $email,
            'token' => $token,
            'expires_at' => $expiresAt
        ]);

        return $token;
    }

    public function verifyToken($token)
    {
        $sql = "SELECT * FROM password_reset_tokens 
                WHERE token = :token 
                AND expires_at > NOW() 
                AND used = FALSE";
        
        return $this->db->query($sql, ['token' => $token])->find();
    }

    public function useToken($token)
    {
        $sql = "UPDATE password_reset_tokens SET used = TRUE WHERE token = :token";
        $this->db->query($sql, ['token' => $token]);
    }

    public function deleteExistingTokens($email)
    {
        $sql = "DELETE FROM password_reset_tokens WHERE email = :email";
        $this->db->query($sql, ['email' => $email]);
    }

    public function cleanupExpiredTokens()
    {
        $sql = "DELETE FROM password_reset_tokens WHERE expires_at < NOW()";
        $this->db->query($sql);
    }

    public function updatePassword($email, $newPassword)
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        
        $sql = "UPDATE users SET password = :password WHERE email = :email";
        $this->db->query($sql, [
            'password' => $hashedPassword,
            'email' => $email
        ]);
    }

    public function emailExists($email)
    {
        $sql = "SELECT id FROM users WHERE email = :email";
        $user = $this->db->query($sql, ['email' => $email])->find();
        return $user !== false;
    }
}