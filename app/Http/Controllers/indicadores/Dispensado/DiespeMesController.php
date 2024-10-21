<?php

namespace App\Http\Controllers\indicadores\Dispensado;

use App\Http\Controllers\Controller;
use App\Models\indicadores\Dispensado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DiespeMesController extends Controller
{
    public function index()
    {
        $bodega = Auth::user()->bodega;
        $datos = Dispensado::where('bodega',$bodega)
        ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('SUM(porcentaje) as porcentaje'),DB::raw('SUM(numerador) as hallazgo'),DB::raw('SUM(denominador) as digitado'))
        ->groupBy('month')
        ->orderBy('month')
        ->get();
        return view('indicadores.errorDisp.regentes.mes',compact('datos'));
    }
}
