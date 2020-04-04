<?php

namespace App\Http\Middleware;

use Closure;
//use Illuminate\Support\Facades\Auth;

class checkEmployee
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
        if (auth()->user()->type == 'employee' || auth()->user()->type == 'admin') {
             return $next($request);
        }
        return abort(404);
    }
}
