<?php

namespace App\Models\asistencias;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencias extends Model
{
    use HasFactory;

    protected $table = 'asistencias';

    protected $fillable = [
        'cedula',
        'personal_id',
    ];

    public function lista_persona()
    {
        return $this->belongsTo(listado_persona::class, 'personal_id');
    }
}
