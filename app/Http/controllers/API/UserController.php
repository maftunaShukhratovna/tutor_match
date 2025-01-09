<?php

namespace App\Http\controllers\API;

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
            echo "sucess";
            apiResponse(['message' => 'User created successfully',
                               'token'=>$user->api_tokens,
                              ], 201);
        }

    }

    public function login(){
        $userData=$this->validate([
            'email'=>'string',
            'password'=>'string',
        ]);
        $user=new User;
        if($user->getUser($userData['email'], $userData['password'])){
            apiResponse([
                'message'=>'User logged in succesfully',
                'token'=>$user->api_tokens,
            ]);
        }
    }
}
