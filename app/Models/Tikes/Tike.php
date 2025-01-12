<?php

namespace App\Models\Tikes;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tike extends Model
{
    use HasFactory;

    protected $tabla = "tikes";

    protected $fillable = [
        'numero_tike',
        'usuario_reporta',
        'categoria',
        'subcategoria',
        'detalle',
        'user_id',
        'bodega',
        'departamento',
        'sede',
        'area',
        'estado',
        'calificacion',
        'prioridad',
        'respuesta',
        'respuesta_autorizacion',
        'autorizacion'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
