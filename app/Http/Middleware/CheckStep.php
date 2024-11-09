<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckStep
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();
            $currentStep = optional($user->registration)->step;

            // If the user has reached the result page, restrict access to previous steps
            if ($currentStep === 'resultPeage') {
                return redirect()->route('resultPage')->with('warning', 'You cannot access previous steps.');
            }
        }

        return $next($request);
    }
}
