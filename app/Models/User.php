<?php
namespace App\Models;

use App\Traits\HasApiTokens;

class User extends DB
{
    use HasApiTokens;

    public function create(string $full_name, string $email, string $password, string $status): int
    {
        $query = "INSERT INTO users (full_name, email, password, status, updated_at, created_at) VALUES (?, ?, ?, ?, NOW(), NOW())";
        $stmt = $this->conn->prepare($query);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("ssss", $full_name, $email, $hashedPassword, $status);

        $stmt->execute();
        $userId = $this->conn->insert_id;

        $this->createApiToken($userId);
        
        return $userId;
    }


    public function getUser(string $email, string $password): array| bool
    {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            $this->createApiToken($user['id']);
            return $user;
        } else 
            return false;
        
    }

    public function getUserById(int $id) {
        $query = "SELECT status FROM users WHERE id = ?";
        $stmt = $this->conn->prepare($query);
    
        $stmt->bind_param('i', $id);
    
        $stmt->execute();
    
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    
    

}
