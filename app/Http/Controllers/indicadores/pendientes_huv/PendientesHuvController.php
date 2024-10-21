<?php

namespace App\Http\Controllers\indicadores\pendientes_huv;

use App\Http\Controllers\Controller;
use App\Models\indicadores\PendientesHuv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PendientesHuvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bodega = Auth::user()->bodega;
        $datos = PendientesHuv::where('bodega',$bodega)
        ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('SUM(porcentaje) as porcentaje'),DB::raw('SUM(numerador) as hallazgo'),DB::raw('SUM(denominador) as digitado'))
        ->groupBy('month')
        ->orderBy('month')
        ->paginate();
        return view('indicadores.pendientes_huv.regentes.index',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuario = Auth::user();
        return view('indicadores.pendientes_huv.regentes.create',compact('usuario'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           // Validación de los datos del formulario
    $validated = $request->validate([
        'denominador' => 'required|numeric|min:0', // Asegura que sea un número y no negativo
        'numerador' => 'required|numeric|min:0', // Asegura que sea un número y no negativo
        'bodega' => 'required|string|max:255', // Asegura que sea una cadena con longitud máxima de 255 caracteres
        'analisis'=>'required'
    ]);

    // Recuperar datos validados del formulario
    $formDenominador = $validated['denominador'];
    $formNumerador = $validated['numerador'];
    $formbodega = $validated['bodega'];
    $analisis = $validated['analisis'];

    // Convertir los valores a números (float) para cálculos
    $denominador = (float)$formDenominador;
    $numerador = (float)$formNumerador;

    // Verificar que $hallazgo no sea cero para evitar división por cero
    if ($numerador != 0) {
        // Calcular el porcentaje
        $porcentaje = ($numerador / $denominador) * 100;
        $porcentajeFormatted = number_format($porcentaje,2);
    } else {
        return redirect()->back()->withErrors(['hallazgo' => 'El valor de hallazgo no puede ser cero.']);
    }

    // Crear el nuevo registro en la base de datos
    PendientesHuv::create([
        'denominador' => $denominador,
        'numerador' => $numerador,
        'porcentaje' => $porcentajeFormatted,
        'bodega' => $formbodega,
        'analisis' => $analisis
    ]);

    // Establecer un mensaje de éxito en la sesión
    session()->flash('swal', [
        'icon' => 'success',
        'title' => 'Bien hecho',
        'text' => 'El registro se creó correctamente',
    ]);

    // Redirigir a la ruta de creación de indicadores

        return redirect()->route('PenditesHuv.create');

    }

    /**
     * Display the specified resource.
     */
    public function show(PendientesHuv $pendientesHuv)
    {
        
    }

    public function fichaTecnica(){
        return view('indicadores.pendientes_huv.ficha_tecnica.ficha');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PendientesHuv $pendientesHuv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PendientesHuv $pendientesHuv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PendientesHuv $pendientesHuv)
    {
        //
    }
}
