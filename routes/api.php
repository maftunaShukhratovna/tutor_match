<?php

use src\Router;
use App\Http\controllers\API\UserController;
use App\Http\controllers\API\QuizController;


Router::get('/api/users/getInfo',[UserController::class,'show'],'auth:api');

Router::post('/api/login', [UserController::class , 'login']);
Router::post('/api/register', [UserController::class , 'store']);

Router::post('/api/quizzes', [QuizController::class , 'store']);

Router::notFound();