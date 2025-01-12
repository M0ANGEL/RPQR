<?php

namespace App\Http\Controllers\Tikes\Subcategorias;

use App\Http\Controllers\Controller;
use App\Models\Tikes\Categorias;
use App\Models\Tikes\Subcategorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Categorias = Categorias::where('estado', 1)->get();
        $Subcategorias = Subcategorias::orderBy('id', 'desc')->paginate(5);
        /* return $Subcategorias; */
        return view('ModuloTikes.Administradores.Subcategorias.index', compact('Categorias', 'Subcategorias'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            '_tikes_categorias_id' => 'required',
            'prioridad' => 'required',
            'area' => 'required',
            'autorizacion' => 'required',
        ]);

        $usuario = Auth::user()->name;

        Subcategorias::create([
            'name' => $request->name,
            'usuario_creo' => $usuario,
            '_tikes_categorias_id' => $request->_tikes_categorias_id,
            'prioridad' => $request->prioridad,
            'area' => $request->area,
            'autorizacion' => $request->autorizacion,
        ]);

        // Enviar alerta de éxito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => "La subcategoría se creó correctamente.",
        ]);

        return redirect()->route('subcategorias.index'); // Redirigir al índice
    }


    public function edit(Subcategorias $subcategoria)
    {
        $Categorias = Categorias::where('estado', 1)->get();
        return view('ModuloTikes.Administradores.Subcategorias.edit', compact('subcategoria', 'Categorias'));
    }


    public function update(Request $request, Subcategorias $subcategoria)
    {

        //actualizamos el valor
        $subcategoria->update($request->all());

        // Mostrar mensaje de éxito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => "La subcategoria se actualizo",
        ]);

        // Redirigir a la vista de reportes
        return redirect()->route('subcategorias.index');
    }

    public function EstadosSubcategorias(Subcategorias $Subcategoria)
    {
        // Verificar si el estado de la Subcategoria es 2
        if ($Subcategoria->estado === 2) {
            // Actualizar los valores necesarios
            $Subcategoria->update([
                'estado' => 1,
            ]);
        } else {
            // Actualizar los valores necesarios
            $Subcategoria->update([
                'estado' => 2,
            ]);
        }

        if ($Subcategoria->estado === 2) {
            session()->flash('swal', [
                'icon' => 'success',
                'title' => 'Bien hecho',
                'text' => "La subcategoria se inactivo correctamente",
            ]);
        } else {
            session()->flash('swal', [
                'icon' => 'success',
                'title' => 'Bien hecho',
                'text' => "La subcategoria se activo correctamente",
            ]);
        }

        return redirect()->route('subcategorias.index');
    }
}
