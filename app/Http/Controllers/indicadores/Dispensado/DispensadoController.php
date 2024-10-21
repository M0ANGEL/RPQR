<?php

namespace App\Http\Controllers\indicadores\Dispensado;

use App\Http\Controllers\Controller;
use App\Models\indicadores\Dispensado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DispensadoController extends Controller
{
    
    public function index()
    {
        $datos = Dispensado::all();
        return view('indicadores.errorDisp.index', compact('datos'));
    }

    public function create()
    {
        $usuario = Auth::user();
        return view('indicadores.errorDisp.regentes.create',compact('usuario'));
    }

    public function store(Request $request)
    {
       // Validación de los datos del formulario
    $validated = $request->validate([
        'denominador' => 'required|numeric|min:0', // Asegura que sea un número y no negativo
        'numerador' => 'required|numeric|min:0', // Asegura que sea un número y no negativo
        'bodega' => 'required|string|max:255', // Asegura que sea una cadena con longitud máxima de 255 caracteres
    ]);

    // Recuperar datos validados del formulario
    $formdenominador = $validated['denominador'];
    $formnumerador = $validated['numerador'];
    $formbodega = $validated['bodega'];

    // Convertir los valores a números (float) para cálculos
    $denominador = (float)$formdenominador;
    $numerador = (float)$formnumerador;

    // Verificar que $numerador no sea cero para evitar división por cero
    if ($numerador != 0) {
        // Calcular el porcentaje
        $porcentaje = ($numerador / $denominador) * 100;
        $porcentajeFormatted = number_format($porcentaje, 2);
    } else {
        return redirect()->back()->withErrors(['numerador' => 'El valor de numerador no puede ser cero.']);
    }

    // Crear el nuevo registro en la base de datos
    Dispensado::create([
        'denominador' => $denominador,
        'numerador' => $numerador,
        'porcentaje' => $porcentajeFormatted,
        'bodega' => $formbodega,
    ]);

    // Establecer un mensaje de éxito en la sesión
    session()->flash('swal', [
        'icon' => 'success',
        'title' => 'Bien hecho',
        'text' => 'El registro se creó correctamente',
    ]);

    // Redirigir a la ruta de creación de indicadores

        return redirect()->route('indicadores.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dispensado $Dispensado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dispensado $Dispensado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dispensado $Dispensado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dispensado $Dispensado)
    {
        //
    }
}
