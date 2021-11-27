<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        // Check : Determina si el usuario inicio sesion en la aplicacion
        if(Auth::check()){
            if(Auth::user()->isAdmin()){
                \FB::log('Eres admin');

                return $next($request);
            }
            \FB::log('No Eres admin');
        }
        return redirect('/');
    }
}
