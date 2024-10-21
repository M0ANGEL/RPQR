<?php

namespace App\Http\Controllers\AUDITORIA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReporteServinte;
use App\Models\ReporteSebthi;
use App\Models\ReporteHistorico;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ServinteImport;  // Asegúrate de crear esta clase
use App\Imports\SebthiImport;    // Asegúrate de crear esta clase
use Illuminate\Support\Facades\DB;

class ArchivosController extends Controller
{
    public function index()
    {
        return view('AUDITORIA.index');  // La vista principal
    }

    public function subirReportes(Request $request)
    {
        // Validar los archivos
        $request->validate([
            'servinte' => 'required|file|mimes:xls,xlsx',
            'sebthi' => 'required|file|mimes:xls,xlsx',
        ]);

        // Procesar y guardar los datos del archivo de Servinte
        if ($request->hasFile('servinte')) {
            $servinteFile = $request->file('servinte');
            Excel::import(new ServinteImport, $servinteFile); // Lógica de ServinteImport
        }

        // Procesar y guardar los datos del archivo de Sebthi
        if ($request->hasFile('sebthi')) {
            $sebthiFile = $request->file('sebthi');
            Excel::import(new SebthiImport, $sebthiFile); // Lógica de SebthiImport
        }

        // Guardar un registro histórico de los reportes subidos
        ReporteHistorico::create([
            'nombre_servinte' => $request->file('servinte')->getClientOriginalName(),
            'nombre_sebthi' => $request->file('sebthi')->getClientOriginalName(),
            'fecha_subida' => now(),
        ]);

        return redirect()->back()->with('success', 'Archivos subidos y procesados correctamente.');
    }

    public function borrarDatos()
    {
        // Eliminar datos de las tablas actuales (limpiar para cargar nuevos reportes)
        DB::table('reporteservinte')->truncate();
        DB::table('reportesebthi')->truncate();

        return redirect()->back()->with('success', 'Datos borrados correctamente.');
    }
}
