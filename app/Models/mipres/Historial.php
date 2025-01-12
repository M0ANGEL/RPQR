<?php

namespace App\Models\mipres;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    protected $table = 'historials';

    protected $fillable = [
        'entrega__id',
        'cantidad_entregada',
        'cantidad_restante',
        'cantidad_entrego',
        'user_id',
        'fecha_entrega',
        'motivo',
        'usuario_cancela'
    ];

    public function entrega()
    {
        return $this->belongsTo(Entregas::class, 'entrega__id'); // Asegúrate de que este es el nombre correcto de la columna
    }

    // En App\Models\mipres\Historial.php
    public function creador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
