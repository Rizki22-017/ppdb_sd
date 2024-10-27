<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Registration;

class CheckRegistration
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        $registration = Registration::where('user_id', $user->id)->first();

        if ($registration) {
            return redirect()->route('step1.show')->with('error', 'Anda telah terdaftar di sistem, gunakan akun lain jika ingin mendaftar siswa yang berbeda.');
        }

        return $next($request);
    }
}
