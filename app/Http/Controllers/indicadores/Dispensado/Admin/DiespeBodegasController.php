<?php

namespace App\Http\Controllers\indicadores\Dispensado\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiespeBodegasController extends Controller
{
    public function index(Request $request)
{
    // Obtener las fechas de inicio y fin desde el request
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Consultar los datos filtrados por fechas
    $query = DB::table('dispensados')
        ->select('bodega', DB::raw('SUM(numerador) as total'))
        ->groupBy('bodega');

    // Aplicar filtros de fecha si se proporcionan
    if ($startDate) {
        $query->whereDate('created_at', '>=', $startDate);
    }
    if ($endDate) {
        $query->whereDate('created_at', '<=', $endDate);
    }

    // Obtener los datos
    $data = $query->get();

    // Convertir los datos para pasarlos a la vista
    $labels = $data->pluck('bodega');
    $values = $data->pluck('total');

    return view('graficos.quimico.dispensado.index', [
        'labels' => $labels,
        'values' => $values
    ]);
}

}
