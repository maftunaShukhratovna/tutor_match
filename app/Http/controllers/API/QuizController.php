<?php

namespace App\Http\controllers\API;

use Src\Auth;

class QuizController{
    public function store(){
            apiResponse([
                'message'=>'quiz created succesfully'
            ],201);
            
        }
    }
