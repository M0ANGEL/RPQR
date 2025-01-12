<?php

namespace App\Models\indicadores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostoAveria extends Model
{
    use HasFactory;

    protected $table = 'costo_averias';

    protected $fillable = [
        'numerador',
        'denominador',
        'porcentaje',
        'bodega',
        'analisis'
    ];
}
