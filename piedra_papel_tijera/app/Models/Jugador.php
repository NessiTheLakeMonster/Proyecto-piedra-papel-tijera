<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Partida;

class Jugador extends Model
{
    use HasFactory;

    protected $table = 'jugador';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    // TODO Pregunta si es necesario esto
    /* protected $fillable = [
        'nombre',
        'password',
    ];

    protected $hidden = [
        'password',
        'partidasJugadas',
        'partidasGanadas',
        'rol'
    ]; */

    // Funciones para las relaciones de claves foráneas
    function partidasJugador1()
    {
        return $this->hasMany(Partida::class, 'idJugador1', 'id');
    }

    function partidasJugador2()
    {
        return $this->hasMany(Partida::class, 'idJugador2', 'id');
    }
}
