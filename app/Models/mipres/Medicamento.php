<?php

namespace App\Models\mipres;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;

    protected $table = "medicamentos";

    protected $fillable = [
        'codigo_huv',
        'codigo_sebthi',
        'descripcion',
        'estado',
        'user_id',
        'usuario_modifica',
        'cantidad_disponible', // Asegúrate de incluir este campo si es necesario
    ];
}
