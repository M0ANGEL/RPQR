<?php
use App\Http\Controllers\admin\BodegasController;
use App\Http\Controllers\admin\CambioController;
use App\Http\Controllers\admin\HomeGraficaController;
use App\Http\Controllers\admin\HuvController;
use App\Http\Controllers\admin\PermissionController;
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
use App\Http\Controllers\Api\GraficaController;
use App\Http\Controllers\Api\GraficaMesController;
use App\Http\Controllers\indicadores\Dispensado\Admin\DiespeBodegasController;
use App\Http\Controllers\indicadores\Dispensado\DiespeDiarioController;
use App\Http\Controllers\indicadores\Dispensado\DiespeMesController;
use App\Http\Controllers\indicadores\Dispensado\DispensadoController;
use App\Http\Controllers\indicadores\hallazgo\MesController;
use App\Http\Controllers\indicadores\hallazgo\regente\BodegasMesController;
use App\Http\Controllers\VistaMedica\GestionController;
use App\Http\Controllers\VistaMedica\HuvPermisosController;
use App\Http\Controllers\VistaMedica\IngresosVistaMedicaController;

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('/users', UserController::class)
/* ->middleware(['can:admin_usuarios']) */;


Route::resource('/cambio', CambioController::class)->except('delete','show');


Route::resource('/redvital', RedvitalController::class)
/* ->middleware(['can:solicitud_usuarios_redvital']) */;
Route::resource('/roles', RoleController::class)/* ->middleware(['can:crear_roles']) */;
Route::resource('/permissions', PermissionController::class)/* ->middleware(['can:crear_permisos']) */;
Route::resource('/huv', HuvController::class)/* ->middleware(['can:solicitud_usuarios_huv']) */;
Route::resource('/bodegas', BodegasController::class)
->except('show')/* ->middleware(['can:crear_permisos']) */;
Route::resource('/confirmacion', ConfirmarController::class)
->except('create','delete','show','store')/* ->middleware(['can:confirmacion']) */;
Route::resource('/solicitud', HuvSolicitudController::class)
->except('create','delete','show','store')/* ->middleware(['can:solicitudes']) */;
Route::resource('/vistamedica', VistaController::class)/* ->middleware(['can:vista_medica']) */;
Route::resource('/IngresoVistaMedica',IngresosVistaMedicaController::class)/*->middleware(['can:ingreso_vista_medica'])*/;
Route::resource('/huvpermisos', HuvPermisosController::class)/*->except('delete','create')*/;
Route::resource('/gestion', GestionController::class)/*->middleware(['can:pb'])*/;

/* repprte */

Route::resource('/reporte', ReportController::class)/* ->middleware(['can:reporte']) */;
Route::resource('/cerrado', CerradoController::class)/* ->middleware(['can:reporte']) */;
Route::resource('/reportes_regente', RegenteEventosController::class)
->except('delete','show','create','store')
/* ->middleware(['can:manejo_eventos']) */;



                    /* INDICADORES */
/* hallazgo */
Route::resource('/indicadores', HallazgoController::class);
Route::resource('/indicadoresDiario',DiarioController::class);
Route::resource('/indicadoresMes',MesController::class);
/* error de dispensacion */
Route::resource('/Dispensado', DispensadoController::class);
Route::resource('/DispensadoDiario',DiespeDiarioController::class);
Route::resource('/DispensadoMes',DiespeMesController::class);

                    /* GRAFICOS */
/* hallazgo */
Route::resource('/HomeGrafica', HomeGraficaController::class);
Route::resource('/grafica', GraficaController::class)->except('edit','store','create','delete','show','update');
Route::resource('/graficaMes', GraficaMesController::class)->except('edit','store','create','delete','show','update');
Route::resource('/graficaBodegas', BodegasMesController::class)->except('edit','store','create','delete','show','update');
/* error de dispensados */
Route::resource('/DispensadograficaD', GraficaDiarioController::class)->except('edit','store','create','delete','show','update');
Route::resource('/DispensadoGraficaM', GraficaMessController::class)->except('edit','store','create','delete','show','update');
Route::resource('/DispensadoBodegas', DiespeBodegasController::class)->except('edit','store','create','delete','show','update');






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
