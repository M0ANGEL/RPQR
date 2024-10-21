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

            /*
        [
             error driver *
            'name' => 'Error Driver',
            'url' => route('vistamedica.index'),
            'active' => request()->routeIs('vistamedica.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'error_driver',
        ],

        [
            /* Entrega Incompleta 
            'name' => 'Entrega Incompleta',
            'url' => route('vistamedica.index'),
            'active' => request()->routeIs('.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'entrega_imcompleta',
        ],
         /* Costo Por Vencimientol 
         [
            'name' => 'Costo Por Vencimiento',
            'url' => route('redvital.index'),
            'active' => request()->routeIs('redvital.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'costo_vencimiento',
        ],
        [
            /* Costo Por Averia  *
            'name' => 'Costo Por Averia',
            'url' => route('vistamedica.index'),
            'active' => request()->routeIs('.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'costo_averias',
        ],
         /* Recepcion Tecnica*
         [
            'name' => 'Recepcion Tecnica',
            'url' => route('redvital.index'),
            'active' => request()->routeIs('redvital.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'recepcion_tecnica',
        ],
        [
            /* Conifabilidad Del Inventario 
            'name' => 'Confiabilidad Del Inventario',
            'url' => route('vistamedica.index'),
            'active' => request()->routeIs('.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'confiabilidad',
        ],*/
    ];

    $menuIndicadores = [
        'can' => 'menuIndicadores',
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
            'url' => route('users.index'),
            'active' => request()->routeIs('users.*b'),
            'icon' => 'fa-brands fa-medium',
            'can' => 'admin_usuarios',
        ],
          /*Equipos por area*/
          [
            'name' => 'Equipos por area',
            'url' => route('users.index'),
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
            'name'=>'Registro Vista Medica',
            'url'=>route('IngresoVistaMedica.index'),
            'active'=>request()->routeIs('IngresoVistaMedica.*'),
            'icon'=>'fa-brands fa-creative-commons-pd-alt',
            'can'=>'ingreso_vista_medica'
         
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
            'name'=>'Solicitudes Permisos Servinte',
            'url'=>route('huvpermisos.index'),
            'active'=>request()->routeIs('huvpermisos.*'),
            'icon'=>'fa-solid fa-user-gear',
            'can'=>'solicitudes'
        ],
             /* permisos de cambio huv */
             [
            'name'=>'Solicitudes Permisos Sebthi',
            'url'=>route('RedvitalPermisos.index'),
            'active'=>request()->routeIs('RedvitalPermisos.*'),
            'icon'=>'fa-solid fa-person-rays',
            'can'=>'solicitudes_redvital'
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
            'name'=>'Bodegas / Permisos',
            'url'=>route('gestion.index'),
            'active'=>request()->routeIs('pb.*'),
            'icon'=>'fa-solid fa-mug-saucer',
            'can'=>'pb'
        ],

        /* confirmar usuarios*/
        [
            'name' => 'Confirmaccion',
            'url' => route('confirmacion.index'),
            'active' => request()->routeIs('confirmacion.*'),
            'icon' => 'fa-solid fa-user-shield',
            'can' => 'confirmacion',
        ],

        /* reportes eventos*/
        [
            'name' => 'Reportar Inconformidad',
            'url' => route('reportar'),
            'active' => request()->routeIs('reportar.create'),
            'icon' => 'fa-regular fa-thumbs-down',
            'can' => 'reportar',
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
    #super:hover{
        background: rgb(26, 142, 219);
        border-radius: 10px;
    }

    .submenus_link{
        background: rgb(90, 40, 106);
        border-radius: 10px;
    }

    #subMenu:hover{
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
        max-height: 500px; /* Ajusta esto según la altura máxima esperada del submenú */
    }

    /* Estilos adicionales para los botones */
    #subMenu, #subMenuAdmin {
        cursor: pointer;
    }

        /* Sidebar Styles */
aside {
    width: 250px;
}

@media (max-width: 640px) {
    aside {
        width: 100%;
    }
}

/* Submenu Transition */
.submenu {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.5s ease;
}

.submenu.show {
    max-height: 500px;
}

/* Hover styles for items */
li:hover {
    background-color: #1a8edb;
    border-radius: 10px;
}

/* Toggle Button for Submenu */
#subMenu, #subMenuAdmin {
    cursor: pointer;
}


    

</style>

<aside id="cta-button-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" 
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-blue-900">

        <ul class="space-y-2 font-medium">
            {{-- Botón para activar el menú de indicadores --}}
            <li id="menuIndicadores">
                @canany($menuIndicadores['can'])
                <button type="button" id="subMenu" style="text-align: center; padding-right: 10px"
                class="flex items-center p-2 text-white rounded-lg hover:bg-red-500">
                    <i class="fa-solid fa-signal"></i>
                    <span class="ml-3">Indicadores</span>
                    <i class="ml-auto fa-solid fa-chevron-down"></i>
                </button>
                <ul class="submenu space-y-2">
                    @foreach ($indicadores as $indicador)
                    @can($indicador['can'])
                    <li class="{{ $indicador['active'] ? 'bg-blue-800' : '' }}">
                        <a href="{{ $indicador['url'] }}" class="flex items-center p-2 text-white rounded-lg hover:bg-blue-700">
                            <i class="{{ $indicador['icon'] }}"></i>
                            <span class="ml-3">{{ $indicador['name'] }}</span>
                        </a>
                    </li>
                    @endcan
                    @endforeach
                </ul>
                @endcanany
            </li>

            {{-- Botón para el menú de superadmin --}}
            <li id="menuSuperAdmin">
                <button type="button" id="subMenuAdmin" style="text-align: center; padding-right: 10px"
                class="flex items-center p-2 text-white rounded-lg hover:bg-red-500">
                    <i class="fa-solid fa-users"></i>
                    <span class="ml-3">Administrar Usuarios</span>
                    <i class="ml-auto fa-solid fa-chevron-down"></i>
                </button>
                <ul class="submenu space-y-2">
                    @foreach ($superadmin as $admin)
                    @can($admin['can'])
                    <li class="{{ $admin['active'] ? 'bg-blue-800' : '' }}">
                        <a href="{{ $admin['url'] }}" class="flex items-center p-2 text-white rounded-lg hover:bg-blue-700">
                            <i class="{{ $admin['icon'] }}"></i>
                            <span class="ml-3">{{ $admin['name'] }}</span>
                        </a>
                    </li>
                    @endcan
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
</aside>



@push('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
    /* indicadores */
    var subMenu = document.getElementById('subMenu'); //boton
    var subMenuAdmin = document.getElementById('subMenuAdmin'); //link
    /* admin */
    var subMenuList = document.getElementById('sub_menu'); //boton
    var subMenuAdminList = document.getElementById('sub_menu_admin'); //link
    /* inventrio */
    var subMenuInventario = document.getElementById('subMenuInventario'); //boton
    var inventario = document.getElementById('inventario'); //link
    /* indicadores */
    subMenu.addEventListener('click', function() {
        subMenuList.classList.toggle('show');//abre indicadores
        subMenuAdminList.classList.remove('show'); // Cierra el otro submenú si está abierto
        inventario.classList.remove('show'); //cierra inventarios
    });
    /* admin */
    subMenuAdmin.addEventListener('click', function() {
        subMenuAdminList.classList.toggle('show'); //abre admin
        inventario.classList.remove('show'); //cierra inventarios
        subMenuList.classList.remove('show'); // Cierra el otro submenú si está abierto indicadores
    });
    /* inventrio */
    subMenuInventario.addEventListener('click', function() {
        inventario.classList.toggle('show'); //abre inventarios
        subMenuList.classList.remove('show'); // Cierra el otro submenú si está abierto indicadores
        subMenuAdminList.classList.remove('show');// Cierra el otro submenú si está abierto admin
    });
});

</script>
@endpush

 