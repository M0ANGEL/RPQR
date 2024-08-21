<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\bodega;
use Illuminate\Http\Request;

class BodegasController extends Controller
{
    public function index()
    {
        $bodegas = bodega::all();
        return view('admin.bodega.index',compact('bodegas'));
    }

    public function create()
    {
        return view('admin.bodega.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);

        bodega::create($request->all());

        session()->flash('swal',[
            'icon' => 'succes',
            'title'=>'Bien hecho',
            'text'=>'la bodega se creo correctamente',
        ]);

        return redirect()->route('bodegas.index');
    }

    public function edit(bodega $bodega)
    {
        return view('admin.bodega.edit',compact('bodega'));
    }

    public function update(Request $request, bodega $bodega)
    {
        $request->validate([
            'name'=>'required',
        ]);
      
        $bodega->update($request->all());

        session()->flash('swal',[
            'icon'=>'success',
            'title'=>'Bien hecho',
            'text'=>'La bodega se actualizo corretamente',
        ]);

        return redirect()->route('bodegas.index');
    }

    public function destroy(bodega $bodega)
    {
        $bodega->delete();
         
        session()->flash('swal',[
        'icon'=>'success',
        'title'=>'¡Bien hecho!',
        'text'=>'La bodega se elimino correctamente'
        ]);

        return redirect()->route('bodegas.index');
    }
}
