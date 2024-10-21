<?php

namespace App\Models\Inventarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registros extends Model
{
    use HasFactory;

    protected $table = 'equiposPC'; // Nombre de tu tabla de equipos

    protected $fillable = [
        'modelo',
        'marca',
        'activo',
        'proveedor',
        'estado',
        'ram',
        'disco',
        'espacio_disco',
        'fecha_salida'
    ];

    // Un equipo puede estar relacionado con muchos inventarios
    public function inventarios()
    {
        return $this->hasMany(Inventario::class, 'equiposPC_id');
    }
}

