<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\bodega;
use App\Models\huv\huv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HuvController extends Controller
{
    public function index(Request $request)
    {
        $usuarios = huv::where('user_id', '=', Auth::user()->id)
            ->orderBy('id', 'desc')->paginate(15);
        return view('admin.usuarioshuv.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $bodegas = bodega::all();
        return view('admin.usuarioshuv.create', compact('bodegas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'cedula' => 'required',
            'telefono',
            'cargo',
            'bodega' => 'required',
            'usuario_clonar_huv' => 'required',
            'usuario_clonar_sebthi' => 'required',
            'cedula_clonar' => 'required',
            'name_referencia' => 'required'


        ]);


        $servinte_no = ($request->cargo === 'Patinador') ? 1 : 0;

        $huv = huv::create([
            'name' => $request->name,
            'cedula' => $request->cedula,
            'telefono' => $request->telefono,
            'cargo' => $request->cargo,
            'bodega' => $request->bodega,
            'name_referencia' => $request->name_referencia,
            'usuario_clonar_huv' => $request->usuario_clonar_huv,
            'cedula_clonar' => $request->cedula_clonar,
            'usuario_clonar_sebthi' => $request->usuario_clonar_sebthi,
            'servinte_no' => $servinte_no,
            'user_id' => Auth::id(),
        ]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'La solicitud se creo corretamente',
        ]);
        return redirect()->route('huv.index', $huv);
    }

    /**
     * Display the specified resource.
     */
    public function show(huv $huv)
    {
        return view('admin.usuarioshuv.show', compact('huv'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(huv $huv)
    {
        return view('admin.usuarioshuv.edit', compact('huv'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, huv $huv)
    {

        $huv->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'El usuario se actualizo corretamente',
        ]);
        return redirect()->route('huv.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(huv $huv)
    {
        //
    }
}
