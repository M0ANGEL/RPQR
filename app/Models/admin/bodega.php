<?php

namespace App\Models\admin;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bodega extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
      
      
    ];

    /* mutadores */
    protected function name():Attribute{
        return new Attribute(
            set: fn($value) => strtolower($value),
            get: fn($value) => ucfirst($value),
        );
    }

}
