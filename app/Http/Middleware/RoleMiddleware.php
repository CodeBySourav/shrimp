<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (Auth::check() && Auth::user()->role == $role && Auth::user()->status == "active") {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role == $role && Auth::user()->status == "active") {
            return $next($request);
        }
        elseif (Auth::check() && Auth::user()->role == $role && Auth::user()->status != "active") {
            return redirect('not_approve');
        }
        // Redirect or abort if user does not have the required role
        return redirect('/login')->with('error', 'Access denied.');
    }
}
