<x-app-layout>
    <style>
        /* Estilos */
        .buscar {
            margin: 50px 0 50px 340px;
            margin-bottom: 30px;
        }

        .barra {
            width: 500px;
            border-radius: 10px;
            padding: 10px;
            border: solid 2px #111827;
        }

        .btn-buscar {
            padding: 10px;
            border-radius: 10px;
            font-size: 15px;
            background-color: #0f52e4;
            color: aliceblue;
        }

        .btn-buscar:hover {
            background-color: aliceblue;
            border: 3px solid #111827;
            color: #111827;
        }

        #marco {
            border: 2px solid #BDC3C7;
        }

        #filas:hover {
            background: rgb(183, 183, 183);
        }

        /* Línea vertical después de la descripción */
        .descripcion {
            border-right: 2px solid #002137; /* Línea vertical */
            padding-right: 10px; /* Espacio antes de la línea */
        }

        /* Línea horizontal al final del grupo */
        .last-row {
            border-bottom: 2px solid #002060; /* Línea horizontal */
        }

        #titulo_central {
            text-align: center;
            color: rgb(255, 255, 255);
            font-size: 25px;
            background: #111827;
            border-radius: 10px;
        }
    </style>

    <hr style="background-color: rgb(1, 61, 28); height: 3px;"> 
    <h1 id="titulo_central"><b>REPORTE DE MEDICAMENTOS AGOTADOS Y/O DESABASTECIDOS</b></h1>
    <hr style="background-color: rgb(1, 61, 28); height: 3px;"> 

    {{-- Barra de búsqueda --}}
    <form action="{{ route('agotados') }}" method="get">
        <div class="buscar">
            <input class="barra" type="text" name="text" value="{{ $busqueda }}" />
            <input class="btn-buscar" type="submit" value="Buscar">
        </div>
    </form>

    {{-- Tabla para mostrar datos --}}
    @if (count($datos) <= 0)
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">No hay registro para este código.</span>
        </div>
    @else
    <div id="marco" class="relative overflow-x-auto" style="border-radius: 6px">
        <table class="w-full text-sm text-center rtl:text-right text-gray-800 dark:text-gray-800" style="border: rgb(172, 174, 175);">
            <thead class="text-xs text-gray-50 uppercase dark:bg-gray-700 dark:text-white-400" style="background: rgb(52, 73, 94);">
                <tr>
                    <th scope="col" class="px-6 py-3">DESCRIPCION</th>
                    <th scope="col" class="px-6 py-3">MARCA</th>
                    <th scope="col" class="px-6 py-3">ESTADO</th>
                    <th scope="col" class="px-6 py-3">FECHA ESTIMADA</th>
                    <th scope="col" class="px-6 py-3">DOCUMENTO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $agotado)
                    <tr id="filas" class="border-b dark:border-gray-700" style="color: rgb(44, 62, 80);">
                        <td class="px-6 py-4"><b>{{ $agotado->descripcion }}</b></td>
                        <td class="px-6 py-4"><b>{{ $agotado->marca }}</b></td>

                        @switch($agotado->estado_p)
                            @case(0)
                                <td class="px-6 py-4"><b>Agotado Parcial</b></td>
                                @break
                            @case(1)
                                <td class="px-6 py-4"><b>Agotado Completo</b></td>
                                @break
                        @endswitch

                        <td class="px-6 py-4"><b>{{ $agotado->fecha_En }}</b></td>

                        @switch($agotado->tiene_carta)
                            @case(0)
                                <td><p style="background: red; color: white; border-radius: 10px;"><b>Sin Carta</b></p></td>
                                @break
                            @case(1)
                                <td class="px-6 py-4">
                                    <a href="{{ route('carta', $agotado->id) }}">
                                        <i class="fa-regular fa-file-pdf"></i>
                                    </a>
                                </td>
                                @break
                            @default
                        @endswitch
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <div class="mt-8">
        {{-- Parámetro para que la búsqueda siga --}}
        {{ $datos->appends(['text' => $busqueda])->links() }}
    </div>
</x-app-layout>



{{-- respa --}}

{{-- <x-app-layout>
    <style>
        /* Estilos */
        .buscar {
            margin: 50px 0 50px 340px;
            margin-bottom: 30px;
        }

        .barra {
            width: 500px;
            border-radius: 10px;
            padding: 10px;
            border: solid 2px #111827;
        }

        .btn-buscar {
            padding: 10px;
            border-radius: 10px;
            font-size: 15px;
            background-color: #0f52e4;
            color: aliceblue;
        }

        .btn-buscar:hover {
            background-color: aliceblue;
            border: 3px solid #111827;
            color: #111827;
        }

        #marco {
            border: 2px solid #BDC3C7;
        }

        #filas:hover {
            background: rgb(183, 183, 183);
        }

        /* Línea vertical después de la descripción */
        .descripcion {
            border-right: 2px solid #002137; /* Línea vertical */
            padding-right: 10px; /* Espacio antes de la línea */
        }

        /* Línea horizontal al final del grupo */
        .last-row {
            border-bottom: 2px solid #002060; /* Línea horizontal */
        }

        #titulo_central {
            text-align: center;
            color: rgb(255, 255, 255);
            font-size: 25px;
            background: #111827;
            border-radius: 10px;
        }
    </style>

    <hr style="background-color: rgb(1, 61, 28); height: 3px;"> 
    <h1 id="titulo_central"><b>REPORTE DE MEDICAMENTOS AGOTADOS Y/O DESABASTECIDOS</b></h1>
    <hr style="background-color: rgb(1, 61, 28); height: 3px;"> 

    {{-- Barra de búsqueda --}
    <form action="{{ route('agotados') }}" method="get">
        <div class="buscar">
            <input class="barra" type="text" name="text" value="{{ $busqueda }}" />
            <input class="btn-buscar" type="submit" value="Buscar">
        </div>
    </form>

    {{-- Tabla para mostrar datos --}
    @if (count($datos) <= 0)
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">No hay registro para este código.</span>
        </div>
    @else
    <div id="marco" class="relative overflow-x-auto" style="border-radius: 6px">
        <table class="w-full text-sm text-center rtl:text-right text-gray-800 dark:text-gray-800">
            <thead class="text-xs text-gray-50 uppercase dark:bg-gray-700 dark:text-white-400" style="background: rgb(52, 73, 94);">
                <tr>
                    <th scope="col" class="px-6 py-3">DESCRIPCION</th>
                    <th scope="col" class="px-6 py-3">MARCA</th>
                    <th scope="col" class="px-6 py-3">ESTADO</th>
                    <th scope="col" class="px-6 py-3">FECHA ESTIMADA</th>
                    <th scope="col" class="px-6 py-3">DOCUMENTO</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $currentDescripcion = null;
                    $rowCount = 0;
                    $counter = 0;
                @endphp
                @foreach ($datos as $agotado)
                    @if ($agotado->descripcion !== $currentDescripcion)
                        @php
                            $currentDescripcion = $agotado->descripcion;
                            $rowCount = $datos->where('descripcion', $agotado->descripcion)->count();
                            $counter = 1; // Reinicia el contador de filas

                            // Construcción del array $show dentro del bucle para acceder a $agotado
                            $show = [
                                'url' => route('carta', $agotado->id), // Asigna $agotado->id
                                'can' => 'carta',
                            ];
                        @endphp
                        <tr id="filas" class="border-b dark:border-gray-700" style="color: rgb(44, 62, 80)">
                            <th class="px-6 py-4 descripcion" rowspan="{{ $rowCount }}">
                                <b>{{ $agotado->descripcion }}</b>
                            </th>
                            <td class="px-6 py-4" style="color: rgb(44, 62, 80)">
                                <b>{{ $agotado->marca }}</b>
                            </td>
                            @switch($agotado->estado_p)
                                @case(0)
                                    <td class="px-6 py-4" style="color: rgb(44, 62, 80)">
                                        <b>Agotado Parcial</b>
                                    </td>
                                    @break
                                @case(1)
                                    <td class="px-6 py-4" style="color: rgb(44, 62, 80)">
                                        <b>Agotado Completo</b>
                                    </td>
                                    @break
                            @endswitch
                            <td class="px-6 py-4" style="color: rgb(44, 62, 80)">
                                <b>{{ $agotado->fecha_En }}</b>
                            </td>
                            @switch($agotado->tiene_carta)
                                @case(0)
                                    <td>
                                        <p style="background: red; color: white; border-radius: 10px;"><b>Sin Carta</b></p>
                                    </td>
                                    @break
                                @case(1)
                                    <td class="px-6 py-4">
                                        @canany($show['can'])
                                            <a href="{{ $show['url'] }}">
                                                <i class="fa-regular fa-file-pdf"></i>
                                            </a>
                                        @endcanany
                                    </td>
                                    @break
                                @default
                            @endswitch
                        </tr>
                    @else
                        @php
                            $counter++;
                        @endphp
                        <tr id="filas" class="border-b dark:border-gray-700 {{ $counter == $rowCount ? 'last-row' : '' }}" style="color: rgb(44, 62, 80); ">
                            <td class="px-6 py-4" style="color: rgb(44, 62, 80)">
                                <b>{{ $agotado->marca }}</b>
                            </td>
                            @switch($agotado->estado_p)
                                @case(0)
                                    <td class="px-6 py-4" style="color: rgb(44, 62, 80)">
                                        <b>Agotado Parcial</b>
                                    </td>
                                    @break
                                @case(1)
                                    <td class="px-6 py-4" style="color: rgb(44, 62, 80)">
                                        <b>Agotado Completo</b>
                                    </td>
                                    @break
                            @endswitch
                            <td class="px-6 py-4" style="color: rgb(44, 62, 80)">
                                <b>{{ $agotado->fecha_En }}</b>
                            </td>
                            @switch($agotado->tiene_carta)
                                @case(0)
                                    <td>
                                        <p style="background: red; color: white; border-radius: 10px;"><b>Sin Carta</b></p>
                                    </td>
                                    @break
                                @case(1)
                                    <td class="px-6 py-4">
                                        @canany($show['can'])
                                            <a href="{{ $show['url'] }}">
                                                <i class="fa-regular fa-file-pdf"></i>
                                            </a>
                                        @endcanany
                                    </td>
                                    @break
                                @default
                            @endswitch
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    <div class="mt-8">
        Parámetro para que la búsqueda siga --
        {{ $datos->appends(['text' => $busqueda])->links() }}
    </div>
</x-app-layout> --}}

