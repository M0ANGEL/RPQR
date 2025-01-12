<x-app-layout>
    <div class="container mx-auto p-2">
        <div class="bg-white  shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4 text-gray-900 ">Reporte De Impresora</h1>
            <form action="#" method="POST">
                @csrf
                @method('PUT')
                <h4 class="mt-4 mb-4"><b>Informacion del reporte / Ubicacion</b></h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label>Fecha de reporte </label>
                        <input type="text" class="border p-2 rounded w-full" value="{{ $Copyparte->created_at }}"
                            readonly>
                    </div>
                    <div class="flex-1">
                        <label>Piso</label>
                        <input type="text" class="border p-2 rounded w-full" value="{{ $Copyparte->piso }}" readonly>
                    </div>
                    <div class="flex-1">
                        <label>Area</label>
                        <input type="text" class="border p-2 rounded w-full" value="{{ $Copyparte->area }}" readonly>
                    </div>
                </div>
                <h4 class="mt-4 mb-4"><b>Informacion de la maquina</b></h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div class="flex-1">
                        <label>Marca de maquina</label>
                        <input type="text" class="border p-2 rounded w-full" value="{{ $Copyparte->marca }}"
                            readonly>
                    </div>

                    <div class="flex-1">
                        <label>Modelo de maquina</label>
                        <input type="text" class="border p-2 rounded w-full"value="{{ $Copyparte->modelo }}"
                            readonly>
                    </div>
                    <div class="flex-1">
                        <label>Serial de maquina</label>
                        <input type="text" class="border p-2 rounded w-full" value="{{ $Copyparte->serial }}"
                            readonly>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label>Problema</label>
                        <input type="text" class="border p-2 rounded w-full" value="{{ $Copyparte->problema }}"
                            readonly>
                    </div>
                    @if ($Copyparte->problema === 'Codigo')
                        <div class="mb-4">
                            <x-label>Código</x-label>
                            <x-input class="w-full" value="{{ $Copyparte->codigo }}" readonly required />
                        </div>
                    @endif
                </div>

                <div class="mb-4">
                    <x-label>Descripción detallada del problema</x-label>
                    <textarea cols="" rows="8"
                        class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        placeholder="Escribe la descripción (no obligatorio este campo)" readonly>{{ $Copyparte->descripcion }}</textarea>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
