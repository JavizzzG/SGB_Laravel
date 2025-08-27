<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Billete extends Model
{
    protected $fillable = [
        'valor_billete',
        'cantidad_billete',
    ];
}
