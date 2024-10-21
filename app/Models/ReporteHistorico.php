<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteHistorico extends Model
{
    use HasFactory;

    protected $table = 'reporte_historico';  // Nombre de la tabla de registro histórico
    protected $fillable = ['nombre_servinte', 'nombre_sebthi', 'fecha_subida'];
}
