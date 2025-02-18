<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class AuthMiddleware {
    public function handle(Request $request, Closure $next) {
        $token = $request->cookie('auth_token');
        if (!$token || !User::where('active_token', $token)->exists()) {
            return redirect('/login');
        }
        return $next($request);
    }
}

