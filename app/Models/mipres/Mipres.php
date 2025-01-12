<?php

namespace App\Models\mipres;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mipres extends Model
{
    use HasFactory;

    protected $table = "mipres_paciente";

    protected $fillable = [
        'name',
        'documento',
        'tipoDocumento',
        'historia',
        'numeroId',
        'user_id'
    ];

    // App\Models\mipres\Mipres.php
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
