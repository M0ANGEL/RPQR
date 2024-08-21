<?php

namespace App\Models\huv;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class huv extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cedula',
        'telefono',
        'cargo',
        'bodega',
        'user_id',
        'usuario_clonar_huv',
        'usuario_clonar_sebthi',
        'cedula_clonar',
        'confirmado',
        'activo_sebthi',
        'activo_servinte',
        'password_servinte',
        'password_sebthi',
        'login_servinte',
        'login_sebthi',
        'login',
        'password' 
             
    ];

    /* mutadores */
 /*    protected function name():Attribute{
        return new Attribute(
            set: fn($value) => strtolower($value),
            get: fn($value) => ucfirst($value),
        );
    } */

    /* relacion uno a muchos inversa con usuarios */
  
    public function user(){
        return $this->belongsTo(User::class);
    }
}
