<x-app-layout>

    <style>
        #marco {
            border: 2px solid #BDC3C7
        }

        #filas:hover {
            background: rgb(234, 242, 248)
        }
    </style>

    @if ($Copypartes->count())
        <div id="marco" class="relative overflow-x-auto" style="border-radius: 6px">
            <table class="w-full text-sm text-center rtl:text-right text-gray-800 dark:text-gray-800"
                style="border: rgb(172, 174, 175)">
                <thead class="text-xs text-gray-50 uppercase  dark:bg-gray-700 dark:text-white-400"
                    style="background: rgb(52, 73, 94);">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            FECHA CREACION
                        </th>
                        <th scope="col" class="px-6 py-3">
                            SERIAL
                        </th>
                        <th scope="col" class="px-6 py-3">
                            PROBLEMA
                        </th>
                        <th scope="col" class="px-6 py-3">
                            AREA
                        </th>
                        <th scope="col" class="px-6 py-3">
                            PISO
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ESTADO
                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Copypartes as $Copyparte)
                        <tr id="filas" class=" border-b  dark:border-gray-700" style="color: rgb(44, 62, 80)">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-50 whitespace-nowrap dark:text-white">
                                <b style="color: rgb(44, 62, 80)">{{ $Copyparte->id }}</b>
                            </th>
                            <td class="px-6 py-4 ">
                                <b style="color: rgb(44, 62, 80)">{{ $Copyparte->created_at }}</b>
                            </td>
                            <td class="px-6 py-4 ">
                                <b style="color: rgb(44, 62, 80)">{{ $Copyparte->serial }}</b>
                            </td>
                            <td class="px-6 py-4">
                                <b style="color: rgb(44, 62, 80)">{{ $Copyparte->problema }}</b>
                            </td>
                            <td class="px-6 py-4">
                                <b style="color: rgb(44, 62, 80)">{{ $Copyparte->area }}</b>
                            </td>
                            <td class="px-6 py-4">
                                <b style="color: rgb(44, 62, 80)">{{ $Copyparte->piso }}</b>
                            </td>

                            <td class="px-6 py-4">
                                @switch($Copyparte->estado)
                                    @case(1)
                                        <p
                                            style="color: rgb(255, 255, 255); background: red; border-radius: 10px; padding: 5px;">
                                            <b>PENDIENTE</b>
                                        </p>
                                    @break

                                    @case(2)
                                        <p
                                            style="color: rgb(242, 242, 242); background: rgb(0, 68, 255); border-radius: 10px;  padding: 5px;">
                                            <b>TECNICO EN CAMINO</b>
                                        </p>
                                    @break

                                    @default
                                @endswitch
                            </td>
                            <td class="px-6 py-4" style="color: rgb(5, 35, 59)">
                                <a href="{{ route('Copyparte.edit', $Copyparte) }}">
                                    <p style="background: green; padding: 5px; border-radius: 10px; color: white;">
                                        <b>VER</b>
                                    </p>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-8">
            {{ $Copypartes->links() }}
        </div>
    @else
        {{-- alert --}}
        <div class="mt-5  bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">No hay solicitudes pendientes.</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>
        </div>
    @endif

</x-app-layout>
