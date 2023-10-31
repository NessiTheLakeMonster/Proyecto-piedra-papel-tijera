<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tirada;

class InfoTiradas extends Model
{
    use HasFactory;

    protected $table = 'infotiradas';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    // Funciones para las relaciones de claves foráneas
    function tiradasEnPartidasJ1()
    {
        return $this->hasMany(Tirada::class, 'tiradaJugador1', 'id');
    }

    function tiradasEnPartidasJ2()
    {
        return $this->hasMany(Tirada::class, 'tiradaJugador2', 'id');
    }
}
