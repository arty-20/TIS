<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class DocenteMiddleware
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
        if (Auth::user()->role == 2 ) {
            return $next($request);
        }
        
        if (Auth::user()->role == 1) {
            return redirect('administrador/horario');
        } 
        if (Auth::user()->role == 3) {
            return redirect('auxiliar');
        } 
        if (Auth::user()->role == 4) {
            return redirect('estudiante/inscripcion');
        } 
    }
}
