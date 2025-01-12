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

    {{-- <div class="flex justify-end mb-4">
        <a style="background-color: rgb(60, 94, 10)"
            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
            href="{{ route('Tikes.create') }}">CREAR CATEGORIA </a>
    </div> --}}

    <div class="flex justify-end">
        <button onclick=" VerFormCrear()"
            class=" mb-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
            style="background-color: rgb(60, 94, 10)">
            CREAR CATEGORIA

        </button>
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
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        prefijo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        creador
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Opciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr id="filas" class=" border-b  dark:border-gray-700" style="color: rgb(44, 62, 80)">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-50 whitespace-nowrap dark:text-white">
                            <b style="color: rgb(44, 62, 80)">{{ $categoria->id }}</b>
                        </th>
                        <td class="px-6 py-4 ">
                            <b style="color: rgb(44, 62, 80)">{{ $categoria->name }}</b>
                        </td>
                        <td class="px-6 py-4">
                            <b style="color: rgb(44, 62, 80)">{{ $categoria->prefijo }}</b>
                        </td>
                        <td class="px-6 py-4">
                            <b
                                style="color: rgb(44, 62, 80)">{{ $categoria->usuario_creo ? $categoria->usuario_creo : 'NO' }}</b>
                        </td>
                        <td class="px-6 py-4 ">
                            <a href="{{ route('categorias.edit', $categoria) }}" class="mr-4"
                                style="background: rgb(164, 196, 4); border-radius: 10px; padding: 6px; color: rgb(5, 5, 5);">
                                <i class="fa-regular fa-pen-to-square"></i>
                                <b>Editar</b>
                            </a>
                            @if ($categoria->estado === 2)
                                <a href="{{ route('EstadosCategoria.edit', $categoria) }}" class="mr-4"
                                    style="background: rgb(6, 44, 167); border-radius: 10px; padding: 6px; color: rgb(255, 248, 248);">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                    <b>Activar</b>
                                </a>
                            @else
                                <a href="{{ route('EstadosCategoria.edit', $categoria) }}" class="mr-4"
                                    style="background: rgb(236, 4, 39); border-radius: 10px; padding: 6px; color: rgb(0, 0, 0);">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                    <b>Inactivar</b>
                                </a>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-8">
        {{ $categorias->links() }}
    </div>

    {{-- validacion de error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif




    {{-- creacion misma vista --}}
    <form action="{{ route('categorias.store') }}" id="FormCreacionCategoria" style="display: none" method="POST"
        class="bg-white rounded-lg p-6 shadow-lg mt-4" id="CreacionCategoria">
        @csrf

        <h1 class="text-center mb-4" style="color: blue">
            <b>Creacion de categoria</b>
        </h1>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <x-label>Nombre </x-label>
                <x-input class="w-full" required name="name" placeholder="Sebthi, Impresoras ..." />
            </div>
            <div>
                <x-label>Prefijo</x-label>
                <x-input class="w-full" name="prefijo" placeholder="SEB, IMP ..." />

            </div>
        </div>

        <div class="flex justify-end">
            <x-button style="background: blue;">
                Crear Categoria
            </x-button>
        </div>
    </form>

    @push('js')
        <script>
            function VerFormCrear() {
                let VistaForm = document.getElementById('FormCreacionCategoria')
                VistaForm.style.display = 'block';
            }
        </script>
    @endpush
</x-app-layout>
