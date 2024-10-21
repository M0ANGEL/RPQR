<?php

namespace App\Http\Controllers;

use App\Models\Impresora;
use Illuminate\Http\Request;

class ImpresoraController extends Controller
{
    public function index()
    {
        $datos = Impresora::select('*')->where('estado', '!=', 3)->paginate(8);
        return view('impresoras.farmart.index', compact('datos'));
    }

    public function create()
    {
        return view('impresoras.farmart.create');
    }

    public function store(Request $request)
    {
        // Validar los datos entrantes
        $request->validate([
            'letra' => 'required|string',
            'modelo' => 'required|string|max:255',
            'serial' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'piso' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'problema' => 'required|string|max:255',
            'codigo' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'estado' => 'required|string',

        ]);

        // Crear un nuevo reporte
        Impresora::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'El reporte se creo correctamente',
        ]);

        // Redirigir o devolver una respuesta
        return redirect()->route('ReporteImpresora.index');
    }
}
