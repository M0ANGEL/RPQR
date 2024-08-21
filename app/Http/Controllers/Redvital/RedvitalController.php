<?php

namespace App\Http\Controllers\Redvital;

use App\Http\Controllers\Controller;
use App\Models\huv\huv;
use Illuminate\Http\Request;

class RedvitalController extends Controller
{
    public function index()
    {
        /* filtro por dos campos a la tabla usuarios huv */
        $redvitals = huv::select('*')->where('confirmado','=',true)
                                    ->where('activo_sebthi','=',false)
                                    ->paginate();
        return view('admin.redvital.index',compact('redvitals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(huv $solicitud)
    {
        return view('admin.redvital.edit',compact('redvitals'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(huv $redvital)
    {
        return view('admin.redvital.edit',compact('redvital'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, huv $redvital)
    {
        $request->validate([
            'activo_sebthi'=>'required|boolean'
            
        ]);

        $redvital->update($request->all());

        session()->flash('swal',[
            'icon'=>'success',
            'title'=>'Bien hecho',
            'text'=>'El usuario se confirmo corretamente',
        ]); 
        return redirect()->route('redvital.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(huv $huv)
    {
        //
    }
}
