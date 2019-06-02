<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
   public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (Auth::user()->role == 1) {
                return redirect('administrador/horario');
            }
            if (Auth::user()->role == 2) {
                return redirect('docente');
            } 
            if (Auth::user()->role == 3) {
                return redirect('auxiliar');
            } 
            if (Auth::user()->role == 4) {
                return redirect('estudiante/inscripcion');
            } 
        }

        return $next($request);
    }
}
