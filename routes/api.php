<?php

use src\Router;
use App\Http\controllers\API\UserController;


Router::get('/api/students/getInfo',[UserController::class,'show'],'auth:api');

Router::post('/api/login', [UserController::class , 'login']);
Router::post('/api/register', [UserController::class , 'store']);
Router::put('/api/student/updateInfo', [UserController::class , 'updateProfile'], 'auth:api');





Router::notFound();