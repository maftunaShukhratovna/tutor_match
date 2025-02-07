<?php

namespace App\Http\controllers\WEB;


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

    public function teacherprofile(){
        view('teachers/profile');
    }

    public function waitingpage(){
        view('teachers/waitpage');
    }
    public function adminhome(){
        view('admin/home');
    }

    public function adminstudents(){
        view('admin/students');
    }

    public function newTeachers(){
        view('admin/newteachers');
    }

    public function seeTeacherInfo($teacher_id){
        view('admin/teacherInfo',['teacher_id'=>$teacher_id]);
    }
    
    public function rejectedTeachers(){
        view('admin/rejectedteachers');
    }

    public function activeTeachers(){
        view('admin/activeteachers');
    }

    public function teacherhome(){
        view('teachers/home');
    }

    public function myinfo(){
        view('teachers/myinfo');
    }





    
}


