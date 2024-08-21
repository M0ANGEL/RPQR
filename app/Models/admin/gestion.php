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
        'usuario_clonar',
        'user_id',
        'cedula',
        'estado',
        'reporte',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
