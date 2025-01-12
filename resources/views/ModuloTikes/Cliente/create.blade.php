<x-app-layout>
    <form action="{{ route('Tikes.store') }}" enctype="multipart/form-data" method="POST"
        class="bg-white rounded-lg p-6 shadow-lg">
        @csrf

        <h1 class="text-center mb-4" style="color: blue">
            <b>Creacion del ticket</b>
        </h1>

        {{-- assd --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <x-label>Categoria <span style="color: red; font-size: 20px">*</span> </x-label>
                <x-select required class="w-full" name="categoria" id="categoria">
                    <option value="">Selecciona una categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                    @endforeach
                </x-select>
            </div>
            <div>
                <x-label>Sub Categoria <span style="color: red; font-size: 20px">*</span></x-label>
                <x-select required class="w-full" name="subcategoria" id="subcategoria">
                    <option value="">Selecciona una subcategoría</option>
                </x-select>
            </div>
            <div>
                <x-label>Sede <span style="color: red; font-size: 20px">*</span> </x-label>
                <x-select required class="w-full" name="sede">
                    <option value="">SELECCIONE UNA SEDE</option>
                    <option value="HUV">HUV</option>
                    <option value="CAMBULOS">CAMBULOS</option>
                    <option value="SINERGIA">SINERGIA</option>
                </x-select>
            </div>
        </div>
        {{--
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
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
        --}}

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <label for="archivos" class="block text-sm font-medium text-gray-700">Adjuntar Archivos</label>
                <input type="file" class="w-full" name="archivos[]" id="archivos" multiple />
                <p class="text-sm text-gray-500 mt-2">Puedes subir múltiples archivos sin límite.</p>
            </div>
        </div>

        <div class="mb-4">
            <x-label>Descripción detallada del requerimiento</x-label>
            <textarea name="detalle" id="descripcion" cols="" required rows="4"
                class="border w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                placeholder="Escribe la descripción (este campo no es obligatorio)"></textarea>
        </div>

        <div class="flex justify-end">
            <x-button style="background: blue;">
                Crear Ticket
            </x-button>
        </div>
    </form>

    @push('js')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#categoria').change(function() {
                    const categoriaId = $(this).val();
                    const subcategoriaSelect = $('#subcategoria');
                    subcategoriaSelect.empty().append('<option value="">Cargando subcategorías...</option>');

                    if (categoriaId) {
                        $.ajax({
                            url: '{{ route('subcategoriasTodas') }}',
                            type: 'GET',
                            data: {
                                categoria_id: categoriaId
                            },
                            success: function(data) {
                                subcategoriaSelect.empty().append(
                                    '<option value="">Selecciona una subcategoría</option>');
                                data.forEach(function(subcategoria) {
                                    subcategoriaSelect.append(
                                        `<option value="${subcategoria.id}">${subcategoria.name}</option>`
                                    );
                                });
                            },
                            error: function() {
                                subcategoriaSelect.empty().append(
                                    '<option value="">Error al cargar subcategorías</option>');
                            }
                        });
                    } else {
                        subcategoriaSelect.empty().append(
                            '<option value="">Selecciona una categoría primero</option>');
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
