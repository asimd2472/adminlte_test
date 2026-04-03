<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('user.login')
                ->with('error', 'Please login first');
        }

        if (Auth::user()->user_type != 2) {
            return redirect()->back()
                ->with('error', "You don't have admin access.");
        }

        return $next($request);
    }
}
