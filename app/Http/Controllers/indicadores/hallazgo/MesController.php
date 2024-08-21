<?php

namespace App\Http\Controllers\indicadores\hallazgo;

use App\Http\Controllers\Controller;
use App\Models\indicadores\Hallazgo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MesController extends Controller
{
    public function index()
    {
        $bodega = Auth::user()->bodega;
        $datos = Hallazgo::where('bodega',$bodega)
        ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('SUM(porcentaje) as porcentaje'),DB::raw('SUM(hallazgo) as hallazgo'),DB::raw('SUM(digitado) as digitado'))
        ->groupBy('month')
        ->orderBy('month')
        ->get();
        return view('indicadores.hallazgo.regentes.mes',compact('datos'));
    }
}
