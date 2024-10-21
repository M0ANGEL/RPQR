<?php

namespace App\Http\Controllers\Regente;

use App\Http\Controllers\Controller;
use App\Models\admin\report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        
        $reports = report::orderBy('id','desc')->select('*')
        ->whereNot('estado','=',1)
        ->paginate(15);
        return view('report.index',compact('reports'));
    }

    public function create()
    {
        
        $reports = report::all();
        return view('report.create',compact('reports'));
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'fechareporte' => 'required',
            'redservicio' => 'required',
            'huvservicio' => 'required',
            'reporte' => 'required',
            'imbolucrado',
            'empresa'
        ]);
    
        $report = new Report();
        $report->fill($request->only(['fechareporte', 'redservicio', 'huvservicio', 'reporte','imbolucrado','empresa']));
        $report->user_id = Auth::id(); 
        $report->save();
    
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'El caso se creo correctamente',
        ]);
    
        return redirect()->route('reportar');
    }
    

   /*  public function show(report $reporte)
    {
        $reporte = report::all()->where('estas','=',1);
        return view('report.show',compact('reporte'));
    } */


    public function edit(report $reporte)
    {
         /* $report = report::findOrFail($report); */
         $regentes = User::where('perfil','=','regente')
         ->orwhere('perfil','=','quimico')->get();
        return view('report.edit',compact('reporte','regentes'));
    }

    public function update(Request $request, report $reporte)
{
    // Buscar el usuario que corresponde a regente_id
    $regente = User::find($request->regente_id);

    // Verificar si se encontró el regente
    if ($regente) {
        // Actualizar los campos del reporte
        $reporte->regente_id = $request->regente_id;
        $reporte->tipo_accion = $request->tipo_accion;
        $reporte->grupo_bodega = $regente->bodega; // Asignar la bodega del regente
        $reporte->estado = $request->estado;
        $reporte->save();

        // Mensaje de éxito
        session()->flash('swal',[
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'El reporte fue actualizado',
        ]);

        return redirect()->route('reporte.index');
    } else {
        // Mensaje de error si no se encuentra el regente
        session()->flash('swal',[
            'icon' => 'error',
            'title' => 'Error',
            'text' => 'El regente no fue encontrado',
        ]);

        return redirect()->back();
    }
}

    public function estado(Request $request, report $reporte){

        $reporte->update($request->all());

        session()->flash('swal',[
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'El reporte fue actualizado',
        ]);
        return redirect()->route('reporte.index');
    }

}
