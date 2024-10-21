<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impresora extends Model
{
    use HasFactory;

    protected $table = 'impresoras';

    protected $fillable = [
        'modelo',
        'letra',
        'serial',
        'marca',
        'piso',
        'area',
        'problema',
        'codigo',
        'descripcion',
        'estado',
    ];
}
