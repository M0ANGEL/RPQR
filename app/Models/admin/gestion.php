<?php

namespace App\Models\admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gestion extends Model
{
    use HasFactory;
    protected $table = 'pbs';

    protected $fillable  = [
        'name',
        'pb',
        'bodega_nueva',
        'usuario_servinte',
        'usuario_sebthi',
        'usuario_clonar_servinte',
        'usuario_clonar_sebthi',
        'user_id',
        'cedula_usuario_referencia',
        'cedula',
        'estado_sebthi',
        'estado_servinte',
        'reporte',
        'grupo',
        'estado',
        'rechazo',
        'perfil'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
