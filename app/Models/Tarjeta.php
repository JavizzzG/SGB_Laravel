<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    protected $table = 'tarjeta';

    protected $fillable = [ // solo se deja editable el monto de la tarjeta
        'monto_tarjeta', 
    ];
}
