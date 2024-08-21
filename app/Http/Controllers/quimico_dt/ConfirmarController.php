<?php

namespace App\Http\Controllers\quimico_dt;

use App\Http\Controllers\Controller;
use App\Models\huv\huv;
use Illuminate\Http\Request;

class ConfirmarController extends Controller
{
    public function index()
    {
        $confirmacions = huv::orderBy('id','desc')->select('*')->where('confirmado','=',false)->paginate(7);
        return view('admin.confir.index',compact('confirmacions',));
    }

    public function edit(huv $confirmacion)
    {
        return view('admin.confir.edit',compact('confirmacion'));
  
    }

    public function update(Request $request, huv $confirmacion)
    {
        $request->validate([
            'confirmado'=>'required|boolean'
            
        ]);

        $confirmacion->update($request->all());

        session()->flash('swal',[
            'icon'=>'success',
            'title'=>'Bien hecho',
            'text'=>'El usuario se confirmp corretamente',
        ]); 
        return redirect()->route('confirmacion.index');

    }
}
