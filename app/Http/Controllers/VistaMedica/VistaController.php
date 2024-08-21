<?php

namespace App\Http\Controllers\VistaMedica;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VistaController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->get('text','');
        
        /* busqueda de registros filtrada */

        $datos = DB::table('vistas')
        ->select('vistamedica','nombrevistamedica','unidadmedica','codigosebthi','medicamento')
        ->where('medicamento','like','%'.$busqueda.'%')
        ->orwhere('codigosebthi','like','%'.$busqueda.'%')
        ->paginate(3);

        return view('admin.vistamedica.index', compact('datos','busqueda'));
    }
}
