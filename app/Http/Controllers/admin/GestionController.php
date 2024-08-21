<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\gestion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GestionControllerr extends Controller
{
    public function index()
    {
        $reports = gestion::orderBy('id','desc')->select('*')
        ->where('user_id','=',Auth::user()->id)->paginate(10);
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
            'usuario_clonar',            
            'reporte',            
        ]);

        gestion::create([
            'name'=>$request->name,
            'cedula'=>$request->cedula,
            'pb'=>$request->pb,
            'reporte'=>$request->reporte,
            'bodega_nueva'=>$request->bodega_nueva,
            'usuario_clonar'=>$request->usuario_clonar,
            'user_id'=> auth()->id,
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
