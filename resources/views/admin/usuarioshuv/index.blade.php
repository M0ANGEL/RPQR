<x-app-layout>
    <div class="flex justify-end mb-4">
        <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
            href="{{ route('huv.create') }}">CREAR SOLICITUD HUV</a>
    </div>

    <style>
        #marco {
            border: 2px solid #BDC3C7
        }

        #filas:hover {
            background: rgb(234, 242, 248)
        }
    </style>

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
                        Nombre
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Clonar V
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Clonar S
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Datos
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Editar
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr id="filas" class=" border-b  dark:border-gray-700" style="color: rgb(44, 62, 80)">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $usuario->id }}
                        </th>
                        <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                            {{ $usuario->name }}
                        </td>

                        <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                            {{ $usuario->usuario_clonar_huv }}
                        </td>

                        @switch($usuario->activo_servinte)
                            @case(0)
                                <td style="color: rgb(44, 62, 80)">
                                    <p style="color:rgb(0, 60, 255)"><b>En espera</b></p>
                                </td>
                            @break

                            @case(1)
                                <td style="color: rgb(44, 62, 80)">
                                    <p style="color:rgb(91, 151, 0)"><b>Realizado</b></p>
                                </td>
                            @break

                            @default
                        @endswitch

                        <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                            {{ $usuario->usuario_clonar_sebthi }}
                        </td>

                        @switch($usuario->activo_sebthi)
                            @case(0)
                                <td style="color: rgb(44, 62, 80)">
                                    <p style="color:rgb(0, 60, 255)"><b>En espera</b></p>
                                </td>
                            @break

                            @case(1)
                                <td style="color: rgb(44, 62, 80)">
                                    <p style="color:rgb(91, 151, 0)"><b>Realizado</b></p>
                                </td>
                            @break

                            @default
                        @endswitch

                        <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                            <a href="{{ route('huv.show', $usuario) }}">
                                <i class="fa-regular fa-eye"></i>
                            </a>
                        </td>

                        @switch($usuario->activo_servinte)
                            @case(0)
                                <td style="color: rgb(2, 92, 182)" class="px-6 py-4">
                                    <a href="{{ route('huv.edit', $usuario) }}">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                </td>
                            @break

                            @case(1)
                                <td style="color: rgb(9, 83, 47)" class="px-6 py-4">
                                    <a href="" onclick="estado()">
                                        <i class="fa-regular fa-pen-to-square"></i>
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
        {{ $usuarios->links() }}
    </div>


    <script>
        function estado() {
            alert('No se puede editar, el usuario ya fue creado');
        }
    </script>

</x-app-layout>
