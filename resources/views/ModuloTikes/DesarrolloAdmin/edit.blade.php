<x-app-layout>
    <div class="flex justify-end mb-4">
        <a style="background-color: rgb(23, 16, 165)"
            class="inline-flex items-center mr-4 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
            href="{{ route('TicketsAdminDesarrollos.index') }}">VOLVER</a>
    </div>

    <form action="{{ route('TicketsAdminDesarrollos.update', $TicketsAdminDesarrollo) }}" method="POST"
        class="bg-white rounded-lg p-6 shadow-lg">
        @csrf
        @method('PUT')
        <h1 class="text-center mb-4" style="color: blue">
            <b>Informacion detallada del<br> Ticket {{ $TicketsAdminDesarrollo->numero_tike }} </b>
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <x-label>Categoria</x-label>
                <x-input class="w-full" value="{{ $TicketsAdminDesarrollo->categoria }}" readonly />
            </div>
            <div>
                <x-label>Sub categoria</x-label>
                <x-input class="w-full" value="{{ $TicketsAdminDesarrollo->subcategoria }}" readonly />
            </div>
            <div>
                <x-label>Sedes</x-label>
                <x-input class="w-full" value="{{ $TicketsAdminDesarrollo->sede }}" readonly />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <x-label>Fecha de creacion ticket</x-label>
                <x-input class="w-full" value="{{ $TicketsAdminDesarrollo->created_at }}" readonly />
            </div>
            <div>
                <x-label>Usuario que crea el ticket</x-label>
                <x-input class="w-full" value="{{ $TicketsAdminDesarrollo->usuario_reporta }}" readonly />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <x-button>
                    <a href="nada">Descargar Archivos</a>
                </x-button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="mb-4">
                <x-label>Descripción detallada del requerimiento</x-label>
                <textarea id="descripcion" cols="" rows="4"
                    class="border w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" readonly>{{ $TicketsAdminDesarrollo->detalle }}</textarea>
            </div>
            {{-- si el ticket ya esta autorizado --}}
            @if ($TicketsAdminDesarrollo->autorizacion == 2)
                <div class="mb-4">
                    <x-label><b>Observacion del area encargada de autorizar</b></x-label>
                    <textarea name="respuesta" cols="" rows="4" readonly
                        class="border w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ $TicketsAdminDesarrollo->respuesta_autorizacion ? $TicketsAdminDesarrollo->respuesta_autorizacion : 'El ticket fue autorizado por el area encargada' }} </textarea>
                </div>
            @endif

            <div class="mb-4">
                <x-label><b>Observacion <span style="color: red">'No obligatorio'</span> </b></x-label>
                <textarea name="respuesta" cols="" rows="4"
                    class="border w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    placeholder="Observacion de como se realizo el caso"></textarea>
            </div>
        </div>

        <input type="text" hidden name="estado" value="2">

        {{-- estados del boton  --}}
        <div class="flex justify-end mb-4">
            <x-button type="button" class="mr-4" style="background: rgb(63, 0, 79)"
                onclick="envioFormularioLiberacion()">Liberar
                Ticket
            </x-button>
            @switch($TicketsAdminDesarrollo->autorizacion)
                @case(0)
                    <x-button class="mr-4" style="background: green">Tictek
                        realizado
                    </x-button>
                @break

                @case(1)
                    <x-button disabled class="mr-4"
                        style="background: rgb(218, 122, 122); color: rgb(0, 0, 0); border: 2px solid red;">El Tictek
                        necesita autorizacion
                    </x-button>
                @break

                @case(2)
                    <x-button class="mr-4" style="background: rgb(101, 200, 101);  color: rgb(7, 63, 3); ">
                        <b>Tictek realizado || Autroizado</b>
                    </x-button>
                @break

                @default
                    <x-button class="mr-4 bg-gray-400 text-gray-700">
                        No disponible
                    </x-button>
            @endswitch
        </div>
    </form>

    {{-- formulario para liberar el ticket --}}
    <form action="{{ route('disponibleDesarrollo.edit', $TicketsAdminDesarrollo) }}" method="POST" id="FormToken">
        @csrf
        @method('PUT')
        <input type="text" hidden name="estado" value="0">
        <input type="text" hidden name="user_id" value="">
    </form>

    @push('js')
        <script>
            function envioFormularioLiberacion() {
                let form = document.getElementById('FormToken');
                form.submit();
            }
        </script>
    @endpush
</x-app-layout>
