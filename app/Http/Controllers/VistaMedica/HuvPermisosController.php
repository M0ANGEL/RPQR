<?php

namespace App\Http\Controllers\VistaMedica;

use App\Http\Controllers\Controller;
use App\Models\admin\gestion;
use Illuminate\Http\Request;

class HuvPermisosController extends Controller
{
    public function index()
    {
        $reports = gestion::orderBy('id', 'desc')
            ->where('estado_servinte', '=', 0)
            ->where('estado', '=', 0)
            ->paginate(15);


        return view('admin.huvsolicitud.permisos.index', compact('reports'));
    }

    public function historial()
    {
        $reports = gestion::orderBy('id', 'desc')->where('estado_servinte', '=', 1)
            ->orWhere('estado', '=', 1)->paginate(15);
        return view('admin.huvsolicitud.permisos.historial.index', compact('reports'));
    }

    public function edit(gestion $huvpermiso)
    {

        return view('admin.huvsolicitud.permisos.edit', compact('huvpermiso'));
    }

    public function update(Request $request, gestion $huvpermiso)
    {
        $huvpermiso->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'El usuario fue actualizado',
        ]);
        return redirect()->route('huvpermisos.index');
    }
}
