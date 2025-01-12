<?php

namespace App\Models\Tikes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;

    protected $table = '_tikes_categorias';

    protected $fillable = [
        'name',
        'prefijo',
        'usuario_creo',
        'estado'
    ];

    // Mutador para guardar 'name' en mayúsculas
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }

    // Mutador para guardar 'prefijo' en mayúsculas
    public function setPrefijoAttribute($value)
    {
        $this->attributes['prefijo'] = strtoupper($value);
    }

    // Mutador para guardar 'usuario_creo' en mayúsculas
    public function setUsuarioCreoAttribute($value)
    {
        $this->attributes['usuario_creo'] = strtoupper($value);
    }

    public function subcategorias()
    {
        return $this->hasMany(subcategorias::class);
    }
}
