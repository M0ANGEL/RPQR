<?php

namespace App\Http\Controllers\VistaMedica;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VistaController extends Controller
{
    public function index(Request $request)
{
    $busqueda = $request->get('text', '');

    /* busqueda de registros filtrada */
    $datos = DB::table('vista')
        ->select('vistamedica', 'nombrevistamedica', 'unidadmedica', 'codigosebthi', 'medicamento')
        ->where('medicamento', 'like', '%' . $busqueda . '%')
        ->orWhere('codigosebthi', 'like', '%' . $busqueda . '%')
        ->paginate(15);

    if ($request->ajax()) {
        return view('admin.vistamedica.tabla', compact('datos'))->render();
    }

    return view('admin.vistamedica.index', compact('datos', 'busqueda'));
}

}
