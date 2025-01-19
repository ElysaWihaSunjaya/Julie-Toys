<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role = null)
    {
        if (Auth::check() && ($role === null || Auth::user()->role === $role)) {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
