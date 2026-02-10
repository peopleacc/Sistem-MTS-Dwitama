<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     * If the user is already authenticated, redirect to dashboard.
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
