<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            return $next($request);

        }
        return redirect()->guest(route('admin.login'));
    }
}
