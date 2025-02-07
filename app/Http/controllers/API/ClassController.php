<?php

namespace App\Http\Controllers\API;

use App\Traits\Validator;
use Src\Auth;
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

        $auth = new class {
            use Auth;
        };

        if($classData['platform']==="noinfo"){
            $place=$classData['address'];
        } else{
            $place=$classData['platform'];
        }
        

        
        $user = $auth->user();

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
    }








