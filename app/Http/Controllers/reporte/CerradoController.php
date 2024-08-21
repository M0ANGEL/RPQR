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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(report $reporte)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(report $report)
    {
        //
    }
}
