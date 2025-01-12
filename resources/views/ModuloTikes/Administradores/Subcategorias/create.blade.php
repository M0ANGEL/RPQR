<x-app-layout>
    <form action="{{ route('Tikes.store') }}" enctype="multipart/form-data" method="POST"
        class="bg-white rounded-lg p-6 shadow-lg">
        @csrf

        <h1 class="text-center mb-4" style="color: blue">
            <b>Creacion de ticket</b>
        </h1>

        {{-- assd --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <x-label>Categoria</x-label>
                <x-select required class="w-full" name="categoria">
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->name }} </option>
                    @endforeach

                </x-select>
            </div>
            <div>
                <x-label>Sub Categoria</x-label>
                <x-select required class="w-full" name="subcategoria">
                    @foreach ($subcategorias as $subcategoria)
                        <option value="{{ $subcategoria->name }}">{{ $subcategoria->name }} </option>
                    @endforeach

                </x-select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <x-label>Departamento </x-label>
                <x-select required class="w-full" name="departamento">
                    <option value="">Selecciona el departamento</option>
                    <option value="CALI">CALI</option>
                    <option value="BARRANQUILLA">BARRANQUILLA</option>
                </x-select>
            </div>
            <div>
                <x-label>Sede </x-label>
                <x-select required class="w-full" name="sede">
                    <option value="">Selecciona la farmacia</option>
                    <option value="HUV">HUV</option>
                    <option value="CAMBULOS">CAMBULOS</option>
                    <option value="SINERGIA">SINERGIA</option>
                </x-select>
            </div>
            <div>
                <x-label>Area</x-label>
                <x-select required class="w-full" name="area">
                    <option value="">Selecciona la farmacia</option>
                    <option value="BODEGA PRINCIPAL">BODEGA PRINCIPAL</option>
                    <option value="FARMACIA PRINCIPAL HUV">FARMACIA PRINCIPAL HUV</option>
                    <option value="URGENCIAS HUV">URGENCIAS HUV</option>
                    <option value="ALTO COSTO HUV">ALTO COSTO HUV</option>
                    <option value="UCI HUV">UCI HUV</option>
                    <option value="OPERACIONES HUV">OPERACIONES HUV</option>
                    <option value="PARTOS HUV">PARTOS HUV</option>
                </x-select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <label for="archivos" class="block text-sm font-medium text-gray-700">Adjuntar Archivos</label>
                <input type="file" class="w-full" name="archivos[]" id="archivos" multiple />
                <p class="text-sm text-gray-500 mt-2">Puedes subir múltiples archivos sin límite.</p>
            </div>
        </div>

        <div class="mb-4">
            <x-label>Descripción detallada del requerimiento</x-label>
            <textarea name="detalle" id="descripcion" cols="" rows="8"
                class="border w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                placeholder="Escribe la descripción (no obligatorio este campo)"></textarea>
        </div>

        <div class="flex justify-end">
            <x-button style="background: blue;">
                Crear Ticket
            </x-button>
        </div>
    </form>
</x-app-layout>
