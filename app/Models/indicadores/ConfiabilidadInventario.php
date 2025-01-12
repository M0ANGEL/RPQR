<?php

namespace App\Models\indicadores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiabilidadInventario extends Model
{
    use HasFactory;

    protected $table = 'confiabilidad_inventarios';

    protected $fillable = [
        'numerador',
        'denominador',
        'porcentaje',
        'bodega',
        'analisis'
    ];
}
