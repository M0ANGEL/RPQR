<?php

namespace App\Models\vistaMedica;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vista extends Model
{
    use HasFactory;

    protected $table = 'vista';

    protected $fillable  = [
        'acttor',
        'vistamedica',
        'nombrevistamedica',
        'unidadmedica',
        'codigosebthi',
        'medicamento',
    ];
}
