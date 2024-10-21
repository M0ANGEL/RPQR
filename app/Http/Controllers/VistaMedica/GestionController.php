<?php

namespace App\Http\Controllers\VistaMedica;

use App\Http\Controllers\Controller;
use App\Models\admin\gestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GestionController extends Controller
{
    public function index()
    {
        $reports = gestion::orderBy('id','desc')->select('*')
        ->where('grupo','=',Auth::user()->bodega)->paginate(10);
        return view('admin.pb.index',compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pb.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'cedula'=>'required',
            'pb'=>'nullable',
            'bodega_nueva',
            'usuario_clonar_sebthi',
            'usuario_clonar_servinte',            
            'reporte', 
            'cedula_usuario_referencia',
            'usuario_sebthi',
            'usuario_servinte',
            'grupo',           
        ]);

        gestion::create([
            'name'=>$request->name,
            'cedula'=>$request->cedula,
            'pb'=>$request->pb,
            'reporte'=>$request->reporte,
            'bodega_nueva'=>$request->bodega_nueva,
            'grupo'=>Auth::user()->bodega,
            'usuario_clonar_sebthi'=>$request->usuario_clonar_sebthi,
            'usuario_clonar_servinte'=>$request->usuario_clonar_servinte,
            'cedula_usuario_referencia'=>$request->cedula_usuario_referencia,
            'usuario_sebthi'=>$request->usuario_sebthi,
            'usuario_servinte'=>$request->usuario_servinte,
            'user_id'=> Auth::id(),
            
        ]);

        session()->flash('swal',[
            'icon'=>'success',
            'title'=>'Bien hecho',
            'text'=>'La solicitud se creo corretamente',
        ]); 
        return redirect()->route('gestion.index'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(gestion $gestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(gestion $gestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, gestion $gestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(gestion $gestion)
    {
        //
    }
}
