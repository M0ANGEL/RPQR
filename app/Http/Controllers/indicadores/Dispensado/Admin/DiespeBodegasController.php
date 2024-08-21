<?php

namespace App\Http\Controllers\indicadores\Dispensado\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiespeBodegasController extends Controller
{
    public function index(){
        // Obtener los datos agrupados por bodega y sumar los valores de hallazgo
    $data = DB::table('dispensados')
    ->select('bodega', DB::raw('SUM(hallazgo) as total'))
    ->groupBy('bodega')
    ->get();

    // Convertir los datos para pasarlos a la vista
    $labels = $data->pluck('bodega');
    $values = $data->pluck('total');

    return view('graficos.quimico.dispensado.index', [
        'labels' => $labels,
        'values' => $values
    ]);

}
}
