<x-app-layout>
    <form action="{{ route('novedades.store') }}" enctype="multipart/form-data" method="POST"
        class="bg-white rounded-lg p-6 shadow-lg">
        @csrf

        <h1 class="text-center mb-4" style="color: blue">
            <b>Reportes de novedades de personal</b>
        </h1>

        {{-- assd --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <x-label>Tipo de novedad</x-label>
                <x-select required class="w-full" name="tipo_novedad">
                    <option value="">Selecciona Novedad</option>
                    <option value="Licencia Maternidad">Licencia Maternidad</option>
                    <option value="Incapacidad">Incapacidad</option>
                    <option value="Calamidad Domestica">Calamidad Domestica</option>
                    <option value="Vacaciones">Vacaciones</option>
                    <option value="Permisos">Permisos</option>
                    <option value="Permisos">Permisos no pagos</option>
                    <option value="Permisos">Cambio de turno</option>
                    <option value="Suspensiones">Suspensiones</option>
                </x-select>
            </div>
            <div>
                <x-label>Fecha Inicio</x-label>
                <x-input class="w-full" name="fecha_inicio" type="date"
                    placeholder="Introduce el modelo de la impresora" />
            </div>
            <div>
                <x-label>Fecha Fin</x-label>
                <x-input class="w-full" name="fecha_final" type="date"
                    placeholder="Introduce el modelo de la impresora" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <x-label>Cargo </x-label>
                <x-select required class="w-full" name="cargo">
                    <option value="">Selecciona el cargo de la persona</option>
                    <option value="Patinador">Patinador</option>
                    <option value="Aux Farmacia">Aux Farmacia</option>
                    <option value="Aux Bodega">Aux Bodega</option>
                    <option value="Regente">Regente</option>
                    <option value="Quimico">Quimico</option>
                    <option value="Coordinador Calidad">Coordinador Calidad</option>
                    <option value="Sistemas">Sistemas</option>
                </x-select>
            </div>
            <div>
                <x-label>Farmacia del personal</x-label>
                <x-select required class="w-full" name="bodega">
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
                <div>
                    <x-label>Nombre completo</x-label>
                    <x-input class="w-full" name="nombre_completo" placeholder="Introduce el modelo del personal" />
                </div>
            </div>
            <div>
                <div>
                    <x-label>Numero Cedula </x-label>
                    <input type="text" required placeholder="Numero Cedula" name="numero_cedula"
                        class="border p-2 rounded w-full" pattern="[0-9]*" inputmode="numeric"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                </div>
            </div>
            <div class="mb-4">
                <x-label>Numero Telefono </x-label>
                <input type="text" required placeholder="Numero Telefono" name="numero_telefono"
                    class="border p-2 rounded w-full" pattern="[0-9]*" inputmode="numeric"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
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
            <x-label>Descripción detallada de la novedad</x-label>
            <textarea name="detalle" id="descripcion" cols="" rows="8"
                class="border w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                placeholder="Escribe la descripción (no obligatorio este campo)"></textarea>
        </div>

        <div class="flex justify-end">
            <x-button style="background: blue;">
                Enviar
            </x-button>
        </div>
    </form>
</x-app-layout>
