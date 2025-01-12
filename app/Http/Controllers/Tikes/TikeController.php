<?php

namespace App\Http\Controllers\Tikes;

use App\Http\Controllers\Controller;
use App\Models\Tikes\Categorias;
use App\Models\Tikes\Subcategorias;
use App\Models\Tikes\Tike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TikeController extends Controller
{
    public function index()
    {
        $tikes = Tike::select('*')->where('bodega', '=', Auth::user()->bodega)->where('estado', '!=', 3)->orderBy('id', 'desc')->paginate('10');
        return view('ModuloTikes.Cliente.index', compact('tikes'));
    }

    public function create()
    {
        $categorias = Categorias::where('estado', '=', 1)->get();
        $usuario = Auth::user()->name;
        return view('ModuloTikes.Cliente.create', compact('categorias', 'usuario'));
    }

    //  para obtener subcategorías basadas en una categoría específica
    public function getSubcategorias(Request $request)
    {
        $subcategorias = Subcategorias::where('estado', 1)->where('_tikes_categorias_id', $request->categoria_id)->get();
        return response()->json($subcategorias);
    }

    //preocesado de lo gica de creacion
    public function store(Request $request)
    {
        // Validamos los datos enviados desde el frontend
        $request->validate([
            'categoria' => 'required',
            'subcategoria' => 'required',
            'detalle' => 'required',
            'sede' => 'required',
        ]);
        // Recuperamos el nombre del usuario logueado
        $usuarioLoguado = Auth::user();

        // Recupero la categoría y su prefijo
        $Categoria = Categorias::select('*')->where('id', $request->categoria)->first();
        //Recupero la subcategoria para poder usar el estado en la creacion del tike
        $prioridad = Subcategorias::select('*')->where('id', $request->subcategoria)->first();

        //Recupero la subcategoria para poder usar el estado en la creacion del tike
        $subcategoria = Subcategorias::select('*')->where('id', $request->subcategoria)->first();

        $categoriaName = $Categoria->name;
        $categoriaPrefijo = $Categoria->prefijo;

        // Buscar el último número del tike con ese prefijo
        $ultimoTike = Tike::where('numero_tike', 'like', "{$categoriaPrefijo}-%")
            ->orderBy('id', 'desc')
            ->first();

        // Calculo el siguiente número
        if ($ultimoTike) {
            //  el número después del prefijo
            $ultimoNumero = (int) str_replace("{$categoriaPrefijo}-", '', $ultimoTike->numero_tike);
            $siguienteNumero = $ultimoNumero + 1;
        } else {
            // Si no hay registros previos, iniciamos desde 1
            $siguienteNumero = 1;
        }

        // Generaro el número del tike final
        $numeroTikeFinal = "{$categoriaPrefijo}-" . str_pad($siguienteNumero, STR_PAD_LEFT);

        // Creo el tike en la base de datos
        $tike = Tike::create([
            'categoria' => $categoriaName,
            'subcategoria' => $subcategoria->name,
            'detalle' => $request->detalle,
            'sede' => $request->sede,
            'usuario_reporta' => $usuarioLoguado->name,
            'numero_tike' => $numeroTikeFinal,
            'bodega' => $usuarioLoguado->bodega,
            'prioridad' => $prioridad->prioridad,
            'area' => $subcategoria->area,
            'autorizacion' => $subcategoria->autorizacion,
        ]);

        // muestro mensaje de éxito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => "El ticket se creó correctamente.",
        ]);

        // Redirigir a la vista de reportes
        return redirect()->route('Tikes.index');
    }

    public function show(Tike $Tike)
    {
        return view('ModuloTikes.Cliente.TikesCerrados.show', compact('Tike'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tike $Tike)
    {
        return view('ModuloTikes.Cliente.edit', compact('Tike'));
    }

    public function update(Request $request, Tike $Tike)
    {
        //actualizamos el valor
        $Tike->update($request->all());

        // Mostrar mensaje de éxito
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => "El ticket se finalizo",
        ]);

        // Redirigir a la vista de reportes
        return redirect()->route('Tikes.index');
    }

    public function tikesCerrados()
    {
        $tikes = Tike::where('bodega', '=', Auth::user()->bodega)->where('estado', '=', 3)->paginate(20);
        return view('ModuloTikes.Cliente.TikesCerrados.index', compact('tikes'));
    }
}
