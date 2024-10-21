<?php

namespace App\Http\Controllers;

use App\Models\Impresora;
use Illuminate\Http\Request;

class CopyparteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Copypartes = Impresora::select('*')->where('estado', '!=', 3)->paginate(8);
        return view('impresoras.copyparte.index', compact('Copypartes'));
    }


    public function show(Impresora $Copyparte)
    {
        return view('impresoras.copyparte.show', compact('Copyparte'));
    }

    public function edit(Impresora $Copyparte)
    {
        return view('impresoras.copyparte.edit', compact('Copyparte'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Impresora $Copyparte)
    {
        $request->validate([
            'estado' => 'required',
        ]);

        $Copyparte->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'La visita se programo',
        ]);
        return redirect()->route('Copyparte.index');
    }

    public function index2(Request $request)
    {
        $query = Impresora::query();

        // Filtrar por el serial si se ingresó algo en la barra de búsqueda
        if ($request->has('serial')) {
            $query->where('serial', 'like', '%' . $request->get('serial') . '%');
        }

        // Obtener los resultados
        $datos = $query->paginate(10);

        return view('impresoras.copyparte.historial', compact('datos'));
    }
}
