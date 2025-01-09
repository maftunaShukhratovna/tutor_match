<?php

// use Source\Router;
// use App\controllers\API\UserController;

//Router::get('/todos', UserController::class . 'index');

use App\Http\controllers\WEB\HomeController;
use src\Router;

Router::get('/',[HomeController::class,'home']);
Router::get('/about',[HomeController::class,'about']);
Router::get('/login',[HomeController::class,'login']);
Router::get('/register',[HomeController::class,'register']);