<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partida;

class PartidaController extends Controller
{
    public static function verPartidas()
    {
        $partidas = Partida::all();
        return response()->json($partidas, 200);
    }

    public static function buscarPartida($id)
    {
        $partida = Partida::find($id);

        if ($partida != null) {
            return response()->json($partida, 200);
        } else {
            return response()->json("No existe la partida", 404);
        }
    }

    public static function terminarPartida($id) {
        $partida = Partida::find($id);

        if ($partida != null) {
            $partida->finalizado = true;
            $partida->save();
            return response()->json($partida, 200);
        } else {
            return response()->json("No existe la partida", 404);
        }
    }

    public static function crearPartida(Request $request) {

    }
}
