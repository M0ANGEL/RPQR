<?php

namespace App\Http\Controllers\VistaMedica;

use App\Http\Controllers\Controller;
use App\Models\vistaMedica\vista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IngresosVistaMedicaController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->get('text','');
        
        /* busqueda de registros filtrada */

        $datos = DB::table('vista')
        ->select('id','acttor','vistamedica','nombrevistamedica','unidadmedica','codigosebthi','medicamento')
        ->where('medicamento','like','%'.$busqueda.'%')
        ->orwhere('codigosebthi','like','%'.$busqueda.'%')
        ->paginate(15);

        return view('admin.vistamedica.registro.index',compact('datos','busqueda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vistamedica.registro.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'acttor',
            'vistamedica'=>'required',
            'nombrevistamedica'=>'required',
            'unidadmedica'=>'required',
            'codigosebthi'=>'required',
            'medicamento'=>'required',
            
        ]);

        vista::create($request->all());

        session()->flash('swal',[
            'icon'=>'success',
            'title'=>'Bien hecho',
            'text'=>'Iten creado correctamente',
        ]); 
        return redirect()->route('IngresoVistaMedica.index'); 
    }

    public function edit(vista $IngresoVistaMedica)
    {
        return view('admin.vistamedica.registro.edit',compact('IngresoVistaMedica'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, vista $IngresoVistaMedica)
    {
        $IngresoVistaMedica->update($request->all()); 

        session()->flash('swal',[
            'icon'=>'success',
            'title'=>'Bien hecho',
            'text'=>'El usuario se actualizo corretamente',
        ]); 
        return redirect()->route('IngresoVistaMedica.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(vista $IngresoVistaMedica)
    {
        $IngresoVistaMedica->delete();
         
        session()->flash('swal',[
        'icon'=>'success',
        'title'=>'¡Bien hecho!',
        'text'=>'El item se elimino correctamente'
        ]);

        return redirect()->route('IngresoVistaMedica.index');
    }
}
