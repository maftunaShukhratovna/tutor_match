<?php

namespace App\Http\Controllers\API;

use App\Traits\Validator;
use Src\Auth;
use App\Models\Students;


class StudentController{

    use Validator;
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

    public function updateProfile(){
        $userData = $this->validate([
            'full_name' => 'string',
            'email' => 'string',
            'password' => 'string',
            'age' => 'int',
            'description' => 'string',
            'student_id' => 'int', 
        ]);

        
        $students = new Students(); 

        $students->update($userData['student_id'], $userData['full_name'], $userData['email'], $userData['age'], $userData['description'], $userData['password']);

        apiResponse([
            'message' => 'User updated successfully',
        ]);

    }
}