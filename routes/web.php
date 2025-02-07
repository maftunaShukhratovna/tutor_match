<?php

use App\Http\controllers\WEB\ClassControllers;
use App\Http\controllers\WEB\HomeController;
use src\Router;

Router::get('/',[HomeController::class,'home']);
Router::get('/about',[HomeController::class,'about']);
Router::get('/login',[HomeController::class,'login']);
Router::get('/register',[HomeController::class,'register']);

Router::get('/studentprofile',[HomeController::class,'studentprofile']);
Router::get('/student/home',[HomeController::class,'studentHomePage']);
Router::get('/student/editprofile',[HomeController::class,'studenteditpage']);

Router::get('/teacher/profile',[HomeController::class,'teacherprofile']);
Router::get('/teacher/waitpage',[HomeController::class,'waitingpage']);
Router::get('/teacher/home',[HomeController::class,'teacherhome']);

Router::get('/teacher/createclass',[ClassControllers::class,'createclass']);

Router::get('/teacher/myclass',[HomeController::class,'teacherclass']);
Router::get('/teacher/myinfo',[HomeController::class,'myinfo']);





Router::get('/admin/home',[HomeController::class,'adminhome']);

Router::get('/admin/students',[HomeController::class,'adminstudents']);
Router::get('/admin/registeredteachers',[HomeController::class,'newTeachers']);
Router::get('/admin/seeTeacherInfo/{id}',[HomeController::class,'seeTeacherInfo']);
Router::get('/admin/rejectedteachers',[HomeController::class,'rejectedTeachers']);
Router::get('/admin/activeteachers',[HomeController::class,'activeTeachers']);













Router::notFound();

