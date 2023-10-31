<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Jugador;

class AutenticarJugador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $datos = $request->json()->all();
        $nombre = $datos['nombre'];
        $password = $datos['password'];

        $jugador = Jugador::where('nombre', $nombre)->where('password', $password)->first();

        if ($jugador != null) {
            return $next($request);
        } else {
            return response()->json("No existe el jugador", 404);
        }
    }
}
