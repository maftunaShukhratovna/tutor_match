<?php

namespace App\Http\Controllers\API;

use App\Traits\Validator;
use src\Auth;
use App\Models\Students;
use App\Models\Classes;
use App\Models\Teachers;

class StudentController{

    use Validator;
    public function show()
    {
        $user = Auth::user();

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

    public function showAllClasses(){
        $user = Auth::user();
    
        $classes=new Classes;
        $data=$classes->getAllClasses($user['student_id']);

        apiResponse([
            'data'=>$data,
            'message' => 'User updated successfully',
        ]);
    }

    public function showClassInfo($class_id){
        $classes=new Classes;
        $data=$classes->getClassById($class_id);

        

        $teacher=new Teachers();
        $info=$teacher->getTeacherById($data['teacher_id']);
        
        apiResponse([
            'class data'=>$data,
            'teacher data'=> $info,
            'message' => 'User updated successfully',
        ]);
    }

    public function showMyClasses(){
        $user = Auth::user();
    
        $classes=new Classes;
        $data=$classes->getMyClasses($user['student_id']);

        apiResponse([
            'data'=>$data,
            'message' => 'User updated successfully',
        ]);
    }

}