<?php

use Source\Router;
use App\Controllers\API\UserController;

Router::post('/api/users', [UserController::class , 'store']);

// use App\Models\User;
// $user=new User;
// $user->create('ramzan', "ramzan@gmail.com", '1234');