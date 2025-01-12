<?php

namespace App\Http\Controllers;

use App\Models\Impresora;
use Illuminate\Http\Request;
use App\Services\WhatsAppService; // Asegúrate de importar el servicio de WhatsApp

class ImpresoraController extends Controller
{
    protected $whatsAppService;

    public function __construct(WhatsAppService $whatsAppService)
    {
        $this->whatsAppService = $whatsAppService;
    }

    public function index()
    {
        $datos = Impresora::select('*')->where('estado', '!=', 3)->paginate(8);
        return view('impresoras.farmart.index', compact('datos'));
    }

    public function create()
    {
        return view('impresoras.farmart.create');
    }

    public function store(Request $request)
    {
        // Validar los datos entrantes
        $request->validate([
            'letra' => 'required|string',
            'modelo' => 'required|string|max:255',
            'serial' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
            'piso' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'problema' => 'required|string|max:255',
            'codigo' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'estado' => 'required|string',
        ]);

        // Crear un nuevo reporte
        $reporte = Impresora::create($request->all());

        // Enviar mensaje de WhatsApp después de crear el reporte
        $mensaje = "Se ha creado un nuevo reporte de impresora con los siguientes detalles:\n" .
            "Modelo: {$reporte->modelo}\n" .
            "Serial: {$reporte->serial}\n" .
            "Problema: {$reporte->problema}";

        $this->whatsAppService->sendMessage('+573117238520', $mensaje); // Reemplaza con el número de WhatsApp correcto

        // Mensaje de éxito en la sesión
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'El reporte se creó correctamente y se envió el mensaje de WhatsApp.',
        ]);

        // Redirigir a la vista de reportes
        return redirect()->route('ReporteImpresora.index');
    }
}
