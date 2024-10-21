<x-app-layout>
    <div class="flex justify-end mb-4">
        <x-button type="button">
            <a href="{{ route('cerrado.show', $reports) }}">CASOS CERRADOS</a>
        </x-button>
    </div>

    <style>
        #marco {
            border: 2px solid #BDC3C7;
        }

        #filas:hover {
            background: rgb(234, 242, 248);
        }
    </style>

    @if ($reports->count())
        <h1 class="text-center mb-4" style="color: blue"><b>REPORTES DE FARMACIA A SERVICIOS</b></h1>
        <div id="marco" class="relative overflow-x-auto" style="border-radius: 6px">
            <table class="w-full text-sm text-center rtl:text-right text-gray-800 dark:text-gray-800" style="border: rgb(172, 174, 175)">
                <thead class="text-xs text-gray-50 uppercase dark:bg-gray-700 dark:text-white-400" style="background: rgb(52, 73, 94);">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Fecha Creación</th>
                        <th scope="col" class="px-6 py-3">Servicio Redvital</th>
                        <th scope="col" class="px-6 py-3">Servicio HUV</th>
                        <th scope="col" class="px-6 py-3">Estado</th>
                        <th scope="col" class="px-6 py-3">Ver más</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $reporte)
                        <tr id="filas" class="border-b dark:border-gray-700" style="color: rgb(44, 62, 80)">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                {{ $reporte->id }}
                            </th>
                            <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                                {{ $reporte->created_at }}
                            </td>
                            <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                                {{ $reporte->redservicio }}
                            </td>
                            <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                                {{ $reporte->huvservicio }}
                            </td>
                            @switch($reporte->estado)
                                @case(0)
                                    <td><p style="color: rgb(146, 144, 8)"><b>PENDIENTE</b></p></td>
                                    @break
                                @case(1)
                                    <td><p style="color: aliceblue"><b>CERRADO</b></p></td>
                                    @break
                                @case(2)
                                    <td><p style="color: red"><b>RECHAZADO</b></p></td>
                                    @break
                                @case(3)
                                    <td><p style="color: rgb(50, 199, 75)"><b>ABIERTO</b></p></td>
                                    @break
                                @case(4)
                                    <td><p style="color: rgb(107, 234, 238)"><b>REALIZADO</b></p></td>
                                    @break
                                @default
                            @endswitch
                            <td class="px-6 py-4">
                                <a href="{{ route('reporte.edit', $reporte) }}">
                                    <i class="fa-regular fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-8">
            {{ $reports->links() }}
        </div>
    @else
        <div class="mt-5 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">No hay solicitudes pendientes.</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
    @endif
</x-app-layout>
