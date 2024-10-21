<?php

namespace App\Models\Agotados;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agotados extends Model
{
    use HasFactory;

    protected $table='agotados';

    protected $fillable = [
        'descripcion',
        'estado',
        'fecha_En',
        'pdfs',
        'estado_p',
        'marca',
        'tiene_carta'
    ];
}
