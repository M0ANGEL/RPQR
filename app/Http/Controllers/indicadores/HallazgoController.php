<?php

namespace App\Http\Controllers\indicadores;

use App\Http\Controllers\Controller;
use App\Models\indicadores\Hallazgo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HallazgoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Hallazgo::all();
        return view('indicadores.hallazgo.index', compact('datos'));
    }

    public function create()
    {
        $usuario = Auth::user();
        return view('indicadores.hallazgo.regentes.create',compact('usuario'));
    }

    public function store(Request $request)
    {
       // Validación de los datos del formulario
    $validated = $request->validate([
        'digitado' => 'required|numeric|min:0', // Asegura que sea un número y no negativo
        'hallazgo' => 'required|numeric|min:0', // Asegura que sea un número y no negativo
        'bodega' => 'required|string|max:255', // Asegura que sea una cadena con longitud máxima de 255 caracteres
    ]);

    // Recuperar datos validados del formulario
    $formdigitado = $validated['digitado'];
    $formhallazgo = $validated['hallazgo'];
    $formbodega = $validated['bodega'];

    // Convertir los valores a números (float) para cálculos
    $digitado = (float)$formdigitado;
    $hallazgo = (float)$formhallazgo;

    // Verificar que $hallazgo no sea cero para evitar división por cero
    if ($hallazgo != 0) {
        // Calcular el porcentaje
        $porcentaje = ($hallazgo / $digitado) * 100;
        $porcentajeFormatted = number_format($porcentaje, 2);
    } else {
        return redirect()->back()->withErrors(['hallazgo' => 'El valor de hallazgo no puede ser cero.']);
    }

    // Crear el nuevo registro en la base de datos
    Hallazgo::create([
        'digitado' => $digitado,
        'hallazgo' => $hallazgo,
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
    public function show(Hallazgo $hallazgo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hallazgo $hallazgo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hallazgo $hallazgo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hallazgo $hallazgo)
    {
        //
    }
}
