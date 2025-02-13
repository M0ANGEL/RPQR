<x-app-layout>

    <form action="{{ route('Copyparte.update', $Copyparte) }}" method="POST" class="bg-white rounded-lg p-6"
        style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1);"> {{-- /* Sombra del formulario */ --}}
        @csrf
        @method('PUT')

        <h1 style="color: blue; text-align: center; font-size: 17px;" class="mb-4"><b>Datos de la impresora</b></h1>
        <div class="mb-4">
            <x-label>Fecha de reporte</x-label>
            <x-input class="w-full" value="{{ $Copyparte->created_at }}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>Modelo de maquina</x-label>
            <x-input class="w-full" value="{{ $Copyparte->modelo }}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>Serial de maquina</x-label>
            <x-input class="w-full" value="{{ $Copyparte->serial }}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>Marca de maquina</x-label>
            <x-input class="w-full" value="{{ $Copyparte->marca }}" readonly required />
        </div>
        <h2 style="color: blue; text-align: center; font-size: 17px;" class="mb-4"><b>Ubicación</b></h2>
        <div class="mb-4">
            <x-label>Piso</x-label>
            <x-input class="w-full" value="{{ $Copyparte->piso }}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>Área</x-label>
            <x-input class="w-full" value="{{ $Copyparte->area }}" readonly />
        </div>

        <h2 style="color: blue; text-align: center; font-size: 17px;" class="mb-4"><b>Reporte</b></h2>
        <div class="mb-4">
            <x-label>Problema de la maquina</x-label>
            <x-input class="w-full" value="{{ $Copyparte->problema }}" readonly required />
        </div>

        @if ($Copyparte->problema === 'Codigo')
            <div class="mb-4">
                <x-label>Código</x-label>
                <x-input class="w-full" value="{{ $Copyparte->codigo }}" readonly required />
            </div>
        @endif

        <div class="mb-4">
            <input type="hidden" value="2" name="estado">
        </div>

        <div class="mb-4">
            <x-label>Descripción detallada del problema</x-label>
            <textarea cols="" rows="8"
                class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                placeholder="Escribe la descripción (no obligatorio este campo)" readonly>{{ $Copyparte->descripcion }}</textarea>
        </div>

        <div class="flex justify-end">
            @switch($Copyparte->estado)
                @case(1)
                    <x-button style="background: blue;">
                        Confirmar Visita
                    </x-button>
                @break

                @case(2)
                    <x-button type="button" style="background: rgb(9, 111, 21);" onclick="event.preventDefault(); update();">
                        Visita Realizada
                    </x-button>
                @break

                @default
            @endswitch
        </div>
    </form>

    <form action="{{ route('Copyparte.update', $Copyparte) }}" method="POST" id="termiando">
        @csrf
        @method('PUT')
        <input type="hidden" value="3" name="estado">
    </form>

    @push('js')
        <script>
            function update() {
                const form = document.getElementById('termiando');
                form.submit();
            }
        </script>
    @endpush
</x-app-layout>
