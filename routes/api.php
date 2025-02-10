<?php

use src\Router;
use App\Http\controllers\API\UserController;
use App\Http\controllers\API\StudentController;
use App\Http\controllers\API\TeacherController;
use App\Http\controllers\API\AdminController;
use App\Http\controllers\API\ClassController;

Router::get('/api/students/getInfo',[StudentController::class,'show'],'auth:api');
Router::get('/api/students/getClasses',[StudentController::class,'showAllClasses'],'auth:api');
Router::get('/api/students/getMyClasses',[StudentController::class,'showMyClasses'],'auth:api');


Router::get('/api/students/getClassInfo/{id}',[StudentController::class,'showClassInfo'],'auth:api');

Router::post('/api/students/registerClass', [ClassController::class , 'registerclass'], 'auth:api');
Router::put('/api/student/updateInfo', [StudentController::class , 'updateProfile'], 'auth:api');



Router::post('/api/login', [UserController::class, 'login'],'auth:api');
Router::post('/api/register', [UserController::class , 'store'],'auth:api');



Router::get('/api/teacher/getInfo',[TeacherController::class,'teacherinfo'],'auth:api');
Router::get('/api/teacher/getClassInfo/{id}',[ClassController::class,'classinfo'],'auth:api');
Router::post('/api/teacher/updateclass', [ClassController::class , 'updateClass'], 'auth:api');
Router::put('/api/teacher/updateInfo',[TeacherController::class,'updateTeacherInfo'],'auth:api');
Router::post('/api/teacher/createclass',[ClassController::class,'store'],'auth:api');
Router::get('/api/teacher/getClasses',[ClassController::class,'getClasses'],'auth:api');
Router::get('/api/teacher/getClasses',[ClassController::class,'getClasses'],'auth:api');
Router::delete('/api/teacher/classes/delete/{id}',[ClassController::class,'removeClass'],'auth:api');






Router::get('/api/admin/students/getInfo',[AdminController::class,'studentsInfo'],'auth:api');

Router::delete('/api/admin/students/delete/{id}',[AdminController::class,'removeStudent'],'auth:api');

Router::get('/api/admin/newTeachers/getInfo',[AdminController::class,'TeachersInfo'],'auth:api');

Router::get('/api/admin/getTeacher/{id}',[AdminController::class,'getTeacher'],'auth:api');

Router::post('/api/admin/changeTeacherStatus/{id}', [AdminController::class , 'changeStatus'], 'auth:api');


Router::notFound();