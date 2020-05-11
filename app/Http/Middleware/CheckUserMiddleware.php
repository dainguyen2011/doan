<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->type == 'client' || Auth::user()->type == 'Client') {
            return redirect()->route('home');
        }
//        elseif (auth()->user()->type == 'employee' || auth()->user()->type == 'admin') {
//            return $next($request);
//        }
        return $next($request);
    }
}
