@php
    $indicadores = [
        /*  error digitacios*/
        [
            'name' => 'Error Hallazgo',
            'url' => route('indicadores.create'),
            'active' => request()->routeIs('indicadores.index'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'hallazgos_indicador',
        ],
        /* error en entrega */
        [
            'name' => 'Error Dispensación',
            'url' => route('Dispensado.create'),
            'active' => request()->routeIs('Dispensado.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'dispensado_indicador',
        ],
        [
            /* pendientes  */
            'name' => 'Pendientes Huv',
            'url' => route('PenditesHuv.create'),
            'active' => request()->routeIs('PenditesHuv.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'PenditesHuv_indicador',
        ],

        [
            /* error driver **/
            'name' => 'Error Driver',
            'url' => route('vistamedica.index'),
            'active' => request()->routeIs('vistamedica.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'hallazgos_indicador',
        ],

        [
            /* Entrega Incompleta */
            'name' => 'Entrega Incompleta',
            'url' => route('vistamedica.index'),
            'active' => request()->routeIs('.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'hallazgos_indicador',
        ],
        /* Costo Por Vencimientol */
        [
            'name' => 'Costo Por Vencimiento',
            'url' => route('redvital.index'),
            'active' => request()->routeIs('redvital.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'hallazgos_indicador',
        ],
        [
            /* Costo Por Averia  */
            'name' => 'Costo Por Averia',
            'url' => route('vistamedica.index'),
            'active' => request()->routeIs('.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'hallazgos_indicador',
        ],
        /* Recepcion Tecnica*/
        [
            'name' => 'Recepcion Tecnica',
            'url' => route('redvital.index'),
            'active' => request()->routeIs('redvital.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'hallazgos_indicador',
        ],
        [
            /* Conifabilidad Del Inventario */
            'name' => 'Confiabilidad Del Inventario',
            'url' => route('vistamedica.index'),
            'active' => request()->routeIs('.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'hallazgos_indicador',
        ],
        [
            /* rotulacion */
            'name' => 'Confiabilidad Del Inventario',
            'url' => route('vistamedica.index'),
            'active' => request()->routeIs('.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'hallazgos_indicador',
        ],
        [
            /* total imcapacidades*/
            'name' => 'Confiabilidad Del Inventario',
            'url' => route('vistamedica.index'),
            'active' => request()->routeIs('.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'hallazgos_indicador',
        ],
        [
            /*  canasta */
            'name' => 'Confiabilidad Del Inventario',
            'url' => route('vistamedica.index'),
            'active' => request()->routeIs('.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'hallazgos_indicador',
        ],
    ];

    $admin = [
        'can' => 'gestionAdmin',
    ];

    $menuIndicadores = [
        'can' => 'menuIndicadores',
    ];

    $auditoriaMr = [
        'can' => 'GestionAuditoria',
    ];

    $sebthi = [
        'can' => 'sebthi',
    ];

    $auditorias = [
        /* nuevos usuarios*/
        [
            'name' => 'Cohortes',
            'url' => route('auditoria.index'),
            'active' => request()->routeIs('homeGestion.*'),
            'icon' => 'fa-solid fa-users',
            'can' => 'admin_usuarios',
        ],
        /* nuevas bodegas*/
        [
            'name' => 'Consulta Cohortes',
            'url' => route('bodegas.index'),
            'active' => request()->routeIs('bodegas.*'),
            'icon' => 'fa-solid fa-truck-ramp-box',
            'can' => 'crear_permisos',
        ],
        [
            'name' => 'Administrar',
            'url' => route('bodegas.index'),
            'active' => request()->routeIs('bodegas.*'),
            'icon' => 'fa-solid fa-truck-ramp-box',
            'can' => 'crear_permisos',
        ],
    ];

    $superadmin = [
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
            'can' => 'admin_usuarios',
        ],
        /* Retiros de equipos*/
        [
            'name' => 'Retiros de equipos',
            'url' => route('Inventarios_Retiros.index'),
            'active' => request()->routeIs('Inventarios_Retiros.*'),
            'icon' => 'fa-brands fa-medium',
            'can' => 'admin_usuarios',
        ],
        /*cambio de area*/
        [
            'name' => 'Cambio de area',
            'url' => route('Inventarios_Cambio_Area'),
            'active' => request()->routeIs('users.*c'),
            'icon' => 'fa-solid fa-layer-group',
            'can' => 'admin_usuarios',
        ],
    ];

    $links = [
        /* solicitar usuarios redvital */
        [
            'name' => 'Usuarios RedVital',
            'url' => route('redvital.index'),
            'active' => request()->routeIs('redvital.*'),
            'icon' => 'fa-solid fa-heart-pulse',
            'can' => 'solicitud_usuarios_redvital',
        ],
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
        /* permisos de cambio huv */
        [
            'name' => 'Solicitudes Permisos Sebthi',
            'url' => route('RedvitalPermisos.index'),
            'active' => request()->routeIs('RedvitalPermisos.*'),
            'icon' => 'fa-solid fa-person-rays',
            'can' => 'solicitudes_redvital',
        ],
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

        /* confirmar usuarios*/
        [
            'name' => 'Confirmaccion',
            'url' => route('confirmacion.index'),
            'active' => request()->routeIs('confirmacion.*'),
            'icon' => 'fa-solid fa-user-shield',
            'can' => 'confirmacion',
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
        /*  reportes eventos regentes*/
        [
            'name' => 'Reportes Inconformidad',
            'url' => route('reportes_regente.index'),
            'active' => request()->routeIs('reportes_regente.*'),
            'icon' => 'fa-regular fa-comments',
            'can' => 'manejo_eventos',
        ],

        /* cambiar contra*/
        [
            'name' => 'Cambiar Password',
            'url' => route('cambio.index'),
            'active' => request()->routeIs('cambio.*'),
            'icon' => 'fa-solid fa-unlock-keyhole',
        ],
    ];
@endphp


<style>
    #super:hover {
        background: rgb(219, 26, 32);
        border-radius: 10px;
    }


    .submenus_link {
        background: rgb(103, 1, 154);
        border-radius: 10px;
    }

    #subMenu:hover {
        width: 217px;
    }

    /* Estilos para el submenú con transición suave */
    .submenu {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.5s ease-out;
    }

    /* Clase para mostrar el submenú */
    .submenu.show {
        max-height: 500px;
        /* Ajusta esto según la altura máxima esperada del submenú */
    }


    /* Estilos adicionales para los botones */
    #subMenu,
    #subMenuAdmin {
        cursor: pointer;
    }
</style>

<aside id="cta-button-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto dark:bg-gray-50" style="background: rgb(0, 0, 0)/* #0b1f6d */;">

        <ul class="space-y-2 font-medium">

            @canany($sebthi['can'])
                <li style="background: rgb(133, 16, 149); border-radius: 7px;" class="no">
                    <a href="https://farmartltda-my.sharepoint.com/:f:/g/personal/soportehuv_farmartips_com/EtcBU2LGaitDhil9D1qo9E4BMvXBEDldtQuxF9wAchPeOg?e=abRvca"
                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-red-500 dark:hover:bg-gray-700 group "
                        target="_blank">
                        <i class="fa-solid fa-smog"></i>
                        <span class="ms-3" style="color: rgb(255, 255, 255);"><b>MR-AUTO GESTION</b></span>
                    </a>
                </li>
            @endcanany

            @canany($sebthi['can'])
                <li style="background: rgb(255, 200, 0); border-radius: 7px;" class="no">
                    <a href="https://farmartltda.com/sebthi/#/auth/login"
                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-red-500 dark:hover:bg-gray-700 group "
                        target="_blank">
                        <i class="fa-solid fa-plane"></i>
                        <span class="ms-3" style="color: black;"><b>Sebthi 3.0</b></span>
                    </a>
                </li>
            @endcanany

            @canany($sebthi['can'])
                <li style="background: rgb(21, 150, 62); border-radius: 7px;" class="no">
                    <a href="https://docs.google.com/spreadsheets/d/1F3zDgMTFkiuQNctEPG0ErliISP52HXVRlqScbv7Po-w/edit?gid=2084245675#gid=2084245675"
                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-red-500 dark:hover:bg-gray-700 group "
                        target="_blank">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span class="ms-3" style="color: black;"><b>Anexo 34</b></span>
                    </a>
                </li>
            @endcanany

            {{-- Botón para activar el menú de indicadores --}}
            <li>
                @canany($menuIndicadores['can'])
                    <button type="button" id="subMenu" style="text-align: center; padding-right: 10px"
                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-red-500 dark:hover:bg-gray-700 group">
                        <i class="fa-solid fa-signal"></i>
                        <span class="ms-3 items-center">Indicadores</span>
                        <span class="ml-4"><i class="fa-solid fa-caret-down"></i></span>
                    </button>
                @endcanany
                <ul id="sub_menu" class="submenu space-y-2 font-medium">
                    <div class="submenus_link">
                        @foreach ($indicadores as $indicador)
                            @canany($indicador['can'] ?? [null])
                                <li>
                                    <a href="{{ $indicador['url'] }}"
                                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-red-500 dark:hover:bg-gray-700 group {{ $indicador['active'] ? 'bg-blue-500' : '' }}">
                                        <i class="{{ $indicador['icon'] }}"></i>
                                        <span class="ms-3">{{ $indicador['name'] }}</span>
                                    </a>
                                </li>
                            @endcanany
                        @endforeach
                    </div>
                </ul>
            </li>

            {{-- Super admin --}}
            <li>
                @canany($admin['can'])
                    <button type="button" id="subMenuAdmin" style="text-align: center; padding-right: 10px"
                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-red-500 dark:hover:bg-gray-700 group">
                        <i class="fa-solid fa-unlock-keyhole"></i>
                        <span class="ms-3 items-center">Admin</span>
                        <span class="ml-4"><i class="fa-solid fa-caret-down"></i></span>
                    </button>
                @endcanany
                <ul id="sub_menu_admin" class="submenu space-y-2 font-medium">
                    <div class="submenus_link">
                        @foreach ($superadmin as $admin)
                            @canany($admin['can'] ?? [null])
                                <li>
                                    <a href="{{ $admin['url'] }}"
                                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-red-500 dark:hover:bg-gray-700 group {{ $admin['active'] ? 'bg-blue-500' : '' }}">
                                        <i class="{{ $admin['icon'] }}"></i>
                                        <span class="ms-3">{{ $admin['name'] }}</span>
                                    </a>
                                </li>
                            @endcanany
                        @endforeach
                    </div>
                </ul>
            </li>

            {{-- Super admin inventarios --}}
            <li>
                @canany($admin['can'])
                    <button type="button" id="subMenuInventario" style="text-align: center; padding-right: 10px"
                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-red-500 dark:hover:bg-gray-700 group">
                        <i class="fa-solid fa-desktop"></i>
                        <span class="ms-3 items-center">Inventarios PC</span>
                        <span class="ml-4"><i class="fa-solid fa-caret-down"></i></span>
                    </button>
                @endcanany
                <ul id="inventario" class="submenu space-y-2 font-medium">
                    <div class="submenus_link">
                        @foreach ($inventarios as $inventario)
                            @canany($inventario['can'] ?? [null])
                                <li>
                                    <a href="{{ $inventario['url'] }}"
                                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-red-500 dark:hover:bg-gray-700 group {{ $inventario['active'] ? 'bg-blue-500' : '' }}">
                                        <i class="{{ $inventario['icon'] }}"></i>
                                        <span class="ms-3">{{ $inventario['name'] }}</span>
                                    </a>
                                </li>
                            @endcanany
                        @endforeach
                    </div>
                </ul>
            </li>

            {{-- Super admin auditoria --}}
            <li>
                @canany($auditoriaMr['can'])
                    <button type="button" id="subMenuAuditoria" style="text-align: center; padding-right: 10px"
                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-red-500 dark:hover:bg-gray-700 group">
                        <i class="fa-solid fa-seedling"></i>
                        <span class="ms-3 items-center">Gestion Auditoria</span>
                        <span class="ml-4"><i class="fa-solid fa-caret-down"></i></span>
                    </button>
                @endcanany
                <ul id="Auditoria" class="submenu space-y-2 font-medium">
                    <div class="submenus_link">
                        @foreach ($auditorias as $auditoria)
                            @canany($auditoriaMr['can'] ?? [null])
                                <li>
                                    <a href="{{ $auditoria['url'] }}"
                                        class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-red-500 dark:hover:bg-gray-700 group {{ $inventario['active'] ? 'bg-blue-500' : '' }}">
                                        <i class="{{ $auditoria['icon'] }}"></i>
                                        <span class="ms-3">{{ $auditoria['name'] }}</span>
                                    </a>
                                </li>
                            @endcanany
                        @endforeach
                    </div>
                </ul>
            </li>

            @foreach ($links as $link)
                @canany($link['can'] ?? [null])
                    <li>
                        <a id="super" href="{{ $link['url'] }}"
                            class="flex items-center p-2 text-white rounded-lg dark:text-white dark:hover:bg-gray-700 group {{ $link['active'] ? 'bg-red-500' : '' }}">
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
            // Obtener elementos por sus IDs
            var subMenu = document.getElementById('subMenu'); //botón indicadores
            var subMenuList = document.getElementById('sub_menu'); //contenedor submenú indicadores
            var subMenuAdmin = document.getElementById('subMenuAdmin'); //botón admin
            var subMenuAdminList = document.getElementById('sub_menu_admin'); //contenedor submenú admin
            var subMenuInventario = document.getElementById('subMenuInventario'); //botón inventario
            var inventario = document.getElementById('inventario'); //contenedor submenú inventario
            var subMenuAuditoria = document.getElementById('subMenuAuditoria'); //botón auditoria
            var auditoria = document.getElementById('Auditoria'); //contenedor submenú auditoria

            // Función para cerrar todos los submenús
            function cerrarSubMenus() {
                subMenuList.classList.remove('show');
                subMenuAdminList.classList.remove('show');
                inventario.classList.remove('show');
                auditoria.classList.remove('show');
            }

            // Agregar eventos
            subMenu.addEventListener('click', function() {
                cerrarSubMenus();
                subMenuList.classList.toggle('show');
            });

            subMenuAdmin.addEventListener('click', function() {
                cerrarSubMenus();
                subMenuAdminList.classList.toggle('show');
            });

            subMenuInventario.addEventListener('click', function() {
                cerrarSubMenus();
                inventario.classList.toggle('show');
            });

            subMenuAuditoria.addEventListener('click', function() {
                cerrarSubMenus();
                auditoria.classList.toggle('show');
            });
        });
    </script>
@endpush
