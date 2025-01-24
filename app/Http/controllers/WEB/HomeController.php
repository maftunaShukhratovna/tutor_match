<?php

namespace App\Http\controllers\WEB;

use App\Models\Quizzes;

class HomeController{
    public function home(){
        view('home');
    }

    public function about(){
        view('about');
    }

    public function login(){
        view('auth/login');
    }

    public function register(){
        view('auth/register');
    }

    public function studentprofile(){
        view('students/profile');
    }

    public function studentHomepage(){
        view('students/home');
    }

    public function studenteditpage(){
        view('students/edit');
    }

    
}


