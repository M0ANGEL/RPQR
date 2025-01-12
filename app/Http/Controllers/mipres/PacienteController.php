<?php

namespace App\Http\Controllers\mipres;

use App\Http\Controllers\Controller;
use App\Models\mipres\Mipres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('mypres.paciente.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'documento' => 'required',
            'tipoDocumento' => 'required',
            'historia' => 'required',
        ]);

        // Verificar si el documento ya existe
        $existingPatient = Mipres::where('documento', $request->documento)->first();
        if ($existingPatient) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'Error',
                'text' => 'Este documento ya está registrado.',
            ]);
            return back()->withInput();
        }

        // Crear el registro si no existe
        $huv = Mipres::create([
            'name' => $request->name,
            'documento' => $request->documento,
            'tipoDocumento' => $request->tipoDocumento,
            'historia' => $request->historia,
            'user_id' => Auth::id(),
        ]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'El paciente se creó correctamente',
        ]);

        return redirect()->route('EntregaMedicamentos.index');
    }

    public function edit(Mipres $Mipre)
    {
        return view('mypres.paciente.edit', compact('Mipre'));
    }

    public function update(Request $request, Mipres $Mipre)
    {
        // Verificar si el documento ya existe en otro paciente
        $existingPatient = Mipres::where('documento', $request->documento)
            ->where('id', '!=', $Mipre->id) // Asegura que no sea el mismo paciente
            ->first();

        if ($existingPatient) {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'Error',
                'text' => 'Este documento ya está registrado en otro paciente.',
            ]);
            return back()->withInput();
        }

        // Actualizar el registro si no hay duplicados
        $Mipre->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'El usuario se actualizó correctamente',
        ]);

        return redirect()->route('EntregaMedicamentos.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Mipres $Mipre) {}
}
