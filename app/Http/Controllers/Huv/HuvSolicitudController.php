<?php

namespace App\Http\Controllers\Huv;

use App\Http\Controllers\Controller;
use App\Models\huv\huv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\TemplateProcessor;

class HuvSolicitudController extends Controller
{
    public function index()
    {
        /* filtro por dos campos a la tabla usuarios huv */
        $usuarios = huv::select('*')->where('confirmado', true)
            ->where('activo_servinte', false)
            ->where('servinte_no', 0)
            ->where('cargo', '!=', 'Patinador')
            ->paginate();
        return view('admin.huvsolicitud.index', compact('usuarios'));
    }

    public function edit(huv $solicitud)
    {

        return view('admin.huvsolicitud.edit', compact('solicitud'));
    }

    public function update(Request $request, huv $solicitud)
    {
        $request->validate([
            'activo_servinte' => 'required|boolean'

        ]);

        $solicitud->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Bien hecho',
            'text' => 'El usuario se confirmo corretamente',
        ]);
        return redirect()->route('solicitud.index');
    }

    public function reporte(Request $request)
    {
        $busqueda = $request->get('text', '');

        $usuarios = DB::table('huvs')
            ->select(
                'id',
                'name',
                'cedula',
                'area',
                'telefono',
                'correo_redv',
                'cargo',
                'bodega',
                'usuario_clonar_huv',
                'cedula_clonar',
                'login_servinte',
                'password_servinte',
                'name_referencia'
            )
            ->where('name', 'like', '%' . $busqueda . '%')
            ->where('confirmado', '=', true)
            ->where('activo_servinte', '=', true)
            ->orderByDesc('id') // Ordena por id en orden descendente para mostrar el último primero
            ->paginate();

        return view('admin.huvsolicitud.reportes_pdfs.index', compact('usuarios', 'busqueda'));
    }



    /* public function reportePdf2(Request $request, huv $huv){
        
        return $huv;
        $templateProcessor = new TemplateProcessor(storage_path('templates/base_pdf.docx'));
        // Obtener datos de la base de datos
        $data = $huv; // Ya que se está inyectando el modelo `huv`, no es necesario usar `find` nuevamente.    
        // Reemplazar etiquetas con datos de la base de datos
        $templateProcessor->setValue('name', $data->name);
        $templateProcessor->setValue('cedula', $data->cedula);
        $templateProcessor->setValue('area', $data->area);
        $templateProcessor->setValue('telefono', $data->telefono);
        $templateProcessor->setValue('cargo', $data->cargo);
        $templateProcessor->setValue('correo_redv', $data->correo_redv);
        $templateProcessor->setValue('bodega', $data->bodega);
        $templateProcessor->setValue('login_servinte', $data->login_servinte);
        $templateProcessor->setValue('password_servinte', $data->password_servinte);
        $templateProcessor->setValue('usuario_clonar_huv', $data->usuario_clonar_huv);
        $templateProcessor->setValue('cedula_clonar', $data->cedula_clonar);

        // Guardar el documento rellenado
        $fileName = 'document_' . $data->id . '.docx';
        $templateProcessor->saveAs($fileName);
    
        // Enviar el archivo para descargar o imprimir
        return response()->download($fileName)->deleteFileAfterSend(true);
    } */



    /* word */
    public function reportePdf(Request $request, huv $huv)
    {

        $templateProcessor = new TemplateProcessor(storage_path('templates/base_pdf.docx'));
        // Obtener datos de la base de datos
        $data = $huv; // Ya que se está inyectando el modelo `huv`, no es necesario usar `find` nuevamente.
        // Suponiendo que $data es el modelo que contiene el campo created_at
        $createdAt = $data->created_at;

        // Extraer el día, mes y año
        $dia = $createdAt->format('d');
        $mes = $createdAt->format('n'); // Usa 'F' para el nombre completo del mes n numero
        $año = $createdAt->format('Y');

        // Reemplazar etiquetas con datos de la base de datos
        $templateProcessor->setValue('name', $data->name);
        $templateProcessor->setValue('cedula', $data->cedula);
        $templateProcessor->setValue('area', $data->area);
        $templateProcessor->setValue('telefono', $data->telefono);
        $templateProcessor->setValue('cargo', $data->cargo);
        $templateProcessor->setValue('correo_redv', $data->correo_redv);
        $templateProcessor->setValue('bodega', $data->bodega);
        $templateProcessor->setValue('login_servinte', $data->login_servinte);
        $templateProcessor->setValue('password_servinte', $data->password_servinte);
        $templateProcessor->setValue('usuario_clonar_huv', $data->usuario_clonar_huv);
        $templateProcessor->setValue('cedula_clonar', $data->cedula_clonar);
        $templateProcessor->setValue('name_referencia', $data->name_referencia);
        // Establecer los valores de fecha en la plantilla
        $templateProcessor->setValue('dia', $dia);
        $templateProcessor->setValue('mes', $mes);
        $templateProcessor->setValue('año', $año);

        /* firma */
        // Ruta de la imagen en la carpeta public
        $imagePath = public_path('images/firma/firma_qf.png');
        // Insertar la imagen en el documento
        $templateProcessor->setImageValue('firma', $imagePath);



        // Guardar el documento rellenado
        $fileName = 'document_' . $data->id . '.docx';
        $templateProcessor->saveAs($fileName);

        // Enviar el archivo para descargar o imprimir
        return response()->download($fileName)->deleteFileAfterSend(true);
    }
}
