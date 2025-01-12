<?php

namespace App\Models\indicadores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispensado extends Model
{
    use HasFactory;

    protected $table = 'dispensados';
    protected $fillable = [
        'denominador',
        'numerador',
        'porcentaje',
        'porcentaje_mesual',
        'analisis',
        'bodega'
    ];
}
