<?php

namespace App\Traits;

trait HasApiTokens
{
    public string $api_tokens;
    protected string $duration;

    public function createApiToken(int $userId): string
    {
        $this->api_tokens = bin2hex(random_bytes(40));
        $this->duration = date('Y-m-d H:i:s', strtotime('+' . $_ENV["API_TOKEN_EXPIRATION"] . ' day'));

        $query = "INSERT INTO user_api_tokens (user_id, token, expires_at, created_at) VALUES (?, ?, ?, NOW())";
        $stmt = $this->conn->prepare($query);
        

        $stmt->bind_param("iss", $userId, $this->api_tokens, $this->duration);
        $stmt->execute();

        return $this->api_tokens;
    }
}
