<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TarjetaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->session()->has("numero_tarjeta")){ //se confirma si ya metio una tarjeta
            return view('index')->with('error', "Por favor ingrese la tarjeta");
        }
        $ultimaAccion = $request->session()->get("ultima_accion");
        if(!session()) { //acá se verifica que la sesion si haya sido creada (lo planeado era que solo hubiera sesion activa durante 1 minuto)
            return view('index')->with('error', "Sesión expirada, por favor ingrese la tarjeta nuevamente");
        }
        $request->session()->put("ultima_accion", now()); //reseteo el contador
        return $next($request); //paso a la siguiente peticion (el controlador)
    }
}
