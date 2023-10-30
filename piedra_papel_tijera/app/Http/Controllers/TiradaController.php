<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tirada;

class TiradaController extends Controller
{
    public static function verTiradas()
    {
        $tiradas = Tirada::all();
        return response()->json($tiradas, 200);
    }

    public static function buscarTirada($id)
    {
        $tirada = Tirada::find($id);

        if ($tirada != null) {
            return response()->json($tirada, 200);
        } else {
            return response()->json("No existe la tirada", 404);
        }
    }

    // FIXME Mira esto, no esta correcto
    public static function realizarTirada(Request $request) 
    {
        $t = new Tirada();

        $t->id = $request->get('id');
        $t->idPartida = $request->get('idPartida');
        $t->idJugador = $request->get('idJugador');
        $t->tirada = $request->get('tirada');

        try {
            $t->save();
            return response()->json("Tirada realizada", 200);
        } catch (\Exception $e) {
            return response()->json("No se ha podido realizar la tirada", 500);
        }
    }
}
