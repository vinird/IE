<?php

namespace App\Http\Middleware;

use Closure;

//added

use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class userActive 
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
        if (Auth::user()->active != null) {
            if(Auth::user()->active == 1){
                return $next($request);
            }
        }
        Auth::logout();
        Flash::error(' Su usuario no esta activado, comuniquese con el administrador del sistema para activarlo ');
        return redirect('/login'); 

    }
}
