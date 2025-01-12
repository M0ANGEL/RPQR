<?php

namespace App\Models\indicadores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecepcionTecnica extends Model
{
    use HasFactory;

    protected $table = 'recepcion_tecnicas';

    protected $fillable = [
        'numerador',
        'denominador',
        'porcentaje',
        'bodega',
        'analisis'
    ];
}
