<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CambioController extends Controller
{
    public function index()
    {
        $cambio  = Auth::user();
        return view('admin.users.cambio.index',compact('cambio'));
    }

    public function edit(User $cambio)
    {
        return view('admin.users.cambio.edit',compact('cambio'));
    }

    public function update(Request $request, User $cambio)
    {
        $request->validate([
            'password'=>'required'
            
        ]);

        $cambio->update($request->all());

        session()->flash('swal',[
            'icon'=>'success',
            'title'=>'Bien hecho',
            'text'=>'Se realizo el cambio ',
        ]); 
        return redirect()->route('cambio.index');
    }
}
