<?php

namespace App\Http\Controllers\Tikes\Confirmacion;

use App\Http\Controllers\Controller;
use App\Models\Tikes\Tike;
use Illuminate\Http\Request;

class TickestConfirmacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $TickestConfirmacion = Tike::where('autorizacion', 1)->paginate(20);
        return view('ModuloTikes.Confirmacion.index', compact('TickestConfirmacion'));
    }

    public function edit(Tike $AutorizacionTicke)
    {
        return view('ModuloTikes.Confirmacion.edit', compact('AutorizacionTicke'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tike $AutorizacionTicke)
    {
        //actualizamos el valor
        $AutorizacionTicke->update($request->all());

        // Mostrar mensaje de éxito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => "El ticket se autorizo correctamentes",
        ]);

        // Redirigir a la vista de reportes
        return redirect()->route('AutorizacionTickes.index');
    }
}
