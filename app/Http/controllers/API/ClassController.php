<?php

namespace App\Http\Controllers\API;

use App\Traits\Validator;
use src\Auth;
use App\Models\Classes;

class ClassController{
    use Validator;
    
    public function store(): void
    {
        $classData = $this->validate([
            'class_name' => 'string',
            'subject' => 'string',
            'format' => 'string',
            'platform' => 'string',
            'address' => 'string',
            'duration' => 'string',
            'time' => 'string',
            'cost' => 'int',
            'description'=>'string',
            'seats'=>'int'
        ]);

        $user = Auth::user();
        
        if($classData['platform']==="noinfo"){
            $place=$classData['address'];
        } else{
            $place=$classData['platform'];
        }
        
        $classes=new Classes;
        $classes->create(
            $user,
            $classData['class_name'],
            $classData['subject'],
            $classData['format'],
            $place,
            $classData['duration'],
            $classData['time'],
            $classData['cost'],
            $classData['description'],
            $classData['seats']
        );
         
        apiResponse([
            'message' => 'class created'

        ]);


    }

    public function getClasses(){
        $user = Auth::user();

        $classes=new Classes();
        $data=$classes->getClasses($user);

        apiResponse([
            'data'=>$data,
            'message' => 'class created'
        ]);

    }

    public function classinfo($classId){
        $classes=new Classes();
        $data=$classes->getClassById($classId);

        apiResponse([
            'data'=>$data,
            'message' => 'class created'
        ]);

    }

    public function updateClass(){
        $classData = $this->validate([
            'class_id'=>'int',
            'class_name' => 'string',
            'subject' => 'string',
            'format' => 'string',
            'platform' => 'string',
            'address' => 'string',
            'duration' => 'string',
            'time' => 'string',
            'cost' => 'int',
            'description'=>'string',
            'seats'=>'int',
        ]);

        
        if($classData['platform']==="noinfo"){
            $place=$classData['address'];
        } else{
            $place=$classData['platform'];
        }
        
        $classes=new Classes;
        $classes->updateClass(
            $classData['class_id'],
            $classData['class_name'],
            $classData['subject'],
            $classData['format'],
            $place,
            $classData['duration'],
            $classData['time'],
            $classData['cost'],
            $classData['description'],
            $classData['seats']
        );
         
        apiResponse([
            'message' => 'class updated'
        ]);

    }

    public function removeClass(int $class_id){

        $classes=new Classes();
        $classes->delete($class_id);

        apiResponse([
            'message'=> 'student deleted successfully'
        ]);
          
    }





}









