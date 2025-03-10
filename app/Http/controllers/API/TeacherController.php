<?php

namespace App\Http\Controllers\API;

use App\Traits\Validator;
use src\Auth;
use App\Models\Teachers;

class TeacherController{

    use Validator;

    public function updateTeacherInfo(){
        $userData = $this->validate([
            "full_name"=>"string",
            "email" => "string",
            "password" => "string",
            "birth_date" => "int",
            "province"=>"string",
            "student_number"=>"int",
            "experience"=>"int",
            "subject"=>"string",
            "workplace"=>"string",
            "education"=>"array",
            "description" => "string",
            "teacher_id" => "int", 
            "phone"=>"string",
        ]);

        $teacher=new Teachers();

        $teacher->update(
            $userData['teacher_id'],
            $userData['full_name'],
            $userData['email'],
            $userData['birth_date'],
            $userData['province'],
            $userData['description'],
            $userData['password'],
            $userData['phone']
        );

        $data=$teacher->getTeacher($userData['teacher_id']);

        $teacher->experienceInfo($data['id'], $userData['student_number'], $userData['experience'],  $userData['subject'], $userData['workplace']);

        foreach ($userData['education'] as $education) {
            $university = $education['university'];
            $degree = $education['degree'];
            $teacher->educationinfo($data['id'],$university, $degree);
        }
        
        apiResponse([
            'message' => 'User updated successfully',
        ]);
    }


    public function teacherinfo(){
        $user = Auth::user();

        $teacher=new Teachers();

        $data=$teacher->getTeacherById($user);


        apiResponse([
                'data'=> $data,
                'message' => 'user info',
        ]);
    }

}






