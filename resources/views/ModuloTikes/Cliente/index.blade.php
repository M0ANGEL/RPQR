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
        <a style="background-color: rgb(8, 35, 99)"
            class="inline-flex items-center px-4 mr-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
            href="{{ route('Tikes.cerrados') }}">TICKETS CERRADOS</a>
        <a style="background-color: rgb(60, 94, 10)"
            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
            href="{{ route('Tikes.create') }}">CREAR TICKET </a>
    </div>


    {{-- barra buscar --}}
    {{--  <form action="{{ route('novedades.index') }}" method="get">
        <div class="buscar">
            <input class="barra" type="text" name="text" value="{{ $busqueda }}" />
            <input class="btn-buscar" type="submit" value="Buscar">
        </div>
    </form> --}}

    <div id="marco" class="relative overflow-x-auto" style="border-radius: 6px">
        <table class="w-full text-sm text-center rtl:text-right text-gray-800 dark:text-gray-800"
            style="border: rgb(172, 174, 175)">
            <thead class="text-xs text-gray-50 uppercase  dark:bg-gray-700 dark:text-white-400"
                style="background: rgb(52, 73, 94);">
                <tr>
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
                        Numero del ticket
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Revisar | Calificar
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tikes as $Tike)
                    <tr id="filas" class=" border-b  dark:border-gray-700" style="color: rgb(44, 62, 80)">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-50 whitespace-nowrap dark:text-white">
                            <b style="color: rgb(44, 62, 80)">{{ $Tike->created_at }}</b>
                        </th>
                        <td class="px-6 py-4 ">
                            <b style="color: rgb(44, 62, 80)">{{ $Tike->categoria }}</b>
                        </td>
                        <td class="px-6 py-4">
                            <b style="color: rgb(44, 62, 80)">{{ $Tike->subcategoria }}</b>
                        </td>
                        <td class="px-6 py-4">
                            <b style="color: rgb(44, 62, 80)">{{ $Tike->numero_tike }}</b>
                        </td>
                        @switch($Tike->estado)
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

                            @case(2)
                                <td class="px-6 py-4">
                                    <b
                                        style="background: rgb(4, 167, 17); border-radius: 10px; padding: 6px; color: white;">REALIZADO</b>
                                </td>
                            @break

                            @default
                                <P>NN</P>
                        @endswitch
                        @switch($Tike->estado)
                            @case(0)
                            @case(1)
                                <td class="px-6 py-4 ">
                                    <a href="{{ route('Tikes.edit', $Tike) }}"
                                        style="background: rgb(164, 196, 4); border-radius: 10px; padding: 6px; color: rgb(5, 5, 5);">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>
                                </td>
                            @break

                            @case(2)
                                <td class="px-6 py-4 ">
                                    <a href="{{ route('Tikes.edit', $Tike) }}"
                                        style="background: rgb(164, 196, 4); border-radius: 10px; padding: 6px; color: rgb(5, 5, 5);">
                                        <i class="fa-regular fa-star"></i>
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
    <div class="mt-8">
        {{ $tikes->links() }}
    </div>
</x-app-layout>
