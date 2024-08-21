<?php

namespace App\Http\Controllers\indicadores\hallazgo;

use App\Http\Controllers\Controller;
use App\Models\indicadores\Hallazgo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bodega = Auth::user()->bodega;
        $datos = Hallazgo::where('bodega',$bodega)->
        paginate(15);
        return view('indicadores.hallazgo.regentes.index',compact('datos'));
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
    public function show(Hallazgo $hallazgo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hallazgo $hallazgo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hallazgo $hallazgo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hallazgo $hallazgo)
    {
        //
    }
}
