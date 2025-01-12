<?php

namespace App\Http\Controllers\Agotados;

use App\Http\Controllers\Controller;
use App\Models\Agotados\Agotados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Agotadoscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Agotados::orderBy('id', 'desc')->paginate(15);
        return view('admin.agotados.registro.index', compact('datos'));
    }

    public function menu(Request $request)
    {
        $busqueda = $request->get('text', '');

        /* búsqueda de registros filtrada */
        $datos = DB::table('agotados')
            ->where('estado', '=', '1') // Filtra solo los registros activos
            ->where(function ($query) use ($busqueda) {
                $query->where('descripcion', 'like', '%' . $busqueda . '%')
                    ->orWhere('marca', 'like', '%' . $busqueda . '%')
                    ->orWhere('created_at', 'like', '%' . $busqueda . '%');
            })
            ->select('id', 'descripcion', 'fecha_En', 'estado_p', 'marca', 'tiene_carta')
            ->paginate(15);

        return view('admin.agotados.index', compact('datos', 'busqueda'));
    }

    public function create()
    {
        return view('admin.agotados.registro.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'marcas' => 'required|array',
            'estados' => 'required|array',
            'fechas_En' => 'required|array',
            'pdfs' => 'array',
            'tiene_carta' => 'required|array',
            'estados_p' => 'required|array',
        ]);

        $cantidad = count($request->marcas);

        for ($i = 0; $i < $cantidad; $i++) {
            $agotado = new Agotados;

            // Asignar la misma descripción a todos los registros
            $agotado->descripcion = $request->descripcion;

            // Asignar los demás datos según el índice
            $agotado->marca = $request->marcas[$i];
            $agotado->estado = $request->estados[$i];
            $agotado->fecha_En = $request->fechas_En[$i];
            $agotado->tiene_carta = $request->tiene_carta[$i];
            $agotado->estado_p = $request->estados_p[$i];

            // Manejar la carga de cada archivo PDF
            if ($request->hasFile('pdfs.' . $i)) {
                $file = $request->file('pdfs.' . $i);
                $agotado->pdfs = file_get_contents($file); // Convertir el archivo a binario
            }

            // Guardar la instancia en la base de datos
            $agotado->save();
        }

        // Mostrar mensaje de éxito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'Ítems creados correctamente',
        ]);

        // Redirigir a la vista de creación
        return redirect()->route('AdministrarAgotados.create');
    }


    public function show($id)
    {
        $item = Agotados::findOrFail($id);
        return view('admin.agotados.show', compact('item'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agotados $AdministrarAgotado)
    {
        return view('admin.agotados.registro.edit', compact('AdministrarAgotado'));
    }

    public function update(Request $request, Agotados $AdministrarAgotado)
    {
        // Validar los datos del request
        $request->validate([
            'descripcion' => 'required',
            'estado' => 'required',
            'fecha_En' => 'required',
            'pdfs' => 'nullable|file|mimes:pdf|max:2048', // PDF es opcional
            'estado_p' => 'required',
            'tiene_carta' => 'required',
        ]);

        // Actualizar los campos que no son el archivo PDF
        $AdministrarAgotado->descripcion = $request->descripcion;
        $AdministrarAgotado->estado = $request->estado;
        $AdministrarAgotado->fecha_En = $request->fecha_En;
        $AdministrarAgotado->estado_p = $request->estado_p;
        $AdministrarAgotado->tiene_carta = $request->tiene_carta;

        // Manejar la carga del archivo PDF si existe uno nuevo
        if ($request->hasFile('pdfs')) {
            $file = $request->file('pdfs');
            $AdministrarAgotado->pdfs = file_get_contents($file); // Convierte el archivo a binario
        }

        // Guardar los cambios en la base de datos
        $AdministrarAgotado->save();

        // Mostrar mensaje de éxito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'El ítem se actualizó correctamente',
        ]);

        // Redirigir a la vista de índice
        return redirect()->route('AdministrarAgotados.index');
    }


    public function destroy(Agotados $AdministrarAgotado)
    {

        $AdministrarAgotado->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'El item se elimino correctamente'
        ]);

        return redirect()->route('AdministrarAgotados.index');
    }
}
