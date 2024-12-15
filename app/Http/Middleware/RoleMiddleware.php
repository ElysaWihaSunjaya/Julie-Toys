<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role == "admin") {
            return $next($request);
        }

        abort(403);

    }
}


