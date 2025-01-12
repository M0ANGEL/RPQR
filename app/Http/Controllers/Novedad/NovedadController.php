<?php

namespace App\Http\Controllers\Novedad;

use App\Http\Controllers\Controller;
use App\Models\Novedades\Archivos;
use App\Models\Novedades\Novedades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function Pest\Laravel\json;

class NovedadController extends Controller
{
    public function index(Request $request)
    {
        // Obtiene el texto de búsqueda desde la solicitud
        $busqueda = $request->get('text', '');

        // Realiza la consulta para filtrar las entregas y buscar pacientes por nombre, documento y prescripción
        $novedades = Novedades::select('*')->where('bodegaPadre', '=', Auth::user()->bodega)->orderBy('id', 'desc')->paginate(10);

        return view('Novedades.index', compact('novedades', 'busqueda'));
    }


    public function supervisor(Request $request)
    {
        // Obtiene el texto de búsqueda desde la solicitud
        $busqueda = $request->get('text', '');

        // Realiza la consulta para filtrar las entregas y buscar pacientes por nombre, documento y prescripción
        $novedades = Novedades::orderBy('id', 'desc')->paginate(10);

        return view('Novedades.administar_novedades.index', compact('novedades', 'busqueda'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Novedades.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'tipo_novedad' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date',
            'cargo' => 'required',
            'bodega' => 'required',
            'nombre_completo' => 'required|string',
            'numero_cedula' => 'required|numeric',
            'numero_telefono' => 'required|numeric',
            'detalle' => 'nullable|string',
            'archivos.*' => 'file|mimes:pdf,jpg,png,jpeg|max:10240', // Máximo 10MB por archivo
        ]);

        $bodegaPadre = Auth::user()->bodega;

        // Crear novedad
        $novedad = Novedades::create([
            'tipo_novedad' => $request->tipo_novedad,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_final' => $request->fecha_final,
            'cargo' => $request->cargo,
            'bodega' => $request->bodega,
            'nombre_completo' => $request->nombre_completo,
            'numero_cedula' => $request->numero_cedula,
            'numero_telefono' => $request->numero_telefono,
            'detalle' => $request->detalle,
            'bodegaPadre' => $bodegaPadre,
        ]);

        // Subir y asociar archivos
        if ($request->hasFile('archivos')) {
            foreach ($request->file('archivos') as $archivo) {
                $path = $archivo->store('novedades'); // Almacena en "storage/app/novedades"
                Archivos::create([
                    'novedad_id' => $novedad->id,
                    'archivo' => $path,
                ]);
            }
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'Novedad creada y archivos subidos correctamente',
        ]);

        return redirect()->route('novedades.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Novedades $novedade)
    {
        return view('Novedades.show', compact('novedade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function descargar($id)
    {
        // Buscar los archivos asociados con la novedad, puedes usar get() si hay varios archivos
        $archivos = Archivos::where('novedad_id', $id)->get();

        if ($archivos->isEmpty()) {
            // Si no se encuentran archivos, puedes retornar un error o una respuesta adecuada
            return response()->json(['message' => 'No se encontraron archivos para esta novedad.'], 404);
        }

        // Suponiendo que quieres descargar el primer archivo (si hay varios, puedes personalizar esto)
        $archivo = $archivos->first();

        // Verificar si el archivo existe en el almacenamiento
        if (Storage::exists($archivo->archivo)) {
            return Storage::download($archivo->archivo);
        } else {
            return response()->json(['message' => 'El archivo no existe.'], 404);
        }
    }
}
