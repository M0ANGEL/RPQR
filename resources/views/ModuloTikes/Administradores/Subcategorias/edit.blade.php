<x-app-layout>
    <form action="{{ route('subcategorias.update', $subcategoria) }}" method="POST"
        class="bg-white rounded-lg p-6 shadow-lg">
        @csrf
        @method('PUT')
        <h1 class="text-center mb-4" style="color: blue">
            <b>Editar Subcategoria</b>
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <x-label><b>Categoria</b></x-label>
                <x-select class="w-full" required name="_tikes_categorias_id">
                    @foreach ($Categorias as $Categoria)
                        <option value="{{ $Categoria->id }}"
                            {{ $Categoria->id == $subcategoria->_tikes_categorias_id ? 'selected' : '' }}>
                            {{ $Categoria->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>
            <div>
                <x-label><b>Nombre</b></x-label>
                <x-input class="w-full" required name="name" placeholder="Anulacion de documento"
                    value="{{ old('name', $subcategoria->name) }}" />
            </div>
            <div>
                <x-label><b>Prioridad</b></x-label>
                <x-select class="w-full" required name="prioridad">
                    <option value="" disabled>Selecione una prioridad para la subcategoria</option>
                    <option value="1" {{ $subcategoria->prioridad == 1 ? 'selected' : '' }}>BAJA</option>
                    <option value="2" {{ $subcategoria->prioridad == 2 ? 'selected' : '' }}>MEDIA</option>
                    <option value="3" {{ $subcategoria->prioridad == 3 ? 'selected' : '' }}>ALTA</option>
                </x-select>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <x-label><b>Area</b></x-label>
                <x-select class="w-full" required name="area">
                    <option value="0" {{ $subcategoria->area == 0 ? 'selected' : '' }}>SIS (Sistemas Ti)</option>
                    <option value="1" {{ $subcategoria->area == 1 ? 'selected' : '' }}>DES (Desarrollo)</option>
                </x-select>
            </div>
            <div>
                <x-label><b>Prioridad</b></x-label>
                <x-select class="w-full" required name="autorizacion">
                    <option value="0" {{ $subcategoria->autorizacion == 0 ? 'selected' : '' }}>NO</option>
                    <option value="1" {{ $subcategoria->autorizacion == 1 ? 'selected' : '' }}>SI</option>
                </x-select>
            </div>
        </div>

        <div class="flex justify-end">
            <x-button style="background: blue;">
                Actualizar Subcategoria
            </x-button>
        </div>
    </form>
</x-app-layout>
