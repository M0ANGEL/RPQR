<?php

namespace App\Models\Novedades;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivos extends Model
{
    use HasFactory;

    protected $table = 'archivos';

    protected $fillable = [
        'novedad_id',
        'archivo',
    ];

    public function novedad()
    {
        return $this->belongsTo(Novedades::class);
    }
}
