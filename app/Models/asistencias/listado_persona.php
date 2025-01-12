<?php

namespace App\Models\asistencias;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listado_persona extends Model
{
    use HasFactory;

    protected $table = 'lista_personas';

    protected $fillable = [
        'cedula',
        'nombre',
        'telefono',
        'perfil'
    ];
}
