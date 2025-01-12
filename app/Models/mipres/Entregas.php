<?php

// App\Models\mipres\Entregas.php

namespace App\Models\mipres;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entregas extends Model
{
    use HasFactory;

    protected $table = 'entrega_';

    protected $fillable = [
        'mipres_paciente_id',
        'medicamento_id',
        'cantidad_entregada',
        'cantidad_restante',
        'ambito',
        'prescripcion',
        'fecha_mipres',
        'fecha_entrega',
        'user_id',
        'cancelado',
        'cancelado_estado',
        'usuario_cancela',
        'id_entrega'
    ];

    // Relación con el modelo `MipresPaciente`
    public function paciente()
    {
        return $this->belongsTo(Mipres::class, 'mipres_paciente_id');
    }

    // Relación con el modelo `Medicamento`
    public function medicamento()
    {
        return $this->belongsTo(Medicamento::class, 'medicamento_id');
    }

    // Relación con el modelo `User`
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
