<?php 

namespace src\middlewares;

use src\Auth;

class AuthMiddleware {
    public function handle(): void {
        $auth = new class {
            use Auth;
        };

        $user = $auth->user();

    }
}
