<?php

namespace App\Models\indicadores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hallazgo extends Model
{
    use HasFactory;

    protected $table = 'hallazgos';
    protected $fillable = [
        'denominador',
        'numerador',
        'porcentaje',
        'porcentaje_mesual',
        'analisis',
        'bodega'
    ];
}
