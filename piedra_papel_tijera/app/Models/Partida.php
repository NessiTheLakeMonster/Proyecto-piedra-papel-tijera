<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jugador;

class Partida extends Model
{
    use HasFactory;

    protected $table = 'partida';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    // Funciones para las relaciones de claves foráneas
    function jugador1()
    {
        return $this->belongsTo(Jugador::class, 'idJugador1', 'id');
    }

    function jugador2()
    {
        return $this->belongsTo(Jugador::class, 'idJugador2', 'id');
    }

    function tiradas()
    {
        return $this->hasMany(Tirada::class, 'idPartida', 'id');
    }
}
