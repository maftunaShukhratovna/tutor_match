<?php

use src\Router;
use App\Http\controllers\API\UserController;
use App\Http\controllers\API\StudentController;
use App\Http\controllers\API\TeacherController;
use App\Http\controllers\API\AdminController;



Router::get('/api/students/getInfo',[StudentController::class,'show'],'auth:api');

Router::post('/api/login', [UserController::class , 'login']);
Router::post('/api/register', [UserController::class , 'store']);
Router::put('/api/student/updateInfo', [StudentController::class , 'updateProfile'], 'auth:api');

Router::get('/api/teacher/getInfo',[TeacherController::class,'teacherinfo'],'auth:api');
Router::put('/api/teacher/updateInfo',[TeacherController::class,'updateTeacherInfo'],'auth:api');

Router::get('/api/admin/students/getInfo',[AdminController::class,'studentsInfo'],'auth:api');

Router::delete('/api/admin/students/delete/{id}',[AdminController::class,'removeStudent'],'auth:api');

Router::get('/api/admin/newTeachers/getInfo',[AdminController::class,'newTeachersInfo'],'auth:api');



Router::notFound();