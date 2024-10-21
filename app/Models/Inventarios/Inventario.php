<?php
namespace App\Models\Inventarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $table = 'inventarios'; // Nombre de tu tabla de inventarios

    protected $fillable = [
        'bodega',
        'piso',
        'fecha_entrega',
        'estado',
        'pareja',
        'mouse',
        'teclado',
        'fecha_retiro',
        'motivo_salida',
        'equiposPC_id' // Este es el campo de la llave foránea
    ];

    // Relación belongsTo, ya que un inventario pertenece a un equipo
    public function equipo()
    {
        return $this->belongsTo(Registros::class, 'equiposPC_id');
    }
}
