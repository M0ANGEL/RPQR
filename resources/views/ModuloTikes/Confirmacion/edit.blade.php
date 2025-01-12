<x-app-layout>
    <div class="flex justify-end mb-4">
        <a style="background-color: rgb(23, 16, 165)"
            class="inline-flex items-center mr-4 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
            href="{{ route('AutorizacionTickes.index') }}">VOLVER</a>
    </div>
    <form action="{{ route('AutorizacionTickes.update', $AutorizacionTicke) }}" method="POST"
        class="bg-white rounded-lg p-6 shadow-lg">
        @csrf
        @method('PUT')
        <h1 class="text-center mb-4" style="color: blue">
            <b>Informacion detallada del<br> Ticket {{ $AutorizacionTicke->numero_tike }} </b>
        </h1>

        {{-- assd --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <x-label>Categoria</x-label>
                <x-input class="w-full" value="{{ $AutorizacionTicke->categoria }}" readonly />
            </div>
            <div>
                <x-label>Sub categoria</x-label>
                <x-input class="w-full" value="{{ $AutorizacionTicke->subcategoria }}" readonly />
            </div>
            <div>
                <x-label>Sedes</x-label>
                <x-input class="w-full" value="{{ $AutorizacionTicke->sede }}" readonly />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <x-label>Fecha de creacion ticket</x-label>
                <x-input class="w-full" value="{{ $AutorizacionTicke->created_at }}" readonly />
            </div>
            <div>
                <x-label>Usuario que crea el ticket</x-label>
                <x-input class="w-full" value="{{ $AutorizacionTicke->usuario_reporta }}" readonly />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <x-button>
                    <a href="nada">Descargar Archivos</a>
                </x-button>
            </div>
        </div>

        {{-- valor para confirmar --}}
        <input hidden value="2" name="autorizacion">


        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div class="mb-4">
                <x-label>Descripción detallada del requerimiento</x-label>
                <textarea id="descripcion" cols="" rows="4"
                    class="border w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" readonly>{{ $AutorizacionTicke->detalle }}</textarea>
            </div>

            <div class="mb-4">
                <x-label><b>Observacion de la autorizacion<span style="color: red"> 'No obligatorio'</span>
                    </b></x-label>
                <textarea name="respuesta_autorizacion" cols="" rows="4"
                    class="border w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    placeholder="Observacion de como se realizo el caso"></textarea>
            </div>
        </div>

        <input type="text" hidden name="autorizacion" value="2">



        <div class="flex justify-end mb-4">
            <x-button class="mr-4" style="background: green">
                Confirmar Autorizacion
            </x-button>
        </div>
    </form>

</x-app-layout>
