<?php

namespace App\Http\Controllers\Api\Dispensado;

use App\Http\Controllers\Controller;
use App\Models\indicadores\Dispensado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GraficaMessController extends Controller
{
    public function index(){
        $bodega = Auth::user()->bodega;
        
        $hallazgos = Dispensado::where('bodega',$bodega)
        ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('SUM(porcentaje) as total'))
        ->groupBy('month')
        ->orderBy('month')
        ->get();
        /*return $hallazgos;*/
        return view('graficos.errorDisp.mes',compact('hallazgos'));
    }
}
