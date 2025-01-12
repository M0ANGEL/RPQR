<x-app-layout>
    <form action="{{ route('novedades.store') }}" enctype="multipart/form-data" method="POST"
        class="bg-white rounded-lg p-6 shadow-lg">
        @csrf

        <h1 class="text-center mb-4" style="color: blue">
            <b>Reporte de novedades de <b>{{ $novedade->nombre_completo }}</b> </b>
        </h1>

        {{-- assd --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <x-label>Tipo de novedad</x-label>
                <x-input class="w-full" value="{{ $novedade->tipo_novedad }}" readonly />
            </div>
            <div>
                <x-label>Fecha Inicio</x-label>
                <x-input class="w-full" value="{{ $novedade->fecha_inicio }}" readonly />
            </div>
            <div>
                <x-label>Fecha Fin</x-label>
                <x-input class="w-full" value="{{ $novedade->fecha_final }}" readonly />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <x-label>Cargo </x-label>
                <x-input class="w-full" value="{{ $novedade->cargo }}" readonly />
            </div>
            <div>
                <x-label>Farmacia del personal</x-label>
                <x-input class="w-full" value="{{ $novedade->bodega }}" readonly />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <div>
                    <x-label>Nombre completo</x-label>
                    <x-input class="w-full" value="{{ $novedade->nombre_completo }}" readonly />
                </div>
            </div>
            <div>
                <div>
                    <x-label>Numero Cedula </x-label>
                    <x-input class="w-full" value="{{ $novedade->numero_cedula }}" readonly />
                </div>
            </div>
            <div class="mb-4">
                <x-label>Numero Telefono </x-label>
                <x-input class="w-full" value="{{ $novedade->numero_telefono }}" readonly />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <p>Descargar Archivos</p>
                <x-button>
                    <a href="{{ route('archivos.descargar', $novedade->id) }}" class="text-blue-600 underline">
                        Descargar
                    </a>
                </x-button>
            </div>
        </div>


        <div class="mb-4">
            <x-label>Descripción detallada de la novedad</x-label>
            <textarea cols="" rows="8"
                class="border w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                placeholder="Escribe la descripción (no obligatorio este campo)" readonly> 
             {{ $novedade->detalle }}
            </textarea>
        </div>
    </form>
</x-app-layout>
