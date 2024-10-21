<x-app-layout>
    <form id="dynamicForm" action="{{route('AdministrarAgotados.store')}}" method="POST" enctype="multipart/form-data" 
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1);"> 
        @csrf
        <div class="mb-4">
            <x-label>Descripción</x-label>
            <x-input name="descripcion" type="text" class="w-full mb-4" required/>
        </div>

        <div class="mb-4">
            <x-label>Cantidad</x-label>
            <select id="cantidad" class="w-full mb-4 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="" disabled selected>Seleccionar cantidad</option>
                @for($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <div id="dynamicFields">
            <!-- Aquí se generarán los campos repetidos dinámicamente -->
        </div>

        <div class="flex justify-end mt-4">
            <x-button type="submit">CREAR</x-button>
        </div>
    </form>  

    <script>
        document.getElementById('cantidad').addEventListener('change', function() {
            const cantidad = this.value;
            const dynamicFields = document.getElementById('dynamicFields');
            dynamicFields.innerHTML = ''; // Limpiar campos previos

            for (let i = 0; i < cantidad; i++) {
                const div = document.createElement('div');
                div.classList.add('dynamic-field');
                div.innerHTML = `
                    <div class="mb-4">
                        <x-label>Laboratorio</x-label>
                        <x-input name="marcas[]" type="text" class="w-full mb-4" required/>
                    </div>

                     <div class="mb-4">
                        <x-label>Tiene carta</x-label>
                        <select name="tiene_carta[]" class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                            <option value="0">No</option>
                            <option value="1">Si</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <x-label>Estado</x-label>
                        <select name="estados[]" class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                            <option value="0">Inactivo</option>
                            <option value="1">Activo</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <x-label>Observación</x-label>
                        <select name="estados_p[]" class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                            <option value="0">Agotado Parcial</option>
                            <option value="1">Agotado Completo</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <x-label>Fecha Estimada</x-label>
                        <x-input name="fechas_En[]" type="date" class="w-full mb-4" required/>
                    </div>

                    <div class="mb-4">
                        <x-label>Pdfs</x-label>
                        <x-input name="pdfs[]" type="file" class="w-full mb-4"/>
                    </div>

                    <div class="flex justify-end">
                        <x-button type="button" class="bg-red-500 text-white" onclick="removeField(this)">Eliminar</x-button>
                    </div>
                    <hr class="mb-4" style="background-color: black; height: 5px;"/>
                `;
                dynamicFields.appendChild(div);
            }
        });

        function removeField(button) {
            const fieldContainer = button.parentElement.parentElement;
            fieldContainer.remove();
        }
    </script>
</x-app-layout>
