<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Traits\Validator;
use Src\Auth;
use App\Models\Students;
use App\Models\Teachers;

class UserController
{
    use Validator;

    public function store(): void
    {
        $userData = $this->validate([
            'full_name' => 'string',
            'email' => 'string',
            'password' => 'string',
            'status' => 'string',
        ]);
    
        $user = new User();
        $userCreated = $user->create(
            $userData['full_name'],
            $userData['email'],
            $userData['password'],
            $userData['status']
        );


        if($userData['status'] == 'Learner'){
            $student = new Students();
            $studentCreated = $student->create(
                $userCreated,
                $userData['full_name'],
                $userData['email'],
                $userData['password'],
                );
        }

        if($userData['status'] == 'Teacher'){
            $teacher = new Teachers();
            $teacherCreated = $teacher->create(
                $userCreated,
                $userData['full_name'],
                $userData['email'],
                $userData['password'],
                );
            }

    
        if ($userCreated) {
            apiResponse([
                'message' => 'User created successfully',
                'token' => $user->api_tokens,
            ]);
           
        } else {
            apiResponse(['message' => 'User creation failed'], 400);
        }
    }

    public function login()
    {
        $userData = $this->validate([
            'email' => 'string',
            'password' => 'string',
        ]);

        $user = new User();
        
        $data=$user->getUser($userData['email'], $userData['password']);

            apiResponse([
                'message' => 'User logged in successfully',
                'token' => $user->api_tokens,
                'data'=> $data,
            ]);
        

        apiResponse([
            'errors' => [
                'message' => 'Password or email is incorrect',
            ]
        ], 401);
    }


    

    

}
