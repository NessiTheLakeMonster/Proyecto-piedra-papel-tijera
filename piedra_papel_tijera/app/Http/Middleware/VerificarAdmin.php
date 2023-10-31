<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Jugador;

class VerificarAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // TODO Verifica que el usuario logeado es admin
        $autencicarJug = new AutenticarJugador();
        $response = $autencicarJug->handle($request, $next);

        if ($response->getStatusCode() !== 200) {
            return $response;
        }

        $admin = $request->user()->rol;

        if ($admin == true) {
            $jugador = Jugador::where('rol', $admin)->first();
        }

        if ($jugador != null) {
            return $next($request);
        } else {
            return response()->json("Ese jugador no es administrador", 404);
        }
    }
}
