<?php

namespace App\Http\Controllers\reporte;

use App\Http\Controllers\Controller;
use App\Models\admin\report;
use Illuminate\Http\Request;

class CerradoController extends Controller
{
    public function index()
    {
        $reports = report::where('estado','=',1)->paginate(15);
        return view('report.show',compact('reports'));
    }

}
