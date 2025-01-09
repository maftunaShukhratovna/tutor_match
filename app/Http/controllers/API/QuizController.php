<?php

namespace App\Http\controllers\API;

use Src\Auth;

class QuizController{
    public function store(){
        if (Auth::check()){
            $headers=getallheaders();
            $bearer=$headers['Authorization'];
            $token=str_replace('Bearer ','', $bearer);
            apiResponse([
                'message'=>'quiz created succesfully'
            ],201);

        }
    }
}