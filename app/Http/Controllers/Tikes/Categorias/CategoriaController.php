<?php

namespace App\Http\Controllers\Tikes\Categorias;

use App\Http\Controllers\Controller;
use App\Models\Tikes\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categorias::orderBy('id', 'desc')->paginate(4);
        return view('ModuloTikes.Administradores.Categorias.index', compact('categorias'));
    }

    public function EstadosCategorias(Categorias $Categorias)
    {
        // Verificar si el estado de la categoria es 2
        if ($Categorias->estado === 2) {
            // Actualizar los valores necesarios
            $Categorias->update([
                'estado' => 1,
            ]);
        } else {
            // Actualizar los valores necesarios
            $Categorias->update([
                'estado' => 2,
            ]);
        }

        if ($Categorias->estado === 2) {
            session()->flash('swal', [
                'icon' => 'success',
                'title' => 'Bien hecho',
                'text' => "La categoria se inactivo correctamente",
            ]);
        } else {
            session()->flash('swal', [
                'icon' => 'success',
                'title' => 'Bien hecho',
                'text' => "La categoria se activo correctamente",
            ]);
        }

        return redirect()->route('categorias.index');
    }

    public function store(Request $request)
    {
        // Validar el campo 'name' pero no validar aún el prefijo
        $request->validate([
            'name' => 'required',
            'prefijo' => 'required',
        ]);

        // Verificar si el prefijo ya existe
        $prefijoParaBusqueda = $request->prefijo;
        $prefijoExiste = Categorias::where('prefijo', $prefijoParaBusqueda)->exists();

        if ($prefijoExiste) {
            // Enviar alerta personalizada si el prefijo ya existe
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'Prefijo duplicado',
                'text' => "El prefijo '{$prefijoParaBusqueda}' ya está registrado.",
            ]);

            return redirect()->back()->withInput(); // Redirigir al formulario
        }

        // Si el prefijo no existe, crear la nueva categoría
        $usuario = Auth::user()->name;

        Categorias::create([
            'name' => $request->name,
            'prefijo' => $request->prefijo,
            'usuario_creo' => $usuario,
        ]);

        // Enviar alerta de éxito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => "La categoría se creó correctamente.",
        ]);

        return redirect()->route('categorias.index'); // Redirigir al índice
    }

    public function edit(Categorias $categorias)
    {
        //
    }

    public function update(Request $request, Categorias $categorias)
    {
        //
    }

    public function destroy(Categorias $categorias)
    {
        //
    }
}
