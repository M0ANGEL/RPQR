<?php

namespace App\Http\Controllers\indicadores\mensuales;

use App\Http\Controllers\Controller;
use App\Models\indicadores\ConfiabilidadInventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ConfiabilidadInventarioController extends Controller
{
    public function index()
    {
        $bodega = Auth::user()->bodega;
        $datos = ConfiabilidadInventario::where('bodega', $bodega)
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('SUM(porcentaje) as porcentaje'), DB::raw('SUM(numerador) as hallazgo'), DB::raw('SUM(denominador) as digitado'))
            ->groupBy('month')
            ->orderBy('month')
            ->paginate();
        return view('indicadores.mensuales.confiabilidad_inventario.regentes.index', compact('datos'));
    }

    public function create()
    {
        $usuario = Auth::user();
        return view('indicadores.mensuales.confiabilidad_inventario.regentes.create', compact('usuario'));
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $validated = $request->validate([
            'denominador' => 'required|numeric|min:0', // Asegura que sea un número y no negativo
            'numerador' => 'required|numeric|min:0', // Asegura que sea un número y no negativo
            'bodega' => 'required|string|max:255', // Asegura que sea una cadena con longitud máxima de 255 caracteres
            'analisis' => 'required'
        ]);

        // Recuperar datos validados del formulario
        $denominador = $validated['denominador'];
        $numerador = $validated['numerador'];
        $formbodega = $validated['bodega'];
        $analisis = $validated['analisis'];

        // Verificar que $hallazgo no sea cero para evitar división por cero
        if ($numerador != 0) {
            // Calcular el porcentaje
            $porcentaje =  $denominador - $numerador;
        } else {
            return redirect()->back()->withErrors(['hallazgo' => 'El valor de hallazgo no puede ser cero.']);
        }

        // Crear el nuevo registro en la base de datos
        ConfiabilidadInventario::create([
            'denominador' => $denominador,
            'numerador' => $numerador,
            'porcentaje' => $porcentaje,
            'bodega' => $formbodega,
            'analisis' => $analisis
        ]);

        // Establecer un mensaje de éxito en la sesión
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'El registro se creó correctamente',
        ]);

        // Redirigir a la ruta de creación de indicadores

        return redirect()->route('Confiabilidad-Inventario.index');
    }

    public function show(string $id)
    {
        //
    }
}
