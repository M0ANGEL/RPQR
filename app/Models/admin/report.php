<?php

namespace App\Models\admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    use HasFactory;

    protected $table = 'reports';
    
    protected $fillable = [
        'fechareporte',
        'redservicio',
        'huvservicio',
        'reporte',
        'user_id',
        'estado',
        'regente',
        'tipo_accion',
        'porque1',
        'respuesta_porque1',
        'porque2',
        'respuesta_porque2',
        'porque3',
        'respuesta_porque3',
        'porque4',
        'respuesta_porque4',
        'porque5',
        'respuesta_porque5',
        'causa_raiz',
        'rechazado',
        'empresa',
        'imbolucrado',
        'regente_id'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function regente()
    {
        return $this->belongsTo(User::class, 'regente_id'); // Relación con el campo regente_id
    }
    

}
