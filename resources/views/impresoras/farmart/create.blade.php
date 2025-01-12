<x-app-layout>
    <form action="{{ route('ReporteImpresora.store') }}" method="POST" class="bg-white rounded-lg p-6 shadow-lg">
        @csrf

        <h1 class="text-center mb-4" style="color: blue">
            <b>Reportes de novedades de impresoras</b>
        </h1>

        <!-- Selección de Letra de impresora -->
        <div class="mb-4">

        </div>
        {{-- assd --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <x-label>Letra de impresora</x-label>
                <x-select required class="w-full" id="letra" name="letra">
                    <option value="">Selecciona una letra</option>
                    <option value="A">A</option> {{-- bodega --}}
                    <option value="B">B</option> {{-- principal --}}
                    <option value="C">C</option> {{-- ventana --}}
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option> {{-- partos --}}
                    <option value="H">H</option> {{-- operaciones --}}
                    <option value="K">K</option> {{-- UCI --}}
                </x-select>
            </div>
            <div>
                <x-label>Modelo de la impresora</x-label>
                <x-input class="w-full" id="modelo" readonly name="modelo"
                    placeholder="Introduce el modelo de la impresora" />
            </div>
            <div>
                <x-label>Serial de la impresora</x-label>
                <x-input class="w-full" id="serial" readonly name="serial"
                    placeholder="Introduce el serial de la impresora" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <x-label>Marca de la impresora</x-label>
                <x-input class="w-full" id="marca" readonly name="marca"
                    placeholder="Introduce la marca de la impresora" />
            </div>
            <div>
                <x-label>Piso donde se encuentra la impresora</x-label>
                <x-select required class="w-full" id="piso" name="piso">
                    <option value="">Selecciona el piso</option>
                    <option value="1">1</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="6">6</option>
                </x-select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <x-label>Farmacia donde se encuentra la impresora</x-label>
                <x-select required class="w-full" id="farmacia" name="area">
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
            <div>
                <x-label>Problema con la impresora</x-label>
                <x-select required class="w-full" id="problema" name="problema">
                    <option value="">Selecciona el problema</option>
                    <option value="Ruido extraño">Ruido extraño</option>
                    <option value="Hojas en blanco">Hojas en blanco</option>
                    <option value="Hojas manchadas">Hojas manchadas</option>
                    <option value="Hojas cortadas">Hojas cortadas</option>
                    <option value="Hojas atascadas">Hojas atascadas</option>
                    <option value="Impresora no prende">Impresora no prende</option>
                    <option value="Codigo">Código</option>
                </x-select>
            </div>
            <div class="mb-4" id="codigoDiv" style="display: none;">
                <x-label>Código de problema</x-label>
                <x-input class="w-full" id="codigo" name="codigo" placeholder="Introduce el código" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <x-label for="foto">Subir Foto</x-label>
                <x-input type="file" class="w-full" id="foto" name="foto" />
            </div>
        </div>

        <input type="text" name="estado" value="1" hidden>

        <div class="mb-4">
            <x-label>Descripción detallada del problema</x-label>
            <textarea name="descripcion" id="descripcion" cols="" rows="8"
                class="border w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                placeholder="Escribe la descripción (no obligatorio este campo)"></textarea>
        </div>

        <div class="flex justify-end">
            <x-button style="background: blue;">
                Enviar
            </x-button>
        </div>
    </form>

    <script>
        // Datos de las impresoras según la letra seleccionada
        const impresoras = {
            A: {
                modelo: '5002',
                serial: 'W524LA00094',
                marca: 'RICOH'
            },
            B: {
                modelo: '4002',
                serial: 'W527L800795',
                marca: 'RICOH'
            },
            C: {
                modelo: '5002',
                serial: 'W524L501292',
                marca: 'ROCOH'
            },
            D: {
                modelo: '4002',
                serial: 'W524L900917',
                marca: 'RICOH'
            },
            E: {
                modelo: '4002',
                serial: 'W524L700216',
                marca: 'ROCOH'
            },
            F: {
                modelo: '5002',
                serial: 'W533L800554',
                marca: 'RICOH'
            },
            H: {
                modelo: '5002',
                serial: 'W534L200747',
                marca: 'ROCOH'
            },
            K: {
                modelo: '4002',
                serial: 'W524LB00767',
                marca: 'RICOH'
            }
        };

        // Escuchar cambios en la selección de "Letra de impresora"
        document.getElementById('letra').addEventListener('change', function() {
            const letraSeleccionada = this.value;
            if (impresoras[letraSeleccionada]) {
                document.getElementById('modelo').value = impresoras[letraSeleccionada].modelo;
                document.getElementById('serial').value = impresoras[letraSeleccionada].serial;
                document.getElementById('marca').value = impresoras[letraSeleccionada].marca;
            } else {
                document.getElementById('modelo').value = '';
                document.getElementById('serial').value = '';
                document.getElementById('marca').value = '';
            }
        });

        // Escuchar cambios en la selección de "Problema con la impresora"
        document.getElementById('problema').addEventListener('change', function() {
            const problemaSeleccionado = this.value;
            const codigoDiv = document.getElementById('codigoDiv');
            if (problemaSeleccionado === 'Codigo') {
                codigoDiv.style.display = 'block'; // Mostrar el input de código
            } else {
                codigoDiv.style.display = 'none'; // Ocultar el input de código
            }
        });
    </script>
</x-app-layout>
