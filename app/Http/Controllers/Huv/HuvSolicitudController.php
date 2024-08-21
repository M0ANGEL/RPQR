<?php

namespace App\Http\Controllers\Huv;

use App\Http\Controllers\Controller;
use App\Models\huv\huv;
use Illuminate\Http\Request;

class HuvSolicitudController extends Controller
{
    public function index()
    {
        /* filtro por dos campos a la tabla usuarios huv */
        $usuarios = huv::select('*')->where('confirmado','=',true)
                                    ->where('activo_servinte','=',false)
                                    ->paginate();
        return view('admin.huvsolicitud.index',compact('usuarios'));
    }
    
    public function edit(huv $solicitud)
    {
       
        return view('admin.huvsolicitud.edit',compact('solicitud'));
    }

    public function update(Request $request, huv $solicitud)
    {
        $request->validate([
            'activo_servinte'=>'required|boolean'
            
        ]);

        $solicitud->update($request->all());

        session()->flash('swal',[
            'icon'=>'success',
            'title'=>'Bien hecho',
            'text'=>'El usuario se confirmo corretamente',
        ]); 
        return redirect()->route('solicitud.index');
    }
}
