<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\indicadores\Hallazgo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GraficaController extends Controller
{
    
    public function index()
    {
        $bodega = Auth::user()->bodega;
        
        $hallazgos = Hallazgo::where('bodega',$bodega)
        ->select(DB::raw('DATE(created_at) as date'), DB::raw('SUM(porcentaje) as total'))
        ->groupBy('date')
        ->orderBy('date')
        ->get();
        /*return $hallazgos;*/
        return view('graficos.hallazgo.index',compact('hallazgos'));
    }

}
