<?php

namespace App\Http\controllers\WEB;


class ClassControllers{
    public function createclass(){
        view('teachers/createclass');
    }

    public function myclass(){
        view('teachers/myclasses');
    }

    public function updateclass($id){
        view('teachers/updateclass',['class_id'=>$id]);
    }

    public function studentclasses(){
        view('students/classes');
    }

    public function myclasses(){
        view('students/myclasses');
    }
    
    
}