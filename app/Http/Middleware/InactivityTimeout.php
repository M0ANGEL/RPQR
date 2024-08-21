<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class InactivityTimeout
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            // Define el tiempo de inactividad en segundos
            $timeout = 15 * 60; // 15 minutos

            // Verifica el tiempo de inactividad
            if (time() - Session::get('lastActivityTime') > $timeout) {
                Auth::logout(); // Cierra la sesión
                return redirect('/login')->with('message', 'Sesión expirada por inactividad.'); // Redirige al login
            }

            // Actualiza el tiempo de última actividad
            Session::put('lastActivityTime', time());
        } else {
            // Si no está autenticado, solo continúa con la solicitud
            Session::put('lastActivityTime', time());
        }

        return $next($request);
    }
}
