<?php

namespace App\Http\Controllers\Regente;

use App\Http\Controllers\Controller;
use App\Models\admin\report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegenteEventosController extends Controller
{
    public function index()
    {
        /* datos de usuario logueado */
        $reportes_regentes = report::select('*')
        ->where('grupo_bodega', '=', Auth::user()->bodega)
        ->where('estado', '!=', 1)
        ->paginate(15);
        

        return view('report.regentes.index',compact('reportes_regentes'));
    }

    public function edit(report $reportes_regente)
    {
        return view('report.regentes.edit',compact('reportes_regente'));
    }

    public function update(Request $request, report $reportes_regente)
    {
        $request->validate([
            'porque1'=>'required',
            'respuesta_porque1'=>'required',
            'porque2',
            'respuesta_porque2',
            'porque3',
            'respuesta_porque3',
            'porque4',
            'respuesta_porque4',
            'porque5',
            'respuesta_porque5',
            'causa_raiz'=>'required',
            'estado'=>'required'
            
        ]);

        
        $reportes_regente->update($request->all());

        
        session()->flash('swal',[
            'icon'=>'success',
            'title'=>'Bien hecho',
            'text'=>'El reporte fue actualizado',
        ]); 
        return redirect()->route('reportes_regente.index');
    }
}
