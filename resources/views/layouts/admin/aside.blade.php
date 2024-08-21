@php
    $indicadores = [
         /*  error digitacios*/
        [
            'name' => 'Error Hallazgo',
            'url' => route('indicadores.create'),
            'active' => request()->routeIs('RregistrarIndicador.index'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'manejo_eventos',
        ],
        /* error en entrega */
        [
            'name' => 'Error Dispensación',
            'url' => route('Dispensado.create'),
            'active' => request()->routeIs('redvital.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'solicitud_usuarios_redvital',
        ],
        [
            /* error driver */
            'name' => 'Error Driver',
            'url' => route('vistamedica.index'),
            'active' => request()->routeIs('vistamedica.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'vista_medica',
        ],
        [
            /* vista medica */
            'name' => 'Entrega Incompleta',
            'url' => route('vistamedica.index'),
            'active' => request()->routeIs('vistamedica.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'vista_medica',
        ],
         /* solicitar usuarios redvital */
         [
            'name' => 'Costo Por Vencimiento',
            'url' => route('redvital.index'),
            'active' => request()->routeIs('redvital.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'solicitud_usuarios_redvital',
        ],
        [
            /* vista medica */
            'name' => 'Costo Por Averia',
            'url' => route('vistamedica.index'),
            'active' => request()->routeIs('vistamedica.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'vista_medica',
        ],
         /* solicitar usuarios redvital */
         [
            'name' => 'Recepcion Tecnica',
            'url' => route('redvital.index'),
            'active' => request()->routeIs('redvital.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'solicitud_usuarios_redvital',
        ],
        [
            /* vista medica */
            'name' => 'Conifabilidad Del Inventario',
            'url' => route('vistamedica.index'),
            'active' => request()->routeIs('vistamedica.*'),
            'icon' => 'fa-regular fa-circle',
            'can' => 'vista_medica',
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
         'name'=>'Solicitudes Permisos',
         'url'=>route('huvpermisos.index'),
         'active'=>request()->routeIs('huvpermisos.*'),
         'icon'=>'fa-solid fa-user-gear',
         'can'=>'solicitudes'
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
         'active'=>request()->routeIs('.*'),
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

        /* nuevos usuarios*/
        [
            'name' => 'Administrar Usuarios SB',
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

        /* reportes eventos*/
        [
            'name' => 'Reportar Inconformidad',
            'url' => route('reporte.create'),
            'active' => request()->routeIs('reporte.create'),
            'icon' => 'fa-regular fa-thumbs-down',
            'can' => 'reporte',
        ],
        /*  indicadores*/
        [
            'name' => 'Indicadores',
            'url' => route('indicadores.index'),
            'active' => request()->routeIs('indicadores.index'),
            'icon' => 'fa-solid fa-sitemap',
            'can' => 'manejo_eventos',
        ],
        /*  show indicadores*/
        [
            'name' => 'Administrar Indicadores',
            'url' => route('HomeGrafica.index'),
            'active' => request()->routeIs('HomeGrafica.*'),
            'icon' => 'fa-solid fa-chart-bar',
            'can' => 'manejo_eventos',
        ],
        /* show reportes eventos*/
        [
            'name' => 'Administrar Inconformidad',
            'url' => route('reporte.index'),
            'active' => request()->routeIs('reporte.index'),
            'icon' => 'fa-solid fa-circle-exclamation',
            'can' => 'show_de_reportes',
        ],
        /*  reportes eventos regentes*/
        [
            'name' => 'Reportes Inconformidad',
            'url' => route('reportes_regente.index'),
            'active' => request()->routeIs('reportes_regente.*'),
            'icon' => 'fa-regular fa-comments',
            'can' => 'manejo_eventos',
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

    li:hover{
        background: rgb(46, 62, 72);
        border-radius: 10px;
    }

    #subMenu:hover{
        width: 217px;
    }

</style>

<aside id="cta-button-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" 
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto  dark:bg-gray-50" style="background: #0b1f6d"> {{-- /* #09257f; */ --}}

        <ul class="space-y-2 font-medium">
            {{-- botton que activa el menu de los indicador --}}
            <li>
                <button type="button" id="subMenu" style="text-align: center; padding-right: 10px"
                 class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-red-500 dark:hover:bg-gray-700 group">
                    <i class="fa-solid fa-signal"></i>
                    <span class="ms-3 items-center"  >Indicadores</span>
                    <span class="ml-4"><i class="fa-solid fa-caret-down"></i></span>
                </button>
                <ul style="display: none;" id="sub_menu" class="space-y-2 font-medium">
                    @foreach ($indicadores as $indicador)
                    {{--  @canany($link['can'] ?? [null]) --}}
                    <li>
                        <a href="{{ $indicador['url'] }}" {{-- style="background: rgb(223, 39, 39); --}} 
                            class="flex items-center p-2 text-white rounded-lg dark:text-white hover:bg-red-500 dark:hover:bg-gray-700 group  {{ $indicador['active'] ? 'bg-blue-500' : '' }}">
                            <i class="{{ $indicador['icon'] }}"></i>
                            <span class="ms-3">{{ $indicador['name'] }}</span>
                        </a>
                    </li>
                    {{-- @endcanany  --}}
                    @endforeach
                </ul>                
            </li>

            @foreach ($links as $link)
                {{--  @canany($link['can'] ?? [null]) --}}
                <li>
                    <a id="super" href="{{ $link['url'] }}"
                        class="flex items-center p-2 text-white rounded-lg dark:text-white  dark:hover:bg-gray-700 group  {{ $link['active'] ? 'bg-red-500' : '' }}">
                        <i class="{{ $link['icon'] }}"></i>
                        <span class="ms-3">{{ $link['name'] }}</span>
                    </a>
                </li>
                {{-- @endcanany  --}}
            @endforeach
        </ul>
    </div>
</aside>

@push('js')
<script>
    /* vista */
    document.addEventListener('DOMContentLoaded', function() {
        var sub_menu = document.getElementById('sub_menu');
        var subMenu = document.getElementById('subMenu');

        subMenu.addEventListener('click', function() {
            sub_menu.style.display = 'block'; // mostrar el formulario
        });
    });
</script>
@endpush

 