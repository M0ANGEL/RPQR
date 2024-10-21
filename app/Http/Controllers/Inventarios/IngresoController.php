<?php

namespace App\Http\Controllers\Inventarios;

use App\Http\Controllers\Controller;
use App\Models\admin\bodega;
use App\Models\Inventarios\Registros;
use Illuminate\Http\Request;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Inventarios.equipos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'modelo'=>'required',
            'marca'=>'required',
            'activo'=>'nullable',
            'proveedor',           
            'ram','disco','espacio_disco'           
        ]);

        Registros::create([
            'modelo'=>$request->modelo,
            'marca'=>$request->marca,
            'activo'=>$request->activo,
            'proveedor'=>$request->proveedor,
            'ram'=>$request->ram,
            'disco'=>$request->disco,
            'espacio_disco'=>$request->espacio_disco,            
        ]);

        session()->flash('swal',[
            'icon'=>'success',
            'title'=>'Bien hecho',
            'text'=>'Se registro el equipo se creo corretamente',
        ]); 
        return redirect()->route('Inventarios_Registros.create'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Registros $registros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registros $registros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registros $registros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registros $registros)
    {
        //
    }
}
