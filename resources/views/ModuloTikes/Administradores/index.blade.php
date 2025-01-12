<x-app-layout>

    <style>
        #marco {
            border: 2px solid #BDC3C7
        }

        #filas:hover {
            background: rgb(234, 242, 248)
        }

        /* busqueda */
        .buscar {
            margin: 0px 20%;
            margin-bottom: 30px;
        }

        .barra {
            width: 50%;
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
            padding: 10px;
            border-radius: 10px;
            font-size: 15px;
            background-color: aliceblue;
            border: 3px solid #111827;
            color: #111827;
        }

        #marco {
            border: 2px solid #BDC3C7;
        }

        #filas:hover {
            background: rgb(234, 242, 248);
        }
    </style>

    <div class="flex justify-end mb-4">
        <a style="background-color: rgb(23, 16, 165)"
            class="inline-flex items-center mr-4 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
            href="{{ route('TikectCalificados.index') }}">CALIFICADOS || FINALIZADOS</a>
        <a style="background-color: rgb(10, 94, 37)"
            class="inline-flex items-center px-4  mr-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
            href="{{ route('TikectPendientesCalificados.index') }}">PENDIENTES POR CALIFICAR</a>
    </div>

    <h1 class="text-white mb-4">Modulo Adminstracion De Ticket Sistemas</h1>

    {{-- barra buscar --}}
    <form action="{{ route('AdminTikes.index') }}" method="get">
        <div class="buscar">
            <input class="barra" type="text" name="text" placeholder="Buscar por número de ticket o categoría"
                value="{{ request('text') }}" />
            <input class="btn-buscar" type="submit" value="Buscar">
        </div>
    </form>


    <div id="marco" class="relative overflow-x-auto" style="border-radius: 6px">
        <table class="w-full text-sm text-center rtl:text-right text-gray-800 dark:text-gray-800"
            style="border: rgb(172, 174, 175)">
            <thead class="text-xs text-gray-50 uppercase  dark:bg-gray-700 dark:text-white-400"
                style="background: rgb(52, 73, 94);">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha del Reporte
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Categoria
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Sub Categoria
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Prioridad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Numero del ticket
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Sede
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cambiar area
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gestionar Ticket
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($TikesAdmi as $TikectActivo)
                    <tr id="filas" class=" border-b  dark:border-gray-700" style="color: rgb(44, 62, 80)">
                        {{-- id --}}
                        <th scope="row" class="px-6 py-4 font-medium text-gray-50 whitespace-nowrap dark:text-white">
                            <b style="color: rgb(44, 62, 80)">{{ $TikectActivo->id }}</b>
                        </th>
                        {{-- fecha de creacion --}}
                        <td class="px-6 py-4 ">
                            <b style="color: rgb(44, 62, 80)">{{ $TikectActivo->created_at }}</b>
                        </td>
                        {{-- categoria --}}
                        <td class="px-6 py-4 ">
                            <b style="color: rgb(44, 62, 80)">{{ $TikectActivo->categoria }}</b>
                        </td>
                        {{-- sun categoria --}}
                        <td class="px-6 py-4">
                            <b style="color: rgb(44, 62, 80)">{{ $TikectActivo->subcategoria }}</b>
                        </td>
                        {{-- prioridad --}}
                        @switch($TikectActivo->prioridad)
                            @case(1)
                                <td class="px-6 py-4" style="background: rgb(99, 132, 224); color: rgb(0, 0, 0);">
                                    <b>BAJA</b>
                                </td>
                            @break

                            @case(2)
                                <td class="px-6 py-4" style="background: rgb(99, 224, 103); color: rgb(0, 0, 0);">
                                    <b>MEDIA</b>
                                </td>
                            @break

                            @case(3)
                                <td class="px-6 py-4" style="background: rgb(224, 99, 99); color: rgb(0, 0, 0);">
                                    <b>ALTA</b>
                                </td>
                            @break

                            <td class="px-6 py-4">
                                <b>Revisar, sin prioridad</b>
                            </td>

                            @default
                        @endswitch
                        {{-- numero tike --}}
                        <td class="px-6 py-4">
                            <b style="color: rgb(44, 62, 80)">{{ $TikectActivo->numero_tike }}</b>
                        </td>
                        {{-- sede --}}
                        <td class="px-6 py-4">
                            <b style="color: rgb(44, 62, 80)">{{ $TikectActivo->sede }}</b>
                        </td>
                        {{-- estado del tike --}}
                        @switch($TikectActivo->estado)
                            @case(0)
                                <td class="px-6 py-4">
                                    <b style="background: red; border-radius: 10px; padding: 6px; color: white;">PENDIENTE</b>
                                </td>
                            @break

                            @case(1)
                                <td class="px-6 py-4">
                                    <b
                                        style="background: rgb(2, 77, 147); border-radius: 10px; padding: 6px; color: white;">GESTION</b>
                                </td>
                            @break

                            @default
                                <P>NN</P>
                        @endswitch
                        {{-- cambio de area --}}
                        @if ($TikectActivo->user_id === null)
                            <td>
                                <button>
                                    <a href="{{ route('CambiarArea.edit', $TikectActivo->id) }}">
                                        <p
                                            style="background: rgb(18, 33, 196); border-radius: 10px; padding: 6px; color: rgb(254, 254, 254);">
                                            <i class="fa-solid fa-rotate"></i>
                                            <span>Cambiar Areaa</span>
                                        </p>
                                    </a>
                                </button>
                            </td>
                        @else
                            @if ($TikectActivo->user->id === $MyId)
                                <td>
                                    <x-button disabled
                                        style="background: rgb(18, 33, 196); border-radius: 10px; padding: 6px; color: rgb(254, 254, 254);">
                                        <p>
                                            <i class="fa-solid fa-rotate"></i>
                                            <span>Liberar Para Cambiar Areaa</span>
                                        </p>
                                    </x-button>
                                </td>
                            @else
                                <td>
                                    <x-button disabled
                                        style="background: rgb(241, 225, 119); border-radius: 10px; padding: 6px; color: rgb(0, 0, 0);">
                                        <p>
                                            <i class="fa-solid fa-rotate"></i>
                                            <span>Liberarse Para Cambiar Areaa</span>
                                        </p>
                                    </x-button>
                                </td>
                            @endif
                        @endif
                        {{-- estado de la gestion del ticket --}}
                        @if ($TikectActivo->user_id === null)
                            {{-- si el estado del tke esta libre  --}}

                            @switch($TikectActivo->autorizacion)
                                @case(0)
                                    <td class="px-6 py-4 ">
                                        <button
                                            style="background: rgb(164, 196, 4); border-radius: 10px; padding: 6px; color: rgb(5, 5, 5);">
                                            <a href="{{ route('Activo.edit', $TikectActivo) }}">
                                                <i class="fa-regular fa-eye"></i>
                                                Ticket disponible
                                            </a>
                                        </button>
                                    </td>
                                @break

                                @case(1)
                                    <td class="px-6 py-4 ">
                                        <button
                                            style="background: rgb(224, 146, 155); border-radius: 10px; padding: 6px; color: rgb(165, 13, 13);">
                                            <a href="{{ route('Activo.edit', $TikectActivo) }}">
                                                <i class="fa-solid fa-x"></i>
                                                <b>Ticket disponible No Autorizado</b>
                                            </a>
                                        </button>
                                    </td>
                                @break

                                @case(2)
                                    <td class="px-6 py-4 ">
                                        <button
                                            style="background: rgb(152, 224, 146); border-radius: 10px; padding: 6px; color: rgb(0, 118, 57);">
                                            <a href="{{ route('Activo.edit', $TikectActivo) }}">
                                                <i class="fa-solid fa-check"></i>
                                                <b>Ticket disponible Autorizado</b>
                                            </a>
                                        </button>
                                    </td>
                                @break

                                @default
                            @endswitch
                        @else
                            @if ($TikectActivo->user->id === $MyId)
                                {{-- si el ticket esta en mi gestio y esta autrizado --}}

                                @switch($TikectActivo->autorizacion)
                                    @case(0)
                                    @break

                                    @case(1)
                                        <td class="px-6 py-4 ">
                                            <a href="{{ route('Activo.edit', $TikectActivo->id) }}">
                                                <p
                                                    style="background: rgb(2, 147, 55); border-radius: 10px; padding: 6px; color: white;">
                                                    <i class="fa-solid fa-clock-rotate-left"></i>
                                                    <span>Seguir en gestion
                                                        <span
                                                            style="background: rgb(219, 139, 139); border-radius: 10px; padding: 3px; color: rgb(133, 4, 4); text-align: center ">Requiere
                                                            Autorizacion
                                                        </span>
                                                    </span>
                                                </p>
                                            </a>
                                        </td>
                                    @break

                                    @case(2)
                                        <td class="px-6 py-4 ">
                                            <a href="{{ route('Activo.edit', $TikectActivo->id) }}">
                                                <p
                                                    style="background: rgb(2, 147, 55); border-radius: 10px; padding: 6px; color: white;">
                                                    <i class="fa-solid fa-clock-rotate-left"></i>
                                                    <span>Seguir en gestion
                                                        <span
                                                            style="background: rgb(146, 219, 144); border-radius: 10px; padding: 3px; color: rgb(0, 0, 0); text-align: center ">
                                                            Autorizado
                                                        </span>
                                                    </span>
                                                </p>
                                            </a>
                                        </td>
                                    @break

                                    @default
                                @endswitch
                            @else
                                @switch($TikectActivo->autorizacion)
                                    @case(0)
                                        <td class="px-6 py-4">
                                            <b style="color: rgb(44, 62, 80)">Ticket abierto por
                                                {{ $TikectActivo->user->name }}
                                            </b>
                                        </td>
                                    @break

                                    @case(1)
                                        <td class="px-6 py-4">
                                            <b>Ticket abierto por
                                                {{ $TikectActivo->user->name }} <span
                                                    style="background: rgb(235, 154, 154); padding: 5px; border-radius: 8px; color: rgb(92, 2, 2)">No
                                                    autorizado</span>
                                            </b>
                                        </td>
                                    @break

                                    @case(2)
                                        <td class="px-6 py-4">
                                            <b style="color: rgb(44, 62, 80)">Ticket abierto por
                                                {{ $TikectActivo->user->name }}
                                            </b>
                                            <span
                                                style="background: rgb(157, 235, 154); padding: 5px; border-radius: 8px; color: rgb(3, 84, 14)">
                                                autorizado
                                            </span>
                                        </td>
                                    @break

                                    @default
                                @endswitch
                            @endif
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-8">
        {{ $TikesAdmi->links() }}
    </div>
</x-app-layout>
