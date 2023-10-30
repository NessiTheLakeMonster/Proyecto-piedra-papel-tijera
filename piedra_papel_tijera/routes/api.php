<?php

use App\Http\Controllers\JugadorController;
use App\Models\jugador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::prefix('jugador')->group(function () {
    Route::get('/', [JugadorController::class, 'verJugadores']);
    Route::get('/{id}', [JugadorController::class, 'buscarJugador']);
    Route::post('/insertarJugador', [JugadorController::class, 'insertarJugador']);
    Route::delete('/eliminarJugador/{id}', [JugadorController::class, 'eliminarJugador']);
});

Route::middleware('AutenticarJugador')->group(function () {
    Route::prefix('partida')->group(function () {
        Route::get('/', [PartidaController::class, 'verPartidas']);
        Route::get('/{id}', [PartidaController::class, 'buscarPartida']);
    });
});
