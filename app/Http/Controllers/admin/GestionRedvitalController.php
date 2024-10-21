<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\gestion;
use Illuminate\Http\Request;

class GestionRedvitalController extends Controller
{
    public function index(){
        $reports = gestion::orderBy('id','desc')->where('estado_sebthi','=',0)->paginate(15);
        return view('admin.huvsolicitud.permisosSebthi.index',compact('reports'));
    }

    public function historial(){
        $reports = gestion::orderBy('id','desc')->where('estado_sebthi','=',1)->paginate(15);
        return view('admin.huvsolicitud.permisosSebthi.historial.index',compact('reports'));
    }

    public function edit(gestion $RedvitalPermiso){
        
        return view('admin.huvsolicitud.permisosSebthi.edit',compact('RedvitalPermiso'));
    }

    public function update(Request $request, gestion $RedvitalPermiso)
    {
        $RedvitalPermiso->update($request->all());

        session()->flash('swal',[
            'icon'=>'success',
            'title'=>'Bien hecho',
            'text'=>'El usuario fue actualizado',
        ]); 
        return redirect()->route('RedvitalPermisos.index');

    }
}
