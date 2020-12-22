<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkIfRecruteur
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
        if (Auth::check()) {
            if (Auth::user()->type != 'recruteur') {
                if ($request->ajax()) {
                    return response('Unauthorized.', 401);
                } else {
                    abort(401);
                }
            }
        } else {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
