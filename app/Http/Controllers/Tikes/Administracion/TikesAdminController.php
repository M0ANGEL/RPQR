<?php

namespace App\Http\Controllers\tikes\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Tikes\Tike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TikesAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Tike::where('area', 0)
            ->whereIn('estado', [0, 1]);

        // Filtrar por término de búsqueda
        //mirasmos si en la peticion hay un campo llamado text, y si no esta vacio entro en el if miro !epty
        if ($request->has('text') && !empty($request->text)) {
            $query->where(function ($subQuery) use ($request) {
                $subQuery->where('numero_tike', 'like', '%' . $request->text . '%')
                    ->orWhere('categoria', 'like', '%' . $request->text . '%');
            });
        }

        // Ordenar y paginar
        $TikesAdmi = $query->orderBy('prioridad', 'desc')->paginate(20);

        $busqueda = $request->text ?? ''; // Mantener el término de búsqueda en la vista
        $MyId = Auth::user()->id;

        return view('ModuloTikes.Administradores.index', compact('TikesAdmi', 'busqueda', 'MyId'));
    }

    public function tikesPendientesCalificar(Request $request)
    {
        $query = Tike::where('area', 0)->where('estado', 2);

        // Filtrar por término de búsqueda
        //mirasmos si en la peticion hay un campo llamado text, y si no esta vacio entro en el if miro !epty
        if ($request->has('text') && !empty($request->text)) {
            $query->where(function ($subQuery) use ($request) {
                $subQuery->where('numero_tike', 'like', '%' . $request->text . '%')
                    ->orWhere('categoria', 'like', '%' . $request->text . '%');
            });
        }

        // Ordenar y paginar
        $tickesPendientes = $query->orderBy('prioridad', 'desc')->paginate(20);

        $busqueda = $request->text ?? ''; // Mantener el término de búsqueda en la vista
        return view('ModuloTikes.Administradores.PendienteCalificacion.index', compact('tickesPendientes', 'busqueda'));
    }

    public function tikesCalificados(Request $request)
    {

        $query = Tike::where('area', 0)->where('estado', 3);

        // Filtrar por término de búsqueda
        //mirasmos si en la peticion hay un campo llamado text, y si no esta vacio entro en el if miro !epty
        if ($request->has('text') && !empty($request->text)) {
            $query->where(function ($subQuery) use ($request) {
                $subQuery->where('numero_tike', 'like', '%' . $request->text . '%')
                    ->orWhere('categoria', 'like', '%' . $request->text . '%');
            });
        }

        // Ordenar y paginar
        $tickesCalificados = $query->orderBy('prioridad', 'desc')->paginate(20);
        return view('ModuloTikes.Administradores.Cerrados.index', compact('tickesCalificados'));
    }

    public function show(string $id)
    {
        //
    }

    public function Activo(Tike $TikectActivo)
    {
        // Obtener el ID del usuario autenticado
        $usuario = Auth::user()->id;

        // Verificar si el estado del ticket es 0
        if ($TikectActivo->estado === 0) {
            // Actualizar los valores necesarios
            $TikectActivo->update([
                'user_id' => $usuario,
                'estado' => 1, // Cambiar el estado según lo que necesites
            ]);
        }

        // Redirigir a la vista de edición o devolver la vista actualizada
        return view('ModuloTikes.Administradores.edit', compact('TikectActivo'));
    }

    public function disponible(Tike $TikectActivo)
    {

        $TikectActivo->update([
            'user_id' => null,
            'estado' => 0,
        ]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => "El ticket se libero correctamente.",
        ]);

        // Redirigir a la vista de reportes
        return redirect()->route('AdminTikes.index');
    }

    public function edit(Tike $AdminTike)
    {
        return view('ModuloTikes.Administradores.edit', compact('AdminTike'));
    }

    public function update(Request $request, Tike $AdminTike)
    {
        //actualizamos el valor
        $AdminTike->update($request->all());

        // Mostrar mensaje de exito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => "El tike se finalizo correctamente",
        ]);

        // Redirigir a la vista de reportes
        return redirect()->route('AdminTikes.index');
    }

    /* show de estados de tikes */
    public function VistaTikectSinCalificados(Tike $tickesPendiente)
    {
        return view('ModuloTikes.Administradores.PendienteCalificacion.show', compact('tickesPendiente'));
    }

    public function VistaTikectCerrados(Tike $tickesCerrados)
    {
        return view('ModuloTikes.Administradores.Cerrados.show', compact('tickesCerrados'));
    }

    public function CambiarArea(Tike $TikectActivo)
    {
        if ($TikectActivo->area === 0) {
            // Actualizar los valores necesarios
            $TikectActivo->update([
                'area' => 1,
            ]);
        } else if ($TikectActivo->area === 1) {
            // Actualizar los valores necesarios
            $TikectActivo->update([
                'area' => 0,
            ]);
        }

        // Mostrar mensaje de exito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => "El ticket se cambio de area correctamente",
        ]);


        // Redirigir a la vista de reportes
        return redirect()->route('AdminTikes.index');
    }
}
