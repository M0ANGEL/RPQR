<x-app-layout>

    <form action="{{ route('AdministrarAgotados.update', $AdministrarAgotado) }}" method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-lg p-6"
          style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1);">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <x-label for="descripcion">Descripción</x-label>
            <x-input name="descripcion" value="{{ old('descripcion', $AdministrarAgotado->descripcion) }}" type="text" class="w-full mb-4"/>
        </div>
        <div class="mb-4">
            <x-label for="estado">Estado</x-label>
            <select name="estado" class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="0" {{ old('estado', $AdministrarAgotado->estado) == '0' ? 'selected' : '' }}>Inactivo</option>
                <option value="1" {{ old('estado', $AdministrarAgotado->estado) == '1' ? 'selected' : '' }}>Activo</option>
            </select>
        </div>
        <div class="mb-4">
            <x-label for="estado_p">Observación</x-label>
            <select name="estado_p" class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="0" {{ old('estado_p', $AdministrarAgotado->estado_p) == '0' ? 'selected' : '' }}>Agotado Parcial</option>
                <option value="1" {{ old('estado_p', $AdministrarAgotado->estado_p) == '1' ? 'selected' : '' }}>Agotado Completo</option>
            </select>
        </div>
        <div class="mb-4">
            <x-label for="marca">Laboratirio</x-label>
            <x-input name="marca" value="{{ old('marca', $AdministrarAgotado->marca) }}" type="text" class="w-full mb-4"/>
        </div>

        <div class="mb-4">
            <x-label for="tiene_carta">Tiene carta</x-label>
            <select name="tiene_carta" class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="0" {{ old('tiene_carta', $AdministrarAgotado->tiene_carta) == '0' ? 'selected' : '' }}>No</option>
                <option value="1" {{ old('tiene_carta', $AdministrarAgotado->tiene_carta) == '1' ? 'selected' : '' }}>Si</option>
            </select>
        </div>
        <div class="mb-4">
            <x-label for="fecha_En">Fecha Estimada</x-label>
            <x-input name="fecha_En" type="date" value="{{ old('fecha_En', $AdministrarAgotado->fecha_En) }}" class="w-full mb-4"/>
        </div>
        <div class="mb-4">
            <x-label for="pdfs">PDFs</x-label>
            <x-input name="pdfs" type="file" class="w-full mb-4"/>
            @if ($AdministrarAgotado->pdfs)
                <p>PDF actual cargado.</p>
                <a href="{{ route('AdministrarAgotados.show', $AdministrarAgotado) }}" target="_blank">Ver PDF</a>
            @endif
        </div>
  
        <div class="flex justify-end">
            <x-danger-button class="mr-2" onclick="deleteBodega()">
                Eliminar
            </x-danger-button>

            <x-button>
                Actualizar
            </x-button>
        </div>
    </form>

    {{-- Formulario para eliminar --}}
    <form action="{{ route('AdministrarAgotados.destroy', $AdministrarAgotado) }}" method="POST" id="formDelete">
        @csrf
        @method('DELETE')
    </form>

    @push('js')
        <script>
            function deleteBodega(){
                const form = document.getElementById('formDelete');
                form.submit();
            }
        </script>
    @endpush

</x-app-layout>
