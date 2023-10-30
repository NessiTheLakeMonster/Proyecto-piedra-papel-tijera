<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Partida;

class Tirada extends Model
{
    use HasFactory;

    protected $table = 'tiradas';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    // Funciones para las relaciones de claves foráneas
    function tiradaPerteneceA() { // FIXME no funciona esta relación de claves foráneas
        return $this->belongsTo(Partida::class, 'idPartida', 'id');
    } 
}
