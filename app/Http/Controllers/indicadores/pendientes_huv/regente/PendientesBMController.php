<?php

namespace App\Http\Controllers\indicadores\pendientes_huv\regente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendientesBMController extends Controller
{
    public function index(Request $request)
{
    // Obtener el rango de fechas de los parámetros de la solicitud
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');
    
    // Consultar los registros filtrados por fechas
    $data = DB::table('pendientes')
        ->select('bodega', DB::raw('SUM(porcentaje) as total'))
        ->when($startDate, function ($query) use ($startDate) {
            return $query->whereDate('created_at', '>=', $startDate);
        })
        ->when($endDate, function ($query) use ($endDate) {
            return $query->whereDate('created_at', '<=', $endDate);
        })
        ->groupBy('bodega')
        ->get();
    
    // Verificar que $data no esté vacío
    // return $data;
    
    // Convertir los datos para pasarlos a la vista
    $labels = $data->pluck('bodega');
    $values = $data->pluck('total');
    
    return view('graficos.quimico.pendientes.index', [
        'labels' => $labels,
        'values' => $values,
        'startDate' => $startDate,
        'endDate' => $endDate
    ]);
}

}
