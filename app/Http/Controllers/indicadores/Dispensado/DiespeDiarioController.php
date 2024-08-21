<?php

namespace App\Http\Controllers\indicadores\Dispensado;

use App\Http\Controllers\Controller;
use App\Models\indicadores\Dispensado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiespeDiarioController extends Controller
{
    public function index()
    {
        $bodega = Auth::user()->bodega;
        $datos = Dispensado::where('bodega',$bodega)->
        paginate(15);
        return view('indicadores.errorDisp.regentes.index',compact('datos'));
    }

}
