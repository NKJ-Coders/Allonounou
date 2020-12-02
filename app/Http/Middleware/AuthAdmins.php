<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthAdmins
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
        // if (false == Auth::check()) {
        //     return redirect()->route('login');
        // } else {
        //     if (Auth::user()->type != 'super admin') {
        //         return redirect()->route('login');
        //     }
        // }
        if (Auth::check()) {
            if (Auth::user()->type != 'super admin') {
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
