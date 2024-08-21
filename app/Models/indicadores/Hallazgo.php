<?php

namespace App\Models\indicadores;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hallazgo extends Model
{
    use HasFactory;

    protected $table = 'hallazgos';
    protected $fillable = [
        'digitado',
        'hallazgo',
        'porcentaje',
        'porcentaje_mesual',
        'analisis',
        'bodega'
    ];
}
