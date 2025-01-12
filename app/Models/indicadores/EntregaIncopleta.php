<?php

namespace App\Models\indicadores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntregaIncopleta extends Model
{
    use HasFactory;

    protected $table = 'entrega_incopletas';

    protected $fillable = [
        'numerador',
        'denominador',
        'porcentaje',
        'bodega',
        'analisis'
    ];
}
