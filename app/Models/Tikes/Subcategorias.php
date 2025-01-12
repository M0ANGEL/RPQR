<?php

namespace App\Models\Tikes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategorias extends Model
{
    use HasFactory;

    protected $table = '_tikes_sub_categorias';

    protected $fillable = [
        'name',
        '_tikes_categorias_id',
        'usuario_creo',
        'prioridad',
        'estado',
        'area',
        'autorizacion'
    ];

    // Mutador para guardar 'name' en mayúsculas
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    // Mutador para guardar 'prefijo' en mayúsculas
    public function setPrefijoAttribute($value)
    {
        $this->attributes['_tikes_categorias_id'] = strtoupper($value);
    }

    // Mutador para guardar 'usuario_creo' en mayúsculas
    public function setUsuarioCreoAttribute($value)
    {
        $this->attributes['usuario_creo'] = strtoupper($value);
    }


    // Mutador para guardar 'usuario_creo' en mayúsculas
    public function setUPrioridadAttribute($value)
    {
        $this->attributes['prioridad'] = strtoupper($value);
    }

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, '_tikes_categorias_id', 'id');
    }
}
