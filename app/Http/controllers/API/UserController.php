<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Traits\Validator;
use Src\Auth;
use src\middlewares\AuthMiddleware;

class UserController
{
    use Validator;

    public function store(): void
    {
        $userData = $this->validate([
            'full_name' => 'string',
            'email' => 'string',
            'password' => 'string',
        ]);
    
        $user = new User();
        $userCreated = $user->create(
            $userData['full_name'],
            $userData['email'],
            $userData['password']
        );
    
        if ($userCreated) {

            header('Content-Type: application/json');
            echo json_encode([
                'message' => 'User created successfully',
                'token' => $user->api_tokens,
            ]);
            exit; 
        } else {
            header('Content-Type: application/json');
            echo json_encode(['message' => 'User creation failed']);
            http_response_code(400);
            exit;
        }
    }

    public function login()
    {
        $userData = $this->validate([
            'email' => 'string',
            'password' => 'string',
        ]);

        $user = new User();
        if ($user->getUser($userData['email'], $userData['password'])) {

            apiResponse([
                'message' => 'User logged in successfully',
                'token' => $user->api_tokens,
            ]);
        }

        apiResponse([
            'errors' => [
                'message' => 'Invalid credentials',
            ]
        ], 401);
    }

    public function show()
    {
        $auth = new class {
            use Auth;
        };

        $user = $auth->user();

        apiResponse([
                'data'=> $user,
                'message' => 'user info',
            
        ]);
    }

}
