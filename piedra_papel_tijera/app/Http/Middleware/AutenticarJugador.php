<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticarJugador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $datos = $request->json()->all();
        $nombre = $datos['nombre'];
        $password = $datos['password'];

        // ASK Para que se usa first()
        $nomJugador = \App\Models\Jugador::where('nombre', $nombre)->first();
        $passwdJugador = \App\Models\Jugador::where('password', $password)->first();

        if ($nomJugador != null && $passwdJugador != null) {
            return $next($request);
        } else {
            return response()->json("No existe el jugador", 404);
        }
    }
}
