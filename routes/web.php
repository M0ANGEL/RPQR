<?php

use App\Http\Controllers\admin\BodegasController;
use App\Http\Controllers\admin\CambioController;
use App\Http\Controllers\admin\GestionRedvitalController;
use App\Http\Controllers\admin\HomeGraficaController;
use App\Http\Controllers\admin\HuvController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\Agotados\Agotadoscontroller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Huv\HuvSolicitudController;
use App\Http\Controllers\indicadores\hallazgo\DiarioController;
use App\Http\Controllers\indicadores\HallazgoController;
use App\Http\Controllers\quimico_dt\ConfirmarController;
use App\Http\Controllers\Redvital\RedvitalController;
use App\Http\Controllers\Regente\RegenteEventosController;
use App\Http\Controllers\Regente\ReportController;
use App\Http\Controllers\Regente\RoleController;
use App\Http\Controllers\reporte\CerradoController;
use App\Http\Controllers\VistaMedica\VistaController;
use Illuminate\Support\Facades\Route;
use Nette\Utils\RegexpException;
use App\Http\Controllers\Api\Dispensado\GraficaDiarioController;
use App\Http\Controllers\Api\Dispensado\GraficaMessController;
use App\Http\Controllers\Api\DispensadoGraficaMesController;
use App\Http\Controllers\Api\GraficaController;
use App\Http\Controllers\Api\GraficaMesController;
use App\Http\Controllers\Api\pendientes\PendienteGraficaMesController;
use App\Http\Controllers\AUDITORIA\ArchivosController;
use App\Http\Controllers\CopyparteController;
use App\Http\Controllers\ImpresoraController;
use App\Http\Controllers\indicadores\Dispensado\Admin\DiespeBodegasController;
use App\Http\Controllers\indicadores\Dispensado\DiespeDiarioController;
use App\Http\Controllers\indicadores\Dispensado\DiespeMesController;
use App\Http\Controllers\indicadores\Dispensado\DispensadoController;
use App\Http\Controllers\indicadores\hallazgo\MesController;
use App\Http\Controllers\indicadores\hallazgo\regente\BodegasMesController;
use App\Http\Controllers\indicadores\pendientes_huv\PendientesHuvController;
use App\Http\Controllers\indicadores\pendientes_huv\regente\PendientesBMController;
use App\Http\Controllers\Inventarios\EntregaController;
use App\Http\Controllers\Inventarios\IngresoController;
use App\Http\Controllers\Inventarios\RetiroController;
use App\Http\Controllers\VistaMedica\GestionController;
use App\Http\Controllers\VistaMedica\HuvPermisosController;
use App\Http\Controllers\VistaMedica\IngresosVistaMedicaController;

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('/users', UserController::class)->middleware(['can:admin_usuarios']);
Route::resource('/cambio', CambioController::class)->except('delete', 'show');

Route::resource('/redvital', RedvitalController::class)->middleware(['can:solicitud_usuarios_redvital']);
Route::resource('/roles', RoleController::class)->middleware(['can:crear_roles']);
Route::resource('/permissions', PermissionController::class)->middleware(['can:crear_permisos']);
Route::resource('/huv', HuvController::class)->middleware(['can:solicitud_usuarios_huv']);
Route::resource('/bodegas', BodegasController::class)->except('show')->middleware(['can:crear_permisos']);
Route::resource('/confirmacion', ConfirmarController::class)->except('create', 'delete', 'show', 'store')->middleware(['can:confirmacion']);
Route::resource('/solicitud', HuvSolicitudController::class)->except('create', 'delete', 'show', 'store')->middleware(['can:solicitudes']);
Route::resource('/vistamedica', VistaController::class)->middleware(['can:vista_medica']);
Route::resource('/IngresoVistaMedica', IngresosVistaMedicaController::class)->middleware(['can:ingreso_vista_medica']);
Route::resource('/gestion', GestionController::class)->middleware(['can:pb']);
Route::resource('/AdministrarAgotados', Agotadoscontroller::class)->middleware(['can:AdministrarAgotados']);
Route::get('/agotados', [Agotadoscontroller::class, 'menu'])->name('agotados')->middleware(['can:agotados']);
Route::get('/carta/{id}', [Agotadoscontroller::class, 'show'])->name('carta')->middleware('can:carta');

/* huv */
Route::resource('/huvpermisos', HuvPermisosController::class)->except('delete', 'create')->middleware('can:solicitudes');
Route::get('/permisos_historial', [HuvPermisosController::class, 'historial'])->name('permisos_historial');
Route::resource('/solicitud', HuvSolicitudController::class)->except('create', 'delete', 'show', 'store')->middleware('can:huv_permisos');
Route::get('/reporte_usuarios', [HuvSolicitudController::class, 'reporte'])->name('reporte_usuarios');
Route::get('/donlow_pdf/{huv}', [HuvSolicitudController::class, 'reportePdf'])->name('donlow_pdf');

/* permisos redvital */
Route::resource('/RedvitalPermisos', GestionRedvitalController::class)->middleware('can:solicitudes_redvital');
Route::get('/permisos_historial_redvital', [GestionRedvitalController::class, 'historial'])->name('permisos_historial_redvital');


/* INVENTARIOS PC */
Route::resource('/Inventarios_Registros', IngresoController::class)->middleware(['can:inventarios']);
Route::resource('/Inventarios_Entrega', EntregaController::class)->middleware(['can:inventarios']);
Route::resource('/Inventarios_Retiros', RetiroController::class)->middleware(['can:inventarios']);
Route::get('/Inventarios_Cambio_Area', [RetiroController::class, 'cambioIndex'])->name('Inventarios_Cambio_Area');
Route::get('/Inventarios_Cambio_Area/{id}', [RetiroController::class, 'cambioAreaEdit'])->name('cambiar');
Route::put('/Inventarios_Cambio_Area/{Inventarios_Retiro}', [RetiroController::class, 'cambiarUpdate'])->name('cambiarUpdate');

/* repprte */

Route::resource('/reporte', ReportController::class)->middleware(['can:reporte']);
Route::put('/estado/{reporte}', [ReportController::class, 'estado'])->name('estado');
Route::resource('/cerrado', CerradoController::class)->except('create', 'update', 'delete', 'edit', 'store',)->middleware(['can:reporte']);
Route::resource('/reportes_regente', RegenteEventosController::class)->except('delete', 'show', 'create', 'store')->middleware(['can:manejo_eventos']);
Route::get('/reportar', [ReportController::class, 'create'])->name('reportar')->middleware(['can:reportar']);
Route::post('/reportar', [ReportController::class, 'store'])->name('reportar.store')->middleware(['can:reportar']);

/* INDICADORES */
/* hallazgo */
Route::resource('/indicadores', HallazgoController::class)->middleware(['can:hallazgos_indicador']);
Route::resource('/indicadoresDiario', DiarioController::class)->middleware(['can:hallazgos_indicador']);
Route::resource('/indicadoresMes', MesController::class)->middleware(['can:hallazgos_indicador']);
Route::get('fichaTecnica_hallago', [HallazgoController::class, 'fichaTecnica'])->name('fichaTecnica.hallazgo')->middleware(['can:hallazgos_indicador']);
/* error de dispensacion */
Route::resource('/Dispensado', DispensadoController::class)->middleware(['can:dispensado_indicador']);
Route::resource('/DispensadoDiario', DiespeDiarioController::class)->middleware(['can:dispensado_indicador']);
Route::resource('/DispensadoMes', DiespeMesController::class)->middleware(['can:dispensado_indicador']);
/* pendites Huv */
Route::resource('/PenditesHuv', PendientesHuvController::class)->middleware(['can:PenditesHuv_indicador']);
Route::get('fichaTecnica_pendientes', [PendientesHuvController::class, 'fichaTecnica'])->name('fichaTecnica_pendientes')->middleware(['can:PenditesHuv_indicador']);


/* GRAFICOS */
/* hallazgo */
Route::resource('/HomeGrafica', HomeGraficaController::class)->middleware(['can:HomeGrafica']);
Route::resource('/grafica', GraficaController::class)->except('edit', 'store', 'create', 'delete', 'show', 'update')->middleware(['can:grafica']);
Route::resource('/graficaMes', GraficaMesController::class)->except('edit', 'store', 'create', 'delete', 'show', 'update')->middleware(['can:graficaMes']);
Route::resource('/graficaBodegas', BodegasMesController::class)->except('edit', 'store', 'create', 'delete', 'show', 'update')->middleware(['can:graficaBodegas']);
/* error de dispensados */
Route::resource('/DispensadograficaD', GraficaDiarioController::class)->except('edit', 'store', 'create', 'delete', 'show', 'update')->middleware(['can:DispensadograficaD']);
Route::resource('/DispensadoGraficaM', GraficaMessController::class)->except('edit', 'store', 'create', 'delete', 'show', 'update')->middleware(['can:DispensadoGraficaM']);
Route::resource('/DispensadoBodegas', DiespeBodegasController::class)->except('edit', 'store', 'create', 'delete', 'show', 'update')->middleware(['can:DispensadoBodegas']);
/* pendiente */
Route::resource('/PendienteMes', PendienteGraficaMesController::class)->middleware(['can:PendienteMes']);
Route::resource('/PendientesBodegasM', PendientesBMController::class)->middleware(['can:PendientesBodegasM']);


/* AUDITORIA  VENTA*/

/* gestion de subida de archivos */
Route::get('/auditoria', [ArchivosController::class, 'index'])->name('auditoria.index');
Route::post('/auditoria/subir-reportes', [ArchivosController::class, 'subirReportes'])->name('reportes.subir');
Route::post('/auditoria/borrar-datos', [ArchivosController::class, 'borrarDatos'])->name('borrar.datos');


/* IMPRESORA REPORTES */
Route::resource('/ReporteImpresora', ImpresoraController::class)->middleware(['can:sebthi']); /* esta ruta maneja las solicitudes de creacion de reporte redvital */
Route::resource('/Copyparte', CopyparteController::class)->middleware(['can:copy']);
Route::get('/Historial-reportes', [CopyparteController::class, 'index2'])->name('Copypart.index2')->middleware(['can:copy']);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
