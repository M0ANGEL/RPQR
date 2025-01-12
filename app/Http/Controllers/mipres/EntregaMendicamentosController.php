<?php

namespace App\Http\Controllers\mipres;

use App\Http\Controllers\Controller;
use App\Models\Entrega;
use App\Models\mipres\Entregas;
use App\Models\mipres\Historial;
use App\Models\mipres\Medicamento;
use App\Models\mipres\Mipres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntregaMendicamentosController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->get('text', '');
        $users = Mipres::orderBy('id', 'desc')
            ->where('name', 'like', '%' . $busqueda . '%')
            ->orWhere('documento', 'like', '%' . $busqueda . '%')
            ->orWhere('historia', 'like', '%' . $busqueda . '%')
            ->paginate(6);

        return view('mypres.entrega.index', compact('users', 'busqueda'));
    }

    public function create($Mipre)
    {
        $paciente = Mipres::find($Mipre);
        $medicamentos = Medicamento::all(); // Traer todos los medicamentos
        return view('mypres.entrega.create', compact('paciente', 'medicamentos'));
    }



    public function store(Request $request)
    {

        // Validar los datos de entrada
        $request->validate([
            'mipres_paciente_id' => 'required|integer',
            'medicamento_id' => 'required|integer',
            'cantidad_entregada' => 'required|integer|min:1',
            'prescripcion' => 'required|string',
            'ambito' => 'required|string',
            'fecha_mipres' => 'required|date',
        ]);

        // Crear la entrega y obtener el registro creado
        $entrega = Entregas::create([
            'mipres_paciente_id' => $request->mipres_paciente_id, // Asegúrate de que esto esté presente
            'medicamento_id' => $request->medicamento_id,
            'cantidad_entregada' => $request->cantidad_entregada,
            'cantidad_restante' => $request->cantidad_entregada,  // misma cantidad que cantidad_entregada
            'prescripcion' => $request->prescripcion,
            'ambito' => $request->ambito,
            'fecha_mipres' => $request->fecha_mipres,
            'user_id' => Auth::id(),
        ]);

        // Crear el historial de entrega
        $historial = Historial::create([
            'entrega__id' => $entrega->id, // Guarda el ID del registro de entrega creado
            'medicamento_id' => $request->medicamento_id,
            'cantidad_entregada' => $request->cantidad_entregada,
            'cantidad_restante' => $request->cantidad_entregada,  // misma cantidad que cantidad_entregada
            'fecha_entrega' => date('Y-m-d'),
            'user_id' => Auth::id(),
        ]);

        // Flash message para la sesión
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'La entrega se creó correctamente',
        ]);

        // Redireccionar a la vista de índice
        return redirect()->route('Mipres_Activos.index');
    }
}
