<?php

namespace App\Models\indicadores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ErrorDriver extends Model
{
    use HasFactory;

    protected $table = 'error_drivers';

    protected $fillable = [
        'numerador',
        'denominador',
        'porcentaje',
        'bodega',
        'analisis'
    ];
}
