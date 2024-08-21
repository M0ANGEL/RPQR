<?php

namespace App\Http\Controllers\Api\Dispensado;

use App\Http\Controllers\Controller;
use App\Models\indicadores\Dispensado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GraficaDiarioController extends Controller
{
    public function index()
    {
        $bodega = Auth::user()->bodega;
        
        $hallazgos = Dispensado::where('bodega',$bodega)
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(porcentaje) as total'))
        ->groupBy('date')
        ->orderBy('date')
        ->get();
        /*return $hallazgos;*/
        return view('graficos.errorDisp.index',compact('hallazgos'));
    }
}
