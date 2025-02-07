<?php

namespace App\Http\Controllers\API;

use App\Traits\Validator;
use Src\Auth;
use App\Models\Teachers;
use App\Models\Students;
use Illuminate\Http\Request;


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

    public function TeachersInfo()
{
    $status = isset($_GET['status']) ? $_GET['status'] : 'pending'; 
    
    $teachers = new Teachers();
    $data = $teachers->getTeachers($status); 

    apiResponse([
        'data'=> $data,
        'message' => 'teacher info'
    ]);

    
}


    public function getTeacher($teacher_id){
        $teachers=new Teachers();
        $data=$teachers->getTeacherById($teacher_id);

        apiResponse([
            'data'=> $data,
            'message' => 'teacher info'
        ]);

    }

    public function changeStatus($teacher_id){
        $status = $this->validate([
            'status' => 'string',
            'status_reason'=>'string'
        ]);

        $teachers=new Teachers();

        if($status['status']=='rejected'){
            $teachers->rejections($teacher_id, $status['status_reason']);
        }
        
        $teachers->updateStatus($teacher_id, $status['status']);

        apiResponse([
            'message' => 'status changed'
        ]);
        
    }

}