<?php

use App\Http\controllers\WEB\HomeController;
use src\Router;

Router::get('/',[HomeController::class,'home']);
Router::get('/about',[HomeController::class,'about']);
Router::get('/login',[HomeController::class,'login']);
Router::get('/register',[HomeController::class,'register']);
Router::get('/studentprofile',[HomeController::class,'studentprofile']);
Router::get('/student/home',[HomeController::class,'studentHomePage']);
Router::get('/student/editprofile',[HomeController::class,'studenteditpage']);





Router::notFound();

