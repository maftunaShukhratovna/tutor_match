<?php
namespace App\Models;

use App\Traits\HasApiTokens;

class User extends DB
{
    use HasApiTokens;

    public function create(string $full_name, string $email, string $password): bool
    {
        $query = "INSERT INTO users (full_name, email, password, updated_at, created_at) VALUES (?, ?, ?, NOW(), NOW())";
        $stmt = $this->conn->prepare($query);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("sss", $full_name, $email, $hashedPassword);

        $stmt->execute();
        $userId = $this->conn->insert_id;

        $this->createApiToken($userId);

        //echo $this->api_tokens;
        return true;

    }


    public function getUser(string $email, string $password): bool
    {
        $query = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            $this->createApiToken($user['id']);
            return true;
        } else {
            return false;
        }
    }

    public function getUserById(int $id){
        $query = "SELECT id,full_name, email, updated_at, created_at FROM users WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }

}
