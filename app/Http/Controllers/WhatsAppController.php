<?php

namespace App\Http\Controllers;

use App\Services\WhatsAppService;
use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    protected $whatsAppService;

    public function __construct(WhatsAppService $whatsAppService)
    {
        $this->whatsAppService = $whatsAppService;
    }

    public function sendMessage(Request $request)
    {
        $to = $request->input('phone_number');
        $message = $request->input('message');

        $result = $this->whatsAppService->sendMessage($to, $message);

        if ($result) {
            return response()->json(['success' => true, 'message' => 'Mensaje enviado correctamente.']);
        }

        return response()->json(['success' => false, 'message' => 'Hubo un error al enviar el mensaje.']);
    }
}
