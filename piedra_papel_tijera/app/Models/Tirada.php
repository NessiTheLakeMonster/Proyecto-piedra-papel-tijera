<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Partida;
use App\Models\InfoTiradas;

class Tirada extends Model
{
    use HasFactory;

    protected $table = 'tiradas';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    // Funciones para las relaciones de claves foráneas
    function tiradaPerteneceA()
    {
        return $this->belongsTo(Partida::class, 'idPartida', 'id');
    }

    function tiradaSignificadoJ1()
    {
        return $this->belongsTo(InfoTiradas::class, 'tiradaJugador1', 'id');
    }

    function tiradaSignificadoJ2()
    {
        return $this->belongsTo(InfoTiradas::class, 'tiradaJugador2', 'id');
    }
}
