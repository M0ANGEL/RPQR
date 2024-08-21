<?php

namespace App\Http\Controllers\indicadores\hallazgo\regente;

use App\Http\Controllers\Controller;
use App\Models\indicadores\Hallazgo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BodegasMesController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el rango de fechas de los parámetros de la solicitud
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        // Consultar los registros filtrados por fechas
        $data = DB::table('hallazgos')
            ->select('bodega', DB::raw('SUM(hallazgo) as total'))
            ->when($startDate, function ($query) use ($startDate) {
                return $query->whereDate('created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query) use ($endDate) {
                return $query->whereDate('created_at', '<=', $endDate);
            })
            ->groupBy('bodega')
            ->get();
    
        // Convertir los datos para pasarlos a la vista
        $labels = $data->pluck('bodega');
        $values = $data->pluck('total');
    
        return view('graficos.quimico.index', [
            'labels' => $labels,
            'values' => $values,
            'startDate' => $startDate,
            'endDate' => $endDate
        ]);
    }
    
}
