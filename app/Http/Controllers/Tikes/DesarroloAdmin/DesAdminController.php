<?php

namespace App\Http\Controllers\Tikes\DesarroloAdmin;

use App\Http\Controllers\Controller;
use App\Models\Tikes\Tike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Tike::where('area', 1)
            ->whereIn('estado', [0, 1]);

        // Filtrar por término de búsqueda
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

        return view('ModuloTikes.DesarrolloAdmin.index', compact('TikesAdmi', 'busqueda', 'MyId'));
    }

    public function tikesPendientesCalificar(Request $request)
    {
        $query = Tike::where('area', 1)->where('estado', 2);

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
        return view('ModuloTikes.DesarrolloAdmin.PendienteCalificacion.index', compact('tickesPendientes'));
    }

    public function tikesCalificados(Request $request)
    {

        $query = Tike::where('area', 1)->where('estado', 3);

        // Filtrar por término de búsqueda
        //mirasmos si en la peticion hay un campo llamado text, y si no esta vacio entro en el if miro !epty
        if ($request->has('text') && !empty($request->text)) {
            $query->where(function ($subQuery) use ($request) {
                $subQuery->where('numero_tike', 'like', '%' . $request->text . '%')
                    ->orWhere('categoria', 'like', '%' . $request->text . '%');
            });
        }

        $busqueda = $request->text ?? ''; // Mantener el término de búsqueda en la vista

        // Ordenar y paginar
        $tickesCalificados = $query->orderBy('prioridad', 'desc')->paginate(20);
        return view('ModuloTikes.DesarrolloAdmin.Cerrados.index', compact('tickesCalificados', 'busqueda'));
    }

    public function show(string $id)
    {
        //
    }

    public function Activo(Tike $TicketsAdminDesarrollo)
    {
        // Obtener el ID del usuario autenticado
        $usuario = Auth::user()->id;

        // Verificar si el estado del ticket es 0
        if ($TicketsAdminDesarrollo->estado === 0) {
            // Actualizar los valores necesarios
            $TicketsAdminDesarrollo->update([
                'user_id' => $usuario,
                'estado' => 1, // Cambiar el estado según lo que necesites
            ]);
        }

        // Redirigir a la vista de edición o devolver la vista actualizada
        return view('ModuloTikes.DesarrolloAdmin.edit', compact('TicketsAdminDesarrollo'));
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
        return redirect()->route('TicketsAdminDesarrollos.index');
    }

    public function edit(Tike $AdminTike)
    {
        return view('ModuloTikes.DesarrolloAdmin.edit', compact('AdminTike'));
    }

    public function update(Request $request, Tike $TicketsAdminDesarrollo)
    {
        //actualizamos el valor
        $TicketsAdminDesarrollo->update($request->all());

        // Mostrar mensaje de exito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => "El tike se finalizo correctamente",
        ]);

        // Redirigir a la vista de reportes
        return redirect()->route('TicketsAdminDesarrollos.index');
    }

    /* show de estados de tikes */
    public function VistaTikectSinCalificados(Tike $tickesPendiente)
    {
        return view('ModuloTikes.DesarrolloAdmin.PendienteCalificacion.show', compact('tickesPendiente'));
    }

    public function VistaTikectCerrados(Tike $tickesCerrados)
    {
        return view('ModuloTikes.DesarrolloAdmin.Cerrados.show', compact('tickesCerrados'));
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
        return redirect()->route('TicketsAdminDesarrollos.index');
    }
}
