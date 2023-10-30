<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jugador;

class JugadorController extends Controller
{
    public static function verJugadores()
    {
        $jugadores = Jugador::all();
        return response()->json($jugadores, 200);
    }

    public static function buscarJugador($id)
    {
        $jugador = Jugador::find($id);

        if ($jugador != null) {
            return response()->json($jugador, 200);
        } else {
            return response()->json("No existe el jugador", 404);
        }
    }

    public static function insertarJugador(Request $request)
    {
        $j = new Jugador();

        $j->id = $request->get('id');
        $j->nombre = $request->get('nombre');
        $j->password = $request->get('password');
        $j->partidasJugadas = $request->get('partidasJugadas');
        $j->partidasGanadas = $request->get('partidasGanadas');
        $j->rol = $request->get('rol');

        try {
            $j->save();
            return response()->json("Jugador insertado", 200);
        } catch (\Exception $e) {
            return response()->json("No se ha podido insertar el jugador", 500);
        }
    }

    public static function eliminarJugador($id)
    {
        $j = Jugador::find($id);

        if ($j != null) {
            try {
                $j->delete();
                return response()->json("Jugador eliminado", 200);
            } catch (\Exception $e) {
                return response()->json("No se ha podido eliminar el jugador", 500);
            }
        } else {
            return response()->json("No existe el jugador", 404);
        }
    }

}
