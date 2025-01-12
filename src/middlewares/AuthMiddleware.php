<?php

namespace src\middlewares;

use src\middlewares\Middleware;

class AuthMiddleware implements Middleware {
    public function handle(): void {
        \src\Auth::check();
    }
}