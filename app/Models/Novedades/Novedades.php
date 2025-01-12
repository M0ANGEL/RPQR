<?php

namespace App\Models\Novedades;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novedades extends Model
{
    use HasFactory;
    protected $table = 'novedades';

    protected $fillable = [
        'tipo_novedad',
        'fecha_inicio',
        'fecha_final',
        'cargo',
        'bodega',
        'nombre_completo',
        'numero_cedula',
        'numero_telefono',
        'detalle',
        'bodegaPadre'
    ];

    public function archivos()
    {
        return $this->hasMany(Archivos::class);
    }
}
