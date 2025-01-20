@php
    $links = [
        [
            /* vista medica */
            'name' => 'Vista Medica',
            'url' => route('vistamedica.index'),
            'active' => request()->routeIs('vistamedica.*'),
            'icon' => 'fa-solid fa-hand-holding-medical',
            'can' => 'vista_medica',
        ],
        [
            /* vista agotado */
            'name' => 'Vista Agotados',
            'url' => route('agotados'),
            'active' => request()->routeIs('agotados'),
            'icon' => 'fa-solid fa-v',
            'can' => 'agotados',
        ],

        [
            /*cpyparte impresoras */
            'name' => 'Administracion de reportes',
            'url' => route('Copyparte.index'),
            'active' => request()->routeIs('Copyparte.*'),
            'icon' => 'fa-solid fa-globe',
            'can' => 'copy',
        ],
        [
            /*historial de impresoras */
            'name' => 'Historial de maquinas',
            'url' => route('Copypart.index2'),
            'active' => request()->routeIs('Copypart.index2'),
            'icon' => 'fa-solid fa-clock-rotate-left',
            'can' => 'copy',
        ],
        /* confirmar usuarios huv */
        [
            'name' => 'Solicitudes Redvital',
            'url' => route('solicitud.index'),
            'active' => request()->routeIs('solicitud.*'),
            'icon' => 'fa-regular fa-hospital',
            'can' => 'solicitudes',
        ],
        /* permisos de cambio huv */
        [
            'name' => 'Solicitudes Permisos Servinte',
            'url' => route('huvpermisos.index'),
            'active' => request()->routeIs('huvpermisos.*'),
            'icon' => 'fa-solid fa-user-gear',
            'can' => 'solicitudes',
        ],
        /* inacticaion codigos huv*/
        /*  [
            'name' => 'Inactivar Codigos Huv',
            'url' => route('cambio.index'),
            'active' => request()->routeIs('cambio.*'),
            'icon' => 'fa-regular fa-circle-xmark',
        ], */

        /* cambiar contra*/
        /*         [
            'name' => 'Cambiar Password',
            'url' => route('cambio.index'),
            'active' => request()->routeIs('cambio.*'),
            'icon' => 'fa-solid fa-unlock-keyhole',
        ], */
    ];

    $buttonIndicadores = [
        'can' => 'ModuloIndicadores',
    ];

    $indicadores = [
        [
            /*  error hallazgos*/
            'name' => 'Error Hallazgo',
            'url' => route('indicadores.create'),
            'active' => request()->routeIs('indicadores.index'),
            'icon' => 'fa-solid fa-certificate',
            'can' => 'hallazgos_indicador',
        ],

        [
            /* error en dispensacion */
            'name' => 'Error Dispensación',
            'url' => route('Dispensado.create'),
            'active' => request()->routeIs('Dispensado.*'),
            'icon' => 'fa-solid fa-certificate',
            'can' => 'dispensa_indicador',
        ],
        [
            /* pendientes huv */
            'name' => 'Pendientes Huv',
            'url' => route('PenditesHuv.create'),
            'active' => request()->routeIs('PenditesHuv.*'),
            'icon' => 'fa-solid fa-certificate',
            'can' => 'PenditesHuv_indicador',
        ],

        [
            /* Planeacion **/
            'name' => 'Planeacion',
            'url' => route('Planeacion.create'),
            'active' => request()->routeIs('ErroresDriver.*'),
            'icon' => 'fa-solid fa-certificate',
            'can' => 'Planeacion_indicadores',
        ],
        [
            /* Entrega Incompleta */
            'name' => 'Entrega Incompleta',
            'url' => route('EntregaIncompleta.create'),
            'active' => request()->routeIs('EntregaIncompleta.*'),
            'icon' => 'fa-solid fa-certificate',
            'can' => 'EntregaIncompleta_indicadores',
        ],

        [
            /* Costo Por Vencimientol */
            'name' => 'Costo Por Vencimiento',
            'url' => route('Costo-Vencimientos.create'),
            'active' => request()->routeIs('Costo-Vencimientos.*'),
            'icon' => 'fa-solid fa-certificate',
            'can' => 'costoVencimiento_indicadores',
        ],
        [
            /* Costo Por Averia   falta terminar */
            'name' => 'Costo Por Averia',
            'url' => route('Costo-averias.create'),
            'active' => request()->routeIs('Costo-averias.*'),
            'icon' => 'fa-solid fa-certificate',
            'can' => 'costoAverias_indicadores',
        ],

        [
            /* Recepcion Tecnica*/
            'name' => 'Recepcion Tecnica',
            'url' => route('RecepcionTecnica.create'),
            'active' => request()->routeIs('RecepcionTecnica.*'),
            'icon' => 'fa-solid fa-certificate',
            'can' => 'RecepcionTecnica_indicadores',
        ],
        [
            /* Conifabilidad Del Inventario */
            'name' => 'Confiabilidad Del Inventario',
            'url' => route('Confiabilidad-Inventario.create'),
            'active' => request()->routeIs('Confiabilidad-Inventario.*'),
            'icon' => 'fa-solid fa-certificate',
            'can' => 'confiabilidadInventario_indicadores',
        ],
        [
            /* rotulacion falta */
            'name' => 'Confiabilidad Del Inventario',
            'url' => route('vistamedica.index'),
            'active' => request()->routeIs('.*'),
            'icon' => 'fa-solid fa-certificate',
            'can' => 'rotulacion_indicadores',
        ],
        [
            /* total incapacidades falta*/
            'name' => 'Total incapacidades',
            'url' => route('vistamedica.index'),
            'active' => request()->routeIs('.*'),
            'icon' => 'fa-solid fa-certificate',
            'can' => 'TotalIncapacidad_indicadores',
        ],
        [
            /*  canasta cirugias falta*/
            'name' => 'Canastas cirugias',
            'url' => route('vistamedica.index'),
            'active' => request()->routeIs('.*'),
            'icon' => 'fa-solid fa-certificate',
            'can' => 'canastas_indicadores',
        ],
    ];

    $buttonExternos = [
        'can' => 'ModuloExterno',
    ];

    $externos = [
        [
            'name' => 'Sebthi 3.0',
            'url' => 'https://farmartltda.com/sebthi/#/auth/login',
            'active' => request()->routeIs('indicadores.index'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'link_sebthi',
        ],
        [
            'name' => 'Anexo 37',
            'url' =>
                'https://docs.google.com/spreadsheets/d/1F3zDgMTFkiuQNctEPG0ErliISP52HXVRlqScbv7Po-w/edit?gid=2084245675#gid=2084245675',
            'active' => request()->routeIs('indicadores.index'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'link_anexo',
        ],
        [
            'name' => 'MR-AUTO GESTION',
            'url' =>
                'https://farmartltda-my.sharepoint.com/:f:/g/personal/soportehuv_farmartips_com/EtcBU2LGaitDhil9D1qo9E4BMvXBEDldtQuxF9wAchPeOg?e=abRvca',
            'active' => request()->routeIs('indicadores.index'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'link_Mr-gestion',
        ],
    ];

    $buttonNovedadesHuv = [
        'can' => 'ModuloNovedades',
    ];

    $novedadesHuvs = [
        /* reporte de novedades*/
        [
            'name' => 'Reporta Novedades',
            'url' => route('novedades.index'),
            'active' => request()->routeIs('novedades.index'),
            'icon' => 'fa-solid fa-hippo',
            'can' => 'ModuloNovedades',
        ],
        /* Administracion de novedad*/
        [
            'name' => 'Administrar Novedades',
            'url' => route('novedades.administrador'),
            'active' => request()->routeIs('novedades.administrador'),
            'icon' => 'fa-solid fa-hippo',
            'can' => 'ModuloNovedades',
        ],
    ];

    $buttonTikes = [
        'can' => 'ModuloTikes',
    ];

    $Tikes = [
        /* reporte de tike*/
        [
            'name' => 'Crear Tickets ',
            'url' => route('Tikes.index'),
            'active' => request()->routeIs('Tikes.index'),
            'icon' => 'fa-solid fa-hippo',
            'can' => 'crear_tikes',
        ],
        /* Administracion de tickets sistemas*/
        [
            'name' => 'Administrar Tickets SIS',
            'url' => route('AdminTikes.index'),
            'active' => request()->routeIs('AdminTikes.administrador'),
            'icon' => 'fa-solid fa-hippo',
            'can' => 'administrar_tikes',
        ],
        /* Administracion de tickets desarrollo*/
        [
            'name' => 'Administrar Tickets DES',
            'url' => route('TicketsAdminDesarrollos.index'),
            'active' => request()->routeIs('TicketsAdminDesarrollos'),
            'icon' => 'fa-solid fa-hippo',
            'can' => 'administrar_tikes',
        ],
        /* Administracion de categegorias*/
        [
            'name' => 'Administrar Categorias',
            'url' => route('categorias.index'),
            'active' => request()->routeIs('categorias'),
            'icon' => 'fa-solid fa-hippo',
            'can' => 'administrar_tikes',
        ],
        /* Administracion de Subcategegorias*/
        [
            'name' => 'Administrar Subcategorias',
            'url' => route('subcategorias.index'),
            'active' => request()->routeIs('subcategorias'),
            'icon' => 'fa-solid fa-hippo',
            'can' => 'administrar_tikes',
        ],
        /* Administracion de sedes*/
        [
            'name' => 'Autorizar Tickest',
            'url' => route('AutorizacionTickes.index'),
            'active' => request()->routeIs('AutorizacionTickes'),
            'icon' => 'fa-solid fa-hippo',
            'can' => 'administrar_tikes',
        ],
    ];

    $buttonInventarios = [
        'can' => 'ModuloInventarios',
    ];

    $inventarios = [
        /* Registro de equipos*/
        [
            'name' => 'Registro de equipos',
            'url' => route('Inventarios_Registros.create'),
            'active' => request()->routeIs('Inventarios_Registros.create'),
            'icon' => 'fa-solid fa-hippo',
            'can' => 'inventarios',
        ],
        /* Entrega de equipos*/
        [
            'name' => 'Entrega de equipos',
            'url' => route('Inventarios_Entrega.create'),
            'active' => request()->routeIs('Inventarios_Entrega.create'),
            'icon' => 'fa-brands fa-slack',
            'can' => 'inventarios',
        ],
        /* Retiros de equipos*/
        [
            'name' => 'Retiros de equipos',
            'url' => route('Inventarios_Retiros.index'),
            'active' => request()->routeIs('Inventarios_Retiros.*'),
            'icon' => 'fa-brands fa-medium',
            'can' => 'inventarios',
        ],
        /*cambio de area*/
        [
            'name' => 'Cambio de area',
            'url' => route('Inventarios_Cambio_Area'),
            'active' => request()->routeIs('users.*c'),
            'icon' => 'fa-solid fa-layer-group',
            'can' => 'inventarios',
        ],
    ];

    $buttonAdmin = [
        'can' => 'ModuloAdmin',
    ];

    $superadmin = [
        /* permisos de cambio huv */
        [
            'name' => 'Solicitudes Permisos Sebthi',
            'url' => route('RedvitalPermisos.index'),
            'active' => request()->routeIs('RedvitalPermisos.*'),
            'icon' => 'fa-solid fa-person-rays',
            'can' => 'solicitudes_redvital',
        ],
        /* solicitar usuarios redvital */
        [
            'name' => 'Usuarios RedVital',
            'url' => route('redvital.index'),
            'active' => request()->routeIs('redvital.*'),
            'icon' => 'fa-solid fa-heart-pulse',
            'can' => 'solicitud_usuarios_redvital',
        ],
        /* nuevos usuarios*/
        [
            'name' => 'Administrar Usuarios',
            'url' => route('users.index'),
            'active' => request()->routeIs('users.*'),
            'icon' => 'fa-solid fa-users',
            'can' => 'admin_usuarios',
        ],
        /* nuevas bodegas*/
        [
            'name' => 'Administrar Bodegas',
            'url' => route('bodegas.index'),
            'active' => request()->routeIs('bodegas.*'),
            'icon' => 'fa-solid fa-truck-ramp-box',
            'can' => 'crear_permisos',
        ],
        /* roles*/
        [
            'name' => 'Roles',
            'url' => route('roles.index'),
            'active' => request()->routeIs('roles.*'),
            'icon' => 'fa-solid fa-gear',
            'can' => 'crear_roles',
        ],
        /* permisos*/
        [
            'name' => 'Permisos',
            'url' => route('permissions.index'),
            'active' => request()->routeIs('permissions.*'),
            'icon' => 'fa-solid fa-key',
            'can' => 'crear_permisos',
        ],
        /* usuaios all*/
        [
            'name' => 'Usuarios Login',
            'url' => route('AllUsuarios'),
            'active' => request()->routeIs('AllUsuarios.*'),
            'icon' => 'fa-solid fa-user-clock',
            'can' => 'crear_permisos',
        ],
    ];

    $buttonReportes = [
        'can' => 'ModuloReporte',
    ];

    $reportes = [
        /* reportes eventos*/
        [
            'name' => 'Reportar Inconformidad',
            'url' => route('reportar'),
            'active' => request()->routeIs('reportar.create'),
            'icon' => 'fa-regular fa-thumbs-down',
            'can' => 'reportar',
        ],
        /* reportes fallo de impresora*/
        [
            'name' => 'Reportar Impresoras',
            'url' => route('ReporteImpresora.index'),
            'active' => request()->routeIs('ReporteImpresora.*'),
            'icon' => 'fa-solid fa-mug-hot',
            'can' => 'reportar',
        ],
    ];

    $buttonPresmy = [
        'can' => 'ModuloMipres',
    ];

    $presmys = [
        /*  Crear Paciente*/
        [
            'name' => 'Crear Paciente',
            'url' => route('Mipres.create'),
            'active' => request()->routeIs('Mipres.index'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'Mipres_Crear_Paciente',
        ],
        /* Entregar Medicamentos */
        [
            'name' => 'Creacion Mipres',
            'url' => route('EntregaMedicamentos.index'),
            'active' => request()->routeIs('EntregaMedicamentos.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'Mipres_Crear_mipres',
        ],
        [
            /* Mipres Activos  */
            'name' => 'Mipres Activos',
            'url' => route('Mipres_Activos.index'),
            'active' => request()->routeIs('Mipres_Activos.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'Mipres_activos_index',
        ],
        [
            /* Historial Pacientes  */
            'name' => 'Historial Pacientes',
            'url' => route('historial.index'),
            'active' => request()->routeIs('historial.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'Mipres_historial',
        ],
        [
            /* crear medicamento  */
            'name' => 'Crear Medicamentos Mipres',
            'url' => route('medicamentos_mipres.create'),
            'active' => request()->routeIs('Mipres_Activos.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'medicamentos_mipres',
        ],
        [
            /* Reportes  */
            'name' => 'Reportes',
            'url' => route('reportes-mipres'),
            'active' => request()->routeIs('reportes-mipres'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'Mipres_reportes',
        ],
    ];

    $buttonAdministracion = [
        'can' => 'ModuloAdministracion',
    ];

    $administraciones = [
        [
            /* Administrar agotado */
            'name' => 'Administrar Agotados',
            'url' => route('AdministrarAgotados.index'),
            'active' => request()->routeIs('AdministrarAgotados.*'),
            'icon' => 'fa-solid fa-envelope-open-text',
            'can' => 'AdministrarAgotados',
        ],
        [
            /*ingersos vista medica */
            'name' => 'Registro Vista Medica',
            'url' => route('IngresoVistaMedica.index'),
            'active' => request()->routeIs('IngresoVistaMedica.*'),
            'icon' => 'fa-brands fa-creative-commons-pd-alt',
            'can' => 'ingreso_vista_medica',
        ],
        /*  show indicadores*/
        [
            'name' => 'Administrar Indicadores',
            'url' => route('HomeGrafica.index'),
            'active' => request()->routeIs('HomeGrafica.*'),
            'icon' => 'fa-solid fa-chart-bar',
            'can' => 'manejo_indicadores',
        ],
        /* show reportes eventos*/
        [
            'name' => 'Administrar Inconformidad',
            'url' => route('reporte.index'),
            'active' => request()->routeIs('reporte.*'),
            'icon' => 'fa-solid fa-circle-exclamation',
            'can' => 'reporte',
        ],
        /* confirmar usuarios*/
        [
            'name' => 'Confirmaccion',
            'url' => route('confirmacion.index'),
            'active' => request()->routeIs('confirmacion.*'),
            'icon' => 'fa-solid fa-user-shield',
            'can' => 'confirmacion',
        ],
        /* capacitaciones*/
        [
            'name' => 'Asistencias Incucciones',
            'url' => route('asistencia.create'),
            'active' => request()->routeIs('asistencia.*'),
            'icon' => 'fa-solid fa-user-shield',
            'can' => 'asistencia',
        ],
    ];

    $buttonRegentes = [
        'can' => 'ModuloRegentes',
    ];

    $regentes = [
        /* solicitar usuarios huv */
        [
            'name' => 'Solicitar Usario',
            'url' => route('huv.index'),
            'active' => request()->routeIs('huv.*'),
            'icon' => 'fa-solid fa-synagogue',
            'can' => 'solicitud_usuarios_huv',
        ],
        /* solicitar cambio de bodegas/permisos */
        [
            'name' => 'Bodegas / Permisos',
            'url' => route('gestion.index'),
            'active' => request()->routeIs('gestion.*'),
            'icon' => 'fa-solid fa-mug-saucer',
            'can' => 'pb',
        ],
        /*  reportes eventos regentes*/
        [
            'name' => 'Reportes Inconformidad',
            'url' => route('reportes_regente.index'),
            'active' => request()->routeIs('reportes_regente.*'),
            'icon' => 'fa-regular fa-comments',
            'can' => 'manejo_eventos',
        ],
    ];
@endphp

<style>
    #linkNormales:hover {
        background: red;
        border-radius: 8px;
    }

    .collapse {
        transition: opacity 0.5s ease, transform 0.5s ease;
        opacity: 0;
        transform: scaleY(0);
        height: 0;
        overflow: hidden;
    }

    .collapse.show {
        opacity: 1;
        transform: scaleY(1);
        height: auto;
    }

    /* Estilo del sidebar */
    #sidebara {
        background: black;
        /* Fondo negro para el sidebar */
    }

    /* Estilo de los elementos de la lista */
    #sidebar-multi-level-sidebar ul li a {
        color: white;
        /* Letras blancas para los links */
    }

    /* Estilo para los submenús */
    #sidebar-multi-level-sidebar ul li ul {
        background: orange;
        border-radius: 8px;
        /* Fondo naranja para los submenús */
    }

    #sidebar-multi-level-sidebar ul li ul li a {
        color: black;
        /* Letras negras para los links de los submenús */
    }
</style>

<aside id="sidebar-multi-level-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen bg-black transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto " style="background: rgb(2, 7, 125)/* #0b1f6d */;">
        <ul class="space-y-2 font-medium">
            {{-- icono --}}
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center p-2  rounded-lg text-white group">
                    <i class="fa-solid fa-volcano">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </i>
                    <span class="ms-3" style="color: aqua; font-size: 20px;"><b>MR - GESTION</b></span>
                </a>
            </li>
            {{-- indicadores --}}
            @canany($buttonIndicadores['can'])
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base  transition duration-75 rounded-lg group hover:bg-gray-100 hover:text-gray-900  text-white "
                        aria-controls="dropdown-indicadores" data-collapse-toggle="dropdown-indicadores">
                        <i class="fa-solid fa-signal">
                            <path
                                d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                        </i>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Indicadores</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-indicadores" class="hidden py-2 space-y-2">
                        @foreach ($indicadores as $indicador)
                            @canany($indicador['can'] ?? [null])
                                <li>
                                    <a href="{{ $indicador['url'] }}"
                                        style="display: flex; align-items: center; padding: 8px; border-radius: 8px; text-decoration: none; color: {{ $indicador['active'] ? 'white' : 'black' }}; background-color: {{ $indicador['active'] ? 'black' : '' }};"
                                        onmouseover="this.style.backgroundColor='black'; this.style.color='white';"
                                        onmouseout="this.style.backgroundColor='{{ $indicador['active'] ? 'black' : '' }}'; this.style.color='{{ $indicador['active'] ? 'white' : 'black' }}';">
                                        <span style="margin-left: 12px;"><b>{{ $indicador['name'] }}</b></span>
                                        <!-- Línea horizontal -->
                                    </a>

                                </li>
                            @endcanany
                        @endforeach
                    </ul>
                </li>
            @endcanany

            {{-- link externos --}}
            @canany($buttonExternos['can'])
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base  transition duration-75 rounded-lg group hover:bg-gray-100 hover:text-gray-900 text-white "
                        aria-controls="dropdown-externos" data-collapse-toggle="dropdown-externos">
                        <i class="fa-solid fa-plug">
                            <path
                                d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                        </i>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">App Externas</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-externos" class="hidden py-2 space-y-2">
                        @foreach ($externos as $externo)
                            <li>
                                <a href="{{ $externo['url'] }}" target="_blank"
                                    style="display: flex; align-items: center; padding: 8px; border-radius: 8px; text-decoration: none; color: {{ $externo['active'] ? 'white' : 'black' }}; background-color: {{ $externo['active'] ? 'black' : '' }};"
                                    onmouseover="this.style.backgroundColor='black'; this.style.color='white';"
                                    onmouseout="this.style.backgroundColor='{{ $externo['active'] ? 'black' : '' }}'; this.style.color='{{ $externo['active'] ? 'white' : 'black' }}';">
                                    <span style="margin-left: 12px;"><b>{{ $externo['name'] }}</b></span>
                                    <!-- Línea horizontal -->
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endcanany

            {{-- inventarios --}}
            @canany($buttonInventarios['can'])
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base  transition duration-75 rounded-lg group hover:bg-gray-100 hover:text-gray-900 text-white "
                        aria-controls="dropdown-inventario" data-collapse-toggle="dropdown-inventario">
                        <i class="fa-solid fa-desktop">
                            <path
                                d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                        </i>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Inventario Pc</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-inventario" class="hidden py-2 space-y-2">
                        @foreach ($inventarios as $inventario)
                            @canany($inventario['can'] ?? [null])
                                <li>
                                    <a href="{{ $inventario['url'] }}"
                                        style="display: flex; align-items: center; padding: 8px; border-radius: 8px; text-decoration: none; color: {{ $inventario['active'] ? 'white' : 'black' }}; background-color: {{ $inventario['active'] ? 'black' : '' }};"
                                        onmouseover="this.style.backgroundColor='black'; this.style.color='white';"
                                        onmouseout="this.style.backgroundColor='{{ $inventario['active'] ? 'black' : '' }}'; this.style.color='{{ $inventario['active'] ? 'white' : 'black' }}';">
                                        <span style="margin-left: 12px;"><b>{{ $inventario['name'] }}</b></span>
                                        <!-- Línea horizontal -->
                                    </a>
                                </li>
                            @endcanany
                        @endforeach
                    </ul>
                </li>
            @endcanany

            {{-- admin --}}
            @canany($buttonAdmin['can'])
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base  transition duration-75 rounded-lg group hover:bg-gray-100 hover:text-gray-900 text-white "
                        aria-controls="dropdown-admin" data-collapse-toggle="dropdown-admin">
                        <i class="fa-solid fa-unlock-keyhole">
                            <path
                                d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                        </i>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Admin</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-admin" class="hidden py-2 space-y-2">
                        @foreach ($superadmin as $admin)
                            @canany($admin['can'] ?? [null])
                                <li>
                                    <a href="{{ $admin['url'] }}"
                                        style="display: flex; align-items: center; padding: 8px; border-radius: 8px; text-decoration: none; color: {{ $admin['active'] ? 'white' : 'black' }}; background-color: {{ $admin['active'] ? 'black' : '' }};"
                                        onmouseover="this.style.backgroundColor='black'; this.style.color='white';"
                                        onmouseout="this.style.backgroundColor='{{ $admin['active'] ? 'black' : '' }}'; this.style.color='{{ $admin['active'] ? 'white' : 'black' }}';">
                                        <span style="margin-left: 12px;"><b>{{ $admin['name'] }}</b></span>
                                        <!-- Línea horizontal -->
                                    </a>
                                </li>
                            @endcanany
                        @endforeach
                    </ul>
                </li>
            @endcanany


            {{-- reportes gereles --}}
            @canany($buttonReportes['can'])
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base  transition duration-75 rounded-lg group hover:bg-gray-100 hover:text-gray-900 text-white "
                        aria-controls="dropdown-reportes" data-collapse-toggle="dropdown-reportes">
                        <i class="fa-regular fa-thumbs-down">
                            <path
                                d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                        </i>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Reportes</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-reportes" class="hidden py-2 space-y-2">
                        @foreach ($reportes as $reporte)
                            @canany($reporte['can'] ?? [null])
                                <li>
                                    <a href="{{ $reporte['url'] }}"
                                        style="display: flex; align-items: center; padding: 8px; border-radius: 8px; text-decoration: none; color: {{ $reporte['active'] ? 'white' : 'black' }}; background-color: {{ $reporte['active'] ? 'black' : '' }};"
                                        onmouseover="this.style.backgroundColor='black'; this.style.color='white';"
                                        onmouseout="this.style.backgroundColor='{{ $reporte['active'] ? 'black' : '' }}'; this.style.color='{{ $reporte['active'] ? 'white' : 'black' }}';">
                                        <span style="margin-left: 12px;"><b>{{ $reporte['name'] }}</b></span>
                                        <!-- Línea horizontal -->
                                    </a>
                                </li>
                            @endcanany
                        @endforeach
                    </ul>
                </li>
            @endcanany

            {{-- presmy --}}
            @canany($buttonPresmy['can'])
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base  transition duration-75 rounded-lg group hover:bg-gray-100 hover:text-gray-900 text-white "
                        aria-controls="dropdown-mipres" data-collapse-toggle="dropdown-mipres">
                        <i class="fa-brands fa-squarespace">
                            <path
                                d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                        </i>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Gestion Mipres</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-mipres" class="hidden py-2 space-y-2">
                        @foreach ($presmys as $presmy)
                            @canany($presmy['can'] ?? [null])
                                <li>
                                    <a href="{{ $presmy['url'] }}"
                                        style="display: flex; align-items: center; padding: 8px; border-radius: 8px; text-decoration: none; color: {{ $presmy['active'] ? 'white' : 'black' }}; background-color: {{ $presmy['active'] ? 'black' : '' }};"
                                        onmouseover="this.style.backgroundColor='black'; this.style.color='white';"
                                        onmouseout="this.style.backgroundColor='{{ $presmy['active'] ? 'black' : '' }}'; this.style.color='{{ $presmy['active'] ? 'white' : 'black' }}';">
                                        <span style="margin-left: 12px;"><b>{{ $presmy['name'] }}</b></span>
                                        <!-- Línea horizontal -->
                                    </a>
                                </li>
                            @endcanany
                        @endforeach

                    </ul>
                </li>
            @endcanany

            {{-- administracion --}}
            @canany($buttonAdministracion['can'])
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base  transition duration-75 rounded-lg group hover:bg-gray-100 hover:text-gray-900 text-white "
                        aria-controls="dropdown-administracion" data-collapse-toggle="dropdown-administracion">
                        <i class="fa-solid fa-puzzle-piece">
                            <path
                                d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                        </i>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Administracion</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-administracion" class="hidden py-2 space-y-2">
                        @foreach ($administraciones as $administracion)
                            @canany($administracion['can'] ?? [null])
                                <li>
                                    <a href="{{ $administracion['url'] }}"
                                        style="display: flex; align-items: center; padding: 8px; border-radius: 8px; text-decoration: none; color: {{ $administracion['active'] ? 'white' : 'black' }}; background-color: {{ $administracion['active'] ? 'black' : '' }};"
                                        onmouseover="this.style.backgroundColor='black'; this.style.color='white';"
                                        onmouseout="this.style.backgroundColor='{{ $administracion['active'] ? 'black' : '' }}'; this.style.color='{{ $administracion['active'] ? 'white' : 'black' }}';">
                                        <span style="margin-left: 12px;"><b>{{ $administracion['name'] }}</b></span>
                                        <!-- Línea horizontal -->
                                    </a>
                                </li>
                            @endcanany
                        @endforeach

                    </ul>
                </li>
            @endcanany

            {{-- regentes --}}
            @canany($buttonRegentes['can'])
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base  transition duration-75 rounded-lg group hover:bg-gray-100 hover:text-gray-900 text-white "
                        aria-controls="dropdown-regentes" data-collapse-toggle="dropdown-regentes">
                        <i class="fa-solid fa-khanda">
                            <path
                                d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                        </i>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Admin Regentes</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-regentes" class="hidden py-2 space-y-2">
                        @foreach ($regentes as $regente)
                            @canany($regente['can'] ?? [null])
                                <li>
                                    <a href="{{ $regente['url'] }}"
                                        style="display: flex; align-items: center; padding: 8px; border-radius: 8px; text-decoration: none; color: {{ $regente['active'] ? 'white' : 'black' }}; background-color: {{ $regente['active'] ? 'black' : '' }};"
                                        onmouseover="this.style.backgroundColor='black'; this.style.color='white';"
                                        onmouseout="this.style.backgroundColor='{{ $regente['active'] ? 'black' : '' }}'; this.style.color='{{ $regente['active'] ? 'white' : 'black' }}';">
                                        <span style="margin-left: 12px;"><b>{{ $regente['name'] }}</b></span>
                                        <!-- Línea horizontal -->
                                    </a>
                                </li>
                            @endcanany
                        @endforeach

                    </ul>
                </li>
            @endcanany

            {{-- Novedades personal huv --}}
            @canany($buttonNovedadesHuv['can'])
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base  transition duration-75 rounded-lg group hover:bg-gray-100 hover:text-gray-900 text-white "
                        aria-controls="dropdown-novedadesHuv" data-collapse-toggle="dropdown-novedadesHuv">
                        <i class="fa-solid fa-bell">
                            <path
                                d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                        </i>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Novedades Personal</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-novedadesHuv" class="hidden py-2 space-y-2">
                        @foreach ($novedadesHuvs as $novedadesHuv)
                            @canany($novedadesHuv['can'] ?? [null])
                                <li>
                                    <a href="{{ $novedadesHuv['url'] }}"
                                        style="display: flex; align-items: center; padding: 8px; border-radius: 8px; text-decoration: none; color: {{ $novedadesHuv['active'] ? 'white' : 'black' }}; background-color: {{ $novedadesHuv['active'] ? 'black' : '' }};"
                                        onmouseover="this.style.backgroundColor='black'; this.style.color='white';"
                                        onmouseout="this.style.backgroundColor='{{ $novedadesHuv['active'] ? 'black' : '' }}'; this.style.color='{{ $novedadesHuv['active'] ? 'white' : 'black' }}';">
                                        <span style="margin-left: 12px;"><b>{{ $novedadesHuv['name'] }}</b></span>
                                        <!-- Línea horizontal -->
                                    </a>
                                </li>
                            @endcanany
                        @endforeach

                    </ul>
                </li>
            @endcanany

            {{-- tikes problemas --}}
            @canany($buttonTikes['can'])
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base  transition duration-75 rounded-lg group hover:bg-gray-100 hover:text-gray-900 text-white "
                        aria-controls="dropdown-tikesProblemas" data-collapse-toggle="dropdown-tikesProblemas">
                        <i class="fa-brands fa-slack">
                            <path
                                d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                        </i>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Tickets</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-tikesProblemas" class="hidden py-2 space-y-2">
                        @foreach ($Tikes as $Tike)
                            @canany($Tike['can'] ?? [null])
                                <li>
                                    <a href="{{ $Tike['url'] }}"
                                        style="display: flex; align-items: center; padding: 8px; border-radius: 8px; text-decoration: none; color: {{ $Tike['active'] ? 'white' : 'black' }}; background-color: {{ $Tike['active'] ? 'black' : '' }};"
                                        onmouseover="this.style.backgroundColor='black'; this.style.color='white';"
                                        onmouseout="this.style.backgroundColor='{{ $Tike['active'] ? 'black' : '' }}'; this.style.color='{{ $Tike['active'] ? 'white' : 'black' }}';">
                                        <span style="margin-left: 12px;"><b>{{ $Tike['name'] }}</b></span>
                                        <!-- Línea horizontal -->
                                    </a>
                                </li>
                            @endcanany
                        @endforeach

                    </ul>
                </li>
            @endcanany

            {{-- link normales --}}
            @foreach ($links as $link)
                @canany($link['can'] ?? [null])
                    <li id="linkNormales">
                        <a href="{{ $link['url'] }}"
                            class="flex items-center p-2  rounded-lg  group  {{ $link['active'] ? 'bg-red-700' : '' }}">
                            <i class="{{ $link['icon'] }}"></i>
                            <span class="ms-3">{{ $link['name'] }}</span>
                        </a>
                    </li>
                @endcanany
            @endforeach

        </ul>
    </div>
</aside>

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('button[data-collapse-toggle]');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('aria-controls');
                    const targetMenu = document.getElementById(targetId);

                    if (targetMenu.classList.contains('hidden')) {
                        targetMenu.classList.remove('hidden');
                        setTimeout(() => {
                                targetMenu.classList.add('collapse',
                                    'show'); // Añade clases para mostrar
                            },
                            10
                        ); // Pequeña demora para permitir que se aplique la clase antes de mostrar
                    } else {
                        targetMenu.classList.remove(
                            'show'); // Remueve la clase show para iniciar la transición
                        targetMenu.addEventListener('transitionend', function() {
                            if (!targetMenu.classList.contains('show')) {
                                targetMenu.classList.add('hidden'); // Oculta el menú
                            }
                        }, {
                            once: true
                        });
                    }
                });
            });
        });
    </script>
@endpush
