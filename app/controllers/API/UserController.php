<?php

namespace App\Controllers\API;

use App\Models\User;
use App\Traits\Validator;
use JetBrains\PhpStorm\NoReturn;

class UserController
{
    use Validator;

    #[NoReturn] public function store(): void
    {
        $userData = $this->validate([
            'full_name' => 'string',
            'email' => 'string',
            'password' => 'string',
        ]);

        $user = new User();

        //var_dump($user);

        $userCreated = $user->create(
            $userData['full_name'],
            $userData['email'],
            $userData['password']
        );

        if ($userCreated) {
            apiResponse(['message' => 'User created successfully'], 201);
        }

    }
}
