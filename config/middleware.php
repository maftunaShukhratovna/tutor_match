<?php 

use src\middlewares\AuthMiddleware;

return [
    'auth:api'=>AuthMiddleware::class,
];