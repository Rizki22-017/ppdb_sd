<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user's email is "admin@sditpermata.com"
        if (Auth::check() && Auth::user()->email === 'admin@sditpermata.com') {
            // Allow the request to proceed if the user is admin
            return $next($request);
        }

        // If not an admin, redirect to the home page or another page
        return redirect('/')->with('error', 'Access denied. Admins only.');
    }
}
