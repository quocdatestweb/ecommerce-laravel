<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmailVerified
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->user()->email_verified_at) {
            return redirect()->route('login')->with('error', 'Please verify your email address.');
        }

        return $next($request);
    }
}
