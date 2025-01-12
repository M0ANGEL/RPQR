<?php

namespace App\Http\Controllers\Nomina;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsistenciasController extends Controller
{
    public function index()
    {
        return view('Nomina.index');
    }
}
