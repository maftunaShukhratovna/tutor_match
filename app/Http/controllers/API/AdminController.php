<?php

namespace App\Http\Controllers\API;

use App\Traits\Validator;
use Src\Auth;
use App\Models\Teachers;
use App\Models\Students;


class AdminController{

    use Validator;

    public function studentsInfo(){
        $students=new Students();
        $data=$students->getAllStudents();
        
        apiResponse([
            'data'=> $data,
            'message' => 'students info'
        ]);

    }

    public function removeStudent(int $student_id){
        $students=new Students();
        $students->delete($student_id);

        apiResponse([
            'message'=> 'student deleted successfully'
        ]);
          
    }

    public function newTeachersInfo(){
        $teachers=new Teachers();
        $data=$teachers->getNewTeachers();

        // experience va university malumotlari ham olinib qo`shilishi kerak dataga

        
        apiResponse([
            'data'=> $data,
            'message' => 'new teachers info'
        ]);

    }

}