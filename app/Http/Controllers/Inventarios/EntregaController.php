<?php

namespace App\Http\Controllers\Inventarios;

use App\Http\Controllers\Controller;
use App\Models\admin\bodega;
use App\Models\Inventarios\Inventario;
use App\Models\Inventarios\Registros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntregaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $busqueda = $request->get('text', ''); // Proporciona un valor por defecto si 'text' no está presente

        // Ejecuta la consulta para obtener los datos
        $datos = Registros::where('estado',0)->select('id', 'activo')
            ->where('activo', 'like', '%' . $busqueda . '%')
            ->get(); // Asegúrate de ejecutar la consulta

        return view('Inventarios.entrega.create',compact('datos', 'busqueda'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'bodega' => 'required',
            'piso' => 'required',
            'fecha_entrega' => 'required',
            'pareja','mouse','teclado',
            'equiposPC_id'
        ]);
    
        // Crear el nuevo registro en la tabla Registro
        $registro = Inventario::create([
            'bodega' => $request->bodega,
            'piso' => $request->piso,
            'fecha_entrega' => $request->fecha_entrega,
            'pareja' => $request->pareja,
            'mouse' => $request->mouse,
            'teclado' => $request->teclado,
            'equiposPC_id' => $request->equiposPC_id,
        ]);
    
        // Obtener el modelo Campo2 relacionado
        $campo2 = Registros::find($request->equiposPC_id);

       /*  return $campo2; */
    
        // Verificar si el estado está en falso y actualizarlo a verdadero
        if ($campo2 && $campo2->estado === 0) {
            $campo2->estado = 1;
            $campo2->save();
        }
    
        // Mostrar un mensaje de éxito en la sesión
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'La entrega se creó correctamente',
        ]);
    
        // Redirigir a la ruta especificada
        return redirect()->route('Inventarios_Entrega.create'); 
    }

   
    
    public function show(Inventario $inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventario $inventario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventario $inventario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventario $inventario)
    {
        //
    }
}
