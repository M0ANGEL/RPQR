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
        <a style="background-color: rgb(60, 94, 10)"
            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
            href="{{ route('novedades.create') }}">REPORTAR NOVEDAD</a>
    </div>


    {{-- barra buscar --}}
    <form action="{{ route('novedades.index') }}" method="get">
        <div class="buscar">
            <input class="barra" type="text" name="text" value="{{ $busqueda }}" />
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
                        Fecha Reporte
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tipo Novedad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre Completo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bodega
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cedula
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mas
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($novedades as $novedade)
                    <tr id="filas" class=" border-b  dark:border-gray-700" style="color: rgb(44, 62, 80)">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-50 whitespace-nowrap dark:text-white">
                            <b style="color: rgb(44, 62, 80)">{{ $novedade->created_at }}</b>
                        </th>
                        <td class="px-6 py-4 ">
                            <b style="color: rgb(44, 62, 80)">{{ $novedade->tipo_novedad }}</b>
                        </td>
                        <td class="px-6 py-4">
                            <b style="color: rgb(44, 62, 80)">{{ $novedade->nombre_completo }}</b>
                        </td>
                        <td class="px-6 py-4">
                            <b style="color: rgb(44, 62, 80)">{{ $novedade->bodega }}</b>
                        </td>
                        <td class="px-6 py-4">
                            <b style="color: rgb(44, 62, 80)">{{ $novedade->numero_cedula }}</b>
                        </td>
                        </td>
                        <td class="px-6 py-4" style="color: rgb(5, 35, 59)">
                            <a href="{{ route('novedades.show', $novedade) }}">
                                <p style="background: green; padding: 5px; border-radius: 10px; color: white;">
                                    <b>VER MAS</b>
                                </p>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-8">
        {{ $novedades->links() }}
    </div>
</x-app-layout>
