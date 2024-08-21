<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\indicadores\Hallazgo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GraficaMesController extends Controller
{
    public function index(){
        $bodega = Auth::user()->bodega;
        
        $hallazgos = Hallazgo::where('bodega',$bodega)
        ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('SUM(porcentaje) as total'))
        ->groupBy('month')
        ->orderBy('month')
        ->get();
        /*return $hallazgos;*/
        return view('graficos.hallazgo.mes',compact('hallazgos'));
    }
}
