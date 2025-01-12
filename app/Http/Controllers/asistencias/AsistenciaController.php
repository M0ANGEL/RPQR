<?php

namespace App\Http\Controllers\asistencias;


use App\Http\Controllers\Controller;
use App\Models\asistencias\Asistencias;
use App\Models\asistencias\listado_persona;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.asistencias.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.asistencias.create');
    }

    public function store(Request $request)
    {
        // Validar que la cédula fue enviada
        $request->validate([
            'cedula' => 'required|string|max:20',
        ]);

        // Buscar la cédula en la tabla lista_personas
        $persona = listado_persona::where('cedula', $request->cedula)->first();

        if ($persona) {
            // Si se encuentra la persona, guardar la asistencia
            Asistencias::create([
                'personal_id' => $persona->id,
                'cedula' => $request->cedula,
            ]);

            session()->flash('swal', [
                'icon' => 'success',
                'title' => 'Bien hecho',
                'text' => 'La asistencia se registro correctamente',
            ]);
            return redirect()->route('asistencia.create');
        } else {
            // Si no se encuentra, redirigir a otra vista
            return redirect()->route('registroPersonal.create')->with('swal', [
                'icon' => 'error',
                'title' => 'Error',
                'text' => 'Cédula no encontrada, favor registrar usuario.'
            ]);
        }
    }

    public function RegistroCreate()
    {
        return view('admin.asistencias.registros.create');
    }

    public function RegistroStore(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'cedula' => 'required|numeric|unique:lista_personas,cedula', // Ahora el nombre es el correcto
            'telefono' => 'required|numeric',
            'perfil' => 'required|string|max:255'
        ]);

        listado_persona::create($validatedData);

        return redirect()->route('asistencia.create')->with('swal', [
            'icon' => 'succes',
            'title' => 'Super!!',
            'text' => 'Usuario Creado, ahora registra la asistencias.'
        ]);
    }

    /* descargar reporte de asostecias */
    public function descarga(Request $request)
    {
        // Validar que las fechas de inicio y fin estén presentes
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Obtener las fechas del formulario
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Filtrar registros y cargar relaciones según el rango de fechas
        $historiales = Asistencias::with('lista_persona')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        // Configurar datos para el archivo Excel
        $excelData = $historiales->map(function ($historial) {
            return [
                'ID' => $historial->id,
                'fecha asistencias' => $historial->created_at,
                'nombre' => optional($historial->lista_persona)->nombre,
                'cedula' => optional($historial->lista_persona)->cedula,
                'telefono' => optional($historial->lista_persona)->telefono,
                'perfil' => optional($historial->lista_persona)->perfil,
            ];
        })->toArray();


        // Generación y descarga del archivo Excel con encabezados
        return Excel::download(new class($excelData) implements \Maatwebsite\Excel\Concerns\FromArray, \Maatwebsite\Excel\Concerns\WithHeadings {
            protected $data;

            public function __construct(array $data)
            {
                $this->data = $data;
            }

            public function array(): array
            {
                return $this->data;
            }

            public function headings(): array
            {
                return [
                    'ID',
                    'fecha asistencias',
                    'nombre',
                    'cedula',
                    'telefono',
                    'perfil',
                ];
            }
        }, 'reporte_detallado.xlsx');
    }
}
