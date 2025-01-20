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
use App\Http\Controllers\asistencias\AsistenciaController;
use App\Http\Controllers\AUDITORIA\ArchivosController;
use App\Http\Controllers\CopyparteController;
use App\Http\Controllers\ImpresoraController;
use App\Http\Controllers\indicadores\Dispensado\Admin\DiespeBodegasController;
use App\Http\Controllers\indicadores\Dispensado\DiespeDiarioController;
use App\Http\Controllers\indicadores\Dispensado\DiespeMesController;
use App\Http\Controllers\indicadores\Dispensado\DispensadoController;
use App\Http\Controllers\indicadores\hallazgo\MesController;
use App\Http\Controllers\indicadores\hallazgo\regente\BodegasMesController;
use App\Http\Controllers\indicadores\mensuales\ConfiabilidadInventarioController;
use App\Http\Controllers\indicadores\mensuales\costoAveriasController;
use App\Http\Controllers\indicadores\mensuales\CostoVencimientoController;
use App\Http\Controllers\indicadores\mensuales\EntregaImcompletaController;
use App\Http\Controllers\indicadores\mensuales\ErrorDriverController;
use App\Http\Controllers\indicadores\mensuales\RecepcionTecnicaController;
use App\Http\Controllers\indicadores\pendientes_huv\PendientesHuvController;
use App\Http\Controllers\indicadores\pendientes_huv\regente\PendientesBMController;
use App\Http\Controllers\Inventarios\EntregaController;
use App\Http\Controllers\Inventarios\IngresoController;
use App\Http\Controllers\Inventarios\RetiroController;
use App\Http\Controllers\mipres\ActivoController;
use App\Http\Controllers\mipres\EntregaMendicamentosController;
use App\Http\Controllers\mipres\MedicamentoController;
use App\Http\Controllers\mipres\PacienteController;
use App\Http\Controllers\Nomina\AsistenciasController;
use App\Http\Controllers\Novedad\NovedadController;
use App\Http\Controllers\PedidoInventario\PedivoInventarioController;
use App\Http\Controllers\tikes\Administracion\TikesAdminController;
use App\Http\Controllers\Tikes\Categorias\CategoriaController;
use App\Http\Controllers\Tikes\Confirmacion\TickestConfirmacionController;
use App\Http\Controllers\Tikes\DesarroloAdmin\DesAdminController;
use App\Http\Controllers\Tikes\Subcategorias\SubcategoriaController;
use App\Http\Controllers\Tikes\TikeController;
use App\Http\Controllers\VistaMedica\GestionController;
use App\Http\Controllers\VistaMedica\HuvPermisosController;
use App\Http\Controllers\VistaMedica\IngresosVistaMedicaController;
use App\Http\Controllers\WhatsAppController;
use App\Models\asistencias\Asistencias;



Route::get('/', function () {
    return view('auth.login');
});

Route::resource('/users', UserController::class)->middleware(['can:admin_usuarios']);
Route::get('AllUsuarios', [UserController::class, 'allUsuarios'])->name('AllUsuarios')->middleware(['can:admin_usuarios']);
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
Route::resource('/solicitud', HuvSolicitudController::class)->except('create', 'delete', 'show', 'store')->middleware('can:solicitudes');
Route::get('/reporte_usuarios', [HuvSolicitudController::class, 'reporte'])->name('reporte_usuarios');
Route::get('/donlow_pdf/{huv}', [HuvSolicitudController::class, 'reportePdf'])->name('donlow_pdf');

/* permisos redvital */
Route::resource('/RedvitalPermisos', GestionRedvitalController::class)->middleware('can:solicitudes_redvital');
Route::get('/permisos_historial_redvital', [GestionRedvitalController::class, 'historial'])->name('permisos_historial_redvital');


/* INVENTARIOS PC */
Route::resource('/Inventarios_Registros', IngresoController::class)->middleware(['can:inventarios']);
Route::resource('/Inventarios_Entrega', EntregaController::class)->middleware(['can:inventarios']);
Route::resource('/Inventarios_Retiros', RetiroController::class)->middleware(['can:inventarios']);
Route::get('/Inventarios_Cambio_Area', [RetiroController::class, 'cambioIndex'])->name('Inventarios_Cambio_Area')->middleware(['can:inventarios']);
Route::get('/Inventarios_Cambio_Area/{id}', [RetiroController::class, 'cambioAreaEdit'])->name('cambiar')->middleware(['can:inventarios']);
Route::put('/Inventarios_Cambio_Area/{Inventarios_Retiro}', [RetiroController::class, 'cambiarUpdate'])->name('cambiarUpdate')->middleware(['can:inventarios']);

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

/* planeacion */
Route::resource('/Planeacion', ErrorDriverController::class)->middleware(['can:Planeacion_indicadores']);
Route::get('ficha_planeacion', [ErrorDriverController::class, 'show'])->middleware(['can:Planeacion_indicadores']);

/* entrega incompleta */
Route::resource('EntregaIncompleta', EntregaImcompletaController::class)->middleware(['can:EntregaIncompleta_indicadores']);
Route::get('fichaTecnica_entrega', [EntregaImcompletaController::class, 'show'])->middleware(['can:EntregaIncompleta_indicadores']);

/* recepcion tenica */
Route::resource('RecepcionTecnica', RecepcionTecnicaController::class)->middleware(['can:RecepcionTecnica_indicadores']);

/* confiabilidad inventario */
Route::resource('Confiabilidad-Inventario', ConfiabilidadInventarioController::class)->middleware(['can:confiabilidadInventario_indicadores']);

/* costo por vencimiento */
Route::resource('/Costo-Vencimientos', CostoVencimientoController::class)->middleware(['can:costoVencimiento_indicadores']);

/* costo por averia */
Route::resource('/Costo-averias', costoAveriasController::class)->middleware(['can:costoAverias_indicadores']);


/* mensajes de texto api */
Route::post('/send-whatsapp-message', [WhatsAppController::class, 'sendMessage']);


/* GRAFICOS */
/* hallazgo */
Route::resource('/HomeGrafica', HomeGraficaController::class)->middleware(['can:manejo_indicadores']);
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



/* IMPRESORA REPORTES */
Route::resource('/ReporteImpresora', ImpresoraController::class)->middleware(['can:reportar']); /* esta ruta maneja las solicitudes de creacion de reporte redvital */
Route::resource('/Copyparte', CopyparteController::class)->middleware(['can:copy']);
Route::get('/Historial-reportes', [CopyparteController::class, 'index2'])->name('Copypart.index2')->middleware(['can:copy']);

/* premis mipres */

Route::resource('Mipres', PacienteController::class)->middleware(['can:Mipres_Crear_Paciente']);
Route::resource('EntregaMedicamentos', EntregaMendicamentosController::class)->middleware(['can:Mipres_Crear_mipres']);
Route::get('/entrega-medicamentos/{Mipre}', [EntregaMendicamentosController::class, 'create'])->name('EntregaMedicamentos.create')->middleware(['can:Mipres_Crear_mipres']);
Route::resource('Mipres_Activos', ActivoController::class)->middleware(['can:Mipres_activos_index']);
Route::get('/Mipres_Activos/create/{Mipres_Activo}', [ActivoController::class, 'create'])->name('Mipres_Activos.create')->middleware(['can:Mipres_activos_index']);
Route::get('/historial', [ActivoController::class, 'historialIndex'])->name('historial.index')->middleware(['can:Mipres_historial']);
Route::get('/reportes', [ActivoController::class, 'reportes'])->name('reportes-mipres')->middleware(['can:Mipres_reportes']);
Route::resource('/medicamentos_mipres', MedicamentoController::class)->middleware(['can:medicamentos_mipres']);

/* anulacion de mipres */
Route::get('/cancelacion_mipres', [ActivoController::class, 'Cancelarmipres'])->name('cancelacion_mipres.cancelacion');

/* mipres reportes */
Route::get('/reporte-activos', [ActivoController::class, 'ReporteActivos'])->name('reporte.activos');
Route::get('/reporte-terminados', [ActivoController::class, 'Reporteterminados'])->name('reporte.terminados');
Route::get('/reporte-detallado', [ActivoController::class, 'Reportedetallado'])->name('reporte.detallado');

/* asistencias */

Route::resource('/asistencia', AsistenciaController::class);
Route::get('/Registro_Personal', [AsistenciaController::class, 'RegistroCreate'])->name('registroPersonal.create');
Route::post('/registro-personal', [AsistenciaController::class, 'RegistroStore'])->name('registroPersonal.store');
/* reportes */
Route::get('download-report', [AsistenciaController::class, 'descarga'])->name('descarga.asistencias')->middleware(['can:reporte_asistenacias_induciones']);

/* Novedadaes */
Route::get('/novedades/administrador', [NovedadController::class, 'supervisor'])->name('novedades.administrador')->middleware(['can:ModuloNovedades']);
Route::resource('/novedades', NovedadController::class)->middleware(['can:ModuloNovedades']);
Route::get('archivos/{id}/descargar', [NovedadController::class, 'descargar'])->name('archivos.descargar');

/* Tikes */
Route::resource('/Tikes', TikeController::class);
Route::get('/subcategoriasTodas', [TikeController::class, 'getSubcategorias'])->name('subcategoriasTodas');
/* Tikes carrados */
Route::get('TikesCerrados', [TikeController::class, 'tikesCerrados'])->name('Tikes.cerrados');

/* administracion de tikes sistemas */
Route::resource('/AdminTikes', TikesAdminController::class);
Route::get('TikectActivos/{TikectActivo}', [TikesAdminController::class, 'Activo'])->name('Activo.edit');
Route::put('TikectDisponible/{TikectActivo}', [TikesAdminController::class, 'disponible'])->name('disponible.edit');
/* cambiar area del ticket sistemas */
Route::get('CambiarArea/{TikectActivo}', [TikesAdminController::class, 'CambiarArea'])->name('CambiarArea.edit');
/* tikes cerrados administracion sistemas */
Route::get('TikectPendientesCalificados', [TikesAdminController::class, 'tikesPendientesCalificar'])->name('TikectPendientesCalificados.index');
Route::get('TikectCalificados', [TikesAdminController::class, 'tikesCalificados'])->name('TikectCalificados.index');
Route::get('VistaTikectSinCalificados/{tickesPendiente}', [TikesAdminController::class, 'VistaTikectSinCalificados'])->name('VistatikeSinCalificados.show');
Route::get('VistaTikectCerrados/{tickesCerrados}', [TikesAdminController::class, 'VistaTikectCerrados'])->name('VistaTikectCerrados.show');
/* categorias */
Route::resource('categorias', CategoriaController::class);
//etados categorias
Route::get('EstadosCategoria/{Categorias}', [CategoriaController::class, 'EstadosCategorias'])->name('EstadosCategoria.edit');

/* subcategorias */
Route::resource('subcategorias', SubcategoriaController::class);
//estado sucategorias
Route::get('EstadosSubcategoria/{Subcategoria}', [SubcategoriaController::class, 'EstadosSubcategorias'])->name('EstadosSubcategorias.edit');

// Tickest que nececitan confirmazion
Route::resource('AutorizacionTickes', TickestConfirmacionController::class);



//panel administracion desarrolladores
Route::resource('TicketsAdminDesarrollos', DesAdminController::class);
Route::get('Desarrollo/Tikect/ActivosDes/{TicketsAdminDesarrollo}', [DesAdminController::class, 'Activo'])->name('ActivoDesarrollo.edit');
Route::put('TikectDisponibleDesarrollo/{TikectActivo}', [DesAdminController::class, 'disponible'])->name('disponibleDesarrollo.edit');
/* cambiar area del ticket desarrollo */
Route::get('CambiarAreaDesarrollo/{TikectActivo}', [DesAdminController::class, 'CambiarArea'])->name('CambiarAreaDesarrollo.edit');
/* tikes cerrados administracion  desarrollo*/
Route::get('TikectPendientesCalificadosDesarrollo', [DesAdminController::class, 'tikesPendientesCalificar'])->name('TikectPendientesCalificadosDesarrollo.index');
Route::get('TikectCalificadosDesarrollo', [DesAdminController::class, 'tikesCalificados'])->name('TikectCalificadosDesarrollo.index');
Route::get('VistaTikectSinCalificadosDesarrollo/{tickesPendiente}', [DesAdminController::class, 'VistaTikectSinCalificados'])->name('VistatikeSinCalificadosDesarrollo.show');
Route::get('VistaTikectCerradosDesarrollo/{tickesCerrados}', [DesAdminController::class, 'VistaTikectCerrados'])->name('VistaTikectCerradosDesarrollo.show');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get(
        '/dashboard',
        [UserController::class, 'home']
    )->name('dashboard');
});
