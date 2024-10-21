<?php

namespace App\Http\Controllers\Inventarios;

use App\Http\Controllers\Controller;
use App\Models\Inventarios\Inventario;
use App\Models\Inventarios\Registros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RetiroController extends Controller
{

    public function index(Request $request)
    {
        $busqueda = $request->get('text', '');

        // Realizar la consulta utilizando la relación 'equipo'
        $datos = Inventario::with('equipo')
        ->whereHas('equipo', function($query) {
            // Filtrar los equiposPC que tengan el estado en 1
            $query->where('estado', 1);
        })
        ->where(function($query) use ($busqueda) {
            // Filtros adicionales para búsqueda
            $query->where('bodega', 'like', '%' . $busqueda . '%')
                ->orWhere('piso', 'like', '%' . $busqueda . '%')
                ->orWhere('pareja', 'like', '%' . $busqueda . '%')
                ->orWhereHas('equipo', function($query) use ($busqueda) {
                    $query->where('activo', 'like', '%' . $busqueda . '%'); // Buscar en la columna activo de equiposPC
                });
        })
        ->paginate(15);

        return view('Inventarios.retiro.index', compact('datos', 'busqueda'));

    }


    public function edit($id)
    {
        // Buscar el inventario por su ID y cargar la relación con equipo
        $Inventarios_Retiro = Inventario::with('equipo')->findOrFail($id);
        return view('Inventarios.retiro.edit', compact('Inventarios_Retiro'));
    }

    public function update(Request $request, Inventario $Inventarios_Retiro)
    {
        // Validar los campos requeridos
        $request->validate([
            'fecha_retiro' => 'required',
            'motivo_salida' => 'required',           
        ]);

        // Actualizar los datos de Inventarios_Retiro
        $Inventarios_Retiro->update($request->all());

        // Obtener el modelo relacionado a equiposPC_id
        $campo2 = Registros::find($Inventarios_Retiro->equiposPC_id);

        // Verificar si el estado está en verdadero (1) y cambiarlo a falso (0)
        if ($campo2 && $campo2->estado === 1) {
            $campo2->estado = 0;
            $campo2->save();
        }

        // Mostrar notificación de éxito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'El equipo fue retirado correctamente',
        ]);

        // Redirigir de nuevo al índice
        return redirect()->route('Inventarios_Retiros.index');
    }

    public function cambioIndex(Request $request)
    {
        $busqueda = $request->get('text', '');

        // Realizar la consulta utilizando la relación 'equipo'
        $datos = Inventario::with('equipo')
        ->whereHas('equipo', function($query) {
            // Filtrar los equiposPC que tengan el estado en 1
            $query->where('estado', 1);
        })
        ->where(function($query) use ($busqueda) {
            // Filtros adicionales para búsqueda
            $query->where('bodega', 'like', '%' . $busqueda . '%')
                ->orWhere('piso', 'like', '%' . $busqueda . '%')
                ->orWhere('pareja', 'like', '%' . $busqueda . '%')
                ->orWhereHas('equipo', function($query) use ($busqueda) {
                    $query->where('activo', 'like', '%' . $busqueda . '%'); // Buscar en la columna activo de equiposPC
                });
        })
        ->paginate(15);

        return view('Inventarios.retiro.cambioindex', compact('datos', 'busqueda'));

    }

    public function cambioAreaEdit($id)
    {
        // Buscar el inventario por su ID y cargar la relación con equipo
        $Inventarios_Retiro = Inventario::with('equipo')->findOrFail($id);
        return view('Inventarios.retiro.cambioedit', compact('Inventarios_Retiro'));
    }

    public function cambiarUpdate(Request $request, Inventario $Inventarios_Retiro)
    {
        // Validar los campos requeridos
        $request->validate([
            'bodega' => 'required',         
        ]);

        // Actualizar los datos de Inventarios_Retiro
        $Inventarios_Retiro->update($request->all());

        // Mostrar notificación de éxito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'El equipo fue cambiado de area correctamente',
        ]);

        // Redirigir de nuevo al índice
        return redirect()->route('Inventarios_Cambio_Area');
    }


}
