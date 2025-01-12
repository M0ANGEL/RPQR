<x-app-layout>
    <form action="{{ route('Tikes.update', $Tike) }}" method="POST" class="bg-white rounded-lg p-6 shadow-lg">
        @csrf
        @method('PUT')
        <h1 class="text-center mb-4" style="color: blue">
            <b>Informacion detallada <br> Ticket {{ $Tike->numero_tike }} </b>
        </h1>

        {{-- assd --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <x-label>Categoria</x-label>
                <x-input class="w-full" value="{{ $Tike->categoria }}" readonly />
            </div>
            <div>
                <x-label>Sub categoria</x-label>
                <x-input class="w-full" value="{{ $Tike->subcategoria }}" readonly />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <x-label>Ciudad</x-label>
                <x-input class="w-full" value="{{ $Tike->departamento }}" readonly />
            </div>
            <div>
                <x-label>Sedes</x-label>
                <x-input class="w-full" value="{{ $Tike->sede }}" readonly />
            </div>
            <div>
                <x-label>Area</x-label>
                <x-input class="w-full" value="{{ $Tike->area }}" readonly />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <x-button>
                    <a href="nada">Descargar Archivos</a>
                </x-button>
            </div>
        </div>

        <div class="mb-4">
            <x-label>Descripción detallada del requerimiento</x-label>
            <textarea id="descripcion" cols="" rows="5"
                class="border w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" readonly>{{ $Tike->detalle }}</textarea>
        </div>

        @switch($Tike->estado)
            @case(0)
            @case(1)
                <div class="flex justify-end ">
                    <h4 style="background: blue; border-radius: 9px; padding: 6px; color: white">Tike En Proceso ...</h4>
                </div>
            @break

            @case(2)
                <h4>Califica el servicio prestado, nos ayudas mucho a mejorar, gracias.</h4>
                <div class="flex justify-center items-center space-x-4">
                    <div class="mr-4">
                        <x-select name="calificacion">
                            <option value="5"> ⭐ ⭐ ⭐ ⭐ ⭐ </option>
                            <option value="4"> ⭐ ⭐ ⭐ ⭐ </option>
                            <option value="3"> ⭐ ⭐ ⭐ </option>
                            <option value="2"> ⭐ ⭐ </option>
                            <option value="1"> ⭐ </option>
                        </x-select>
                    </div>
                    <input hidden name="estado" value="3">
                    <div>
                        <x-button style="background: blue;">
                            Confirmar Calificacion
                        </x-button>
                    </div>
                </div>
            @break

            @default
        @endswitch
    </form>
</x-app-layout>
