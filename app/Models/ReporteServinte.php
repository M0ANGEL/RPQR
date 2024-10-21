<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteServinte extends Model
{
    use HasFactory;

    protected $table = 'reporteservinte';  // Nombre de la tabla
    protected $fillable = ['columna1', 'columna2', 'columna3'];  // Ajusta las columnas según tu estructura
}
