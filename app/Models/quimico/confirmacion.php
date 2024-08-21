<?php

namespace App\Models\quimico;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class confirmacion extends Model
{
    use HasFactory;

    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
