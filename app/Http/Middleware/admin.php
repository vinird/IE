<?php

namespace App\Http\Middleware;

use Closure;

// added

use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class admin
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
        if (Auth::user()->userType == 1) {
            return $next($request);
        } else {
            Flash::error(' Solo el administrador puede realizar la acción solicitada ');
        }
        Auth::logout();
        return redirect('/login');
    }
}
