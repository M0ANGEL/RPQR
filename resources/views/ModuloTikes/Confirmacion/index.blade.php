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

    <h4 style="color: white" class="mb-4"><b>Modulo De Autorizacion De Tickets</b></h4>


    {{-- barra buscar
    <form action="{{ route('novedades.index') }}" method="get">
        <div class="buscar">
            <input class="barra" type="text" name="text" placeholder="Buscar por numero de ticket o categoria"
                {{-- value="{{ $busqueda }}" -- />
            <input class="btn-buscar" type="submit" value="Buscar">
        </div>
    </form>
     --}}

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
                        Quien solicita
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Numero del ticket
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Sede
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Autorizar
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($TickestConfirmacion as $AutorizacionTicke)
                    <tr id="filas" class=" border-b  dark:border-gray-700" style="color: rgb(44, 62, 80)">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-50 whitespace-nowrap dark:text-white">
                            <b style="color: rgb(44, 62, 80)">{{ $AutorizacionTicke->id }}</b>
                        </th>
                        <td class="px-6 py-4 ">
                            <b style="color: rgb(44, 62, 80)">{{ $AutorizacionTicke->created_at }}</b>
                        </td>
                        <td class="px-6 py-4 ">
                            <b style="color: rgb(44, 62, 80)">{{ $AutorizacionTicke->categoria }}</b>
                        </td>
                        <td class="px-6 py-4">
                            <b style="color: rgb(44, 62, 80)">{{ $AutorizacionTicke->subcategoria }}</b>
                        </td>
                        <td class="px-6 py-4">
                            <b style="color: rgb(44, 62, 80)">{{ $AutorizacionTicke->usuario_reporta }}</b>
                        </td>
                        <td class="px-6 py-4">
                            <b style="color: rgb(44, 62, 80)">{{ $AutorizacionTicke->numero_tike }}</b>
                        </td>
                        <td class="px-6 py-4">
                            <b style="color: rgb(44, 62, 80)">{{ $AutorizacionTicke->sede }}</b>
                        </td>
                        <td class="px-6 py-4 ">
                            <a href="{{ route('AutorizacionTickes.edit', $AutorizacionTicke->id) }}">
                                <p
                                    style="background: rgb(2, 74, 147); border-radius: 10px; padding: 6px; color: white;">
                                    <i class="fa-solid fa-check"></i>
                                    <span>Confirmar</span>
                                </p>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-8">
        {{ $TickestConfirmacion->links() }}
    </div>
</x-app-layout>
