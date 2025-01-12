<x-app-layout>
    <!-- component -->
    <div class="container mx-auto p-2">
        <div class="bg-white  shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4 text-gray-900 "><b>Solicitud Permisos Usuario</b></h1>
            <p class="text-gray-900  mb-6 text-center"><b>Datos del usuario principal</b> </p>
            <form action="{{ route('huvpermisos.update', $huvpermiso) }}" method="POST">
                @csrf
                @method('PUT') {{-- 35 --}}
                <div class="flex flex-wrap gap-4 mb-6">
                    <div>
                        <label>Nombre Completo</label>
                        <input type="text" value="{{ $huvpermiso->name }}" readonly class="border p-2 rounded w-full">
                    </div>
                    <div class="flex-1">
                        <label>Usuario Servinte</label>
                        <input type="text" class="border p-2 rounded w-full"
                            value="{{ $huvpermiso->usuario_servinte }}" readonly style="text-transform: lowercase;">
                    </div>
                    <div>
                        <label>Cedula</label>
                        <input type="text" value="{{ $huvpermiso->cedula }}" readonly
                            class="border p-2 rounded w-full">
                    </div>
                    {{-- cambio de estado --}}
                    <input type="hidden" name="estado_servinte" value="1">

                    {{-- verificacion si los perfiles etan en null --}}
                    @if ($huvpermiso->perfil != null)
                        <div class="flex-1">
                            <label>Perfil del usuario</label>
                            <input type="text" class="border p-2 rounded w-full" value="{{ $huvpermiso->perfil }}"
                                readonly style="text-transform: lowercase;">
                        </div>
                    @else
                        <div class="flex-1">
                            <label>Perfil del usuario</label>
                            <input type="text" class="border p-2 rounded w-full"
                                value="Creado antes de la migracion / sin perfil" readonly
                                style="text-transform: lowercase;">
                        </div>
                    @endif
                </div>

                <h4 class="mt-4 mb-4 text-center"><b>Requerimiento</b></h4>
                <div class="grid grid-cols-1 mt-4 md:grid-cols-3 gap-4 mb-4">
                    <div class="flex-1">
                        <label>Requerimiento</label>
                        <input type="text" value="{{ $huvpermiso->pb }}" readonly class="border p-2 rounded w-full">
                    </div>
                    @if ($huvpermiso->bodega_nueva != null)
                        <div class="flex-1">
                            <label>Bodega Nueva</label>
                            <input type="text" value="{{ $huvpermiso->bodega_nueva }}" readonly
                                class="border p-2 rounded w-full">
                        </div>
                    @endif
                </div>

                <h4 class="mt-4 mb-4 text-center"><b>Usuario Refencia</b></h4>

                <div class="grid mt-4 grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label>Usuario clonar</label>
                        <input type="text" value="{{ $huvpermiso->usuario_clonar_servinte }}" readonly
                            class="border p-2 rounded w-full">
                    </div>
                    <div class="flex-1">
                        <label>Numero Documento Usuario clonar</label>
                        <input type="text" value="{{ $huvpermiso->cedula_usuario_referencia }}" readonly
                            class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label>Regente que solicita</label>
                        <input type="text" value="{{ $huvpermiso->user->name }}" readonly
                            class="border p-2 rounded w-full">
                    </div>
                </div>
                <div class="mb-4">
                    <x-label>Motivo de la solicitud</x-label>
                    <textarea cols="" rows="5"
                        class="border w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" readonly>{{ $huvpermiso->reporte }}</textarea>
                </div>

                {{-- text area de rechazo --}}

                <div class="mb-4" id="descripcion" style="display: none;">
                    <hr style="border: solid 2px black; margin: 10px 20%">
                    <h4 class="text-center" style="color: red"><b>Rechazo de solicitud</b></h4>
                    <x-label>Motivo de rechazo</x-label>
                    <textarea id="textRechazo" cols="" rows="6"
                        class="border w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        placeholder="Escribe el motivo de su rechazo de la solicitud (no obligatorio este campo)"></textarea>
                </div>



                <div class="flex justify-end">

                    <x-button type="button" id="BotonRechazo" class="ml-4" style="background: rgb(180, 14, 14);">
                        <b>Rechazar permiso</b>
                    </x-button>
                    <x-button type="button" id="CancelarBotonRechazo" class="ml-4"
                        style="background: rgb(180, 14, 14); display: none">
                        <b>Canelar Rechazar</b>
                    </x-button>
                    <x-button type="button" class="ml-4" onclick="envioForm()" id="ConfirmarBotonRechazo"
                        style="background: rgb(10, 10, 10); display: none; color: white">
                        <b>Confirmar Rechazar permiso</b>
                    </x-button>
                    <x-button type="submit" class="ml-4" id="BotonRealizado"
                        style="background: rgb(0, 128, 38); display: block">
                        <b>cONFIRMAR | REALIZADO</b>
                    </x-button>
                </div>
            </form>
        </div>
    </div>

    <form action="{{ route('huvpermisos.update', $huvpermiso) }}" method="POST" id="FormRechazo2">
        @csrf
        @method('PUT') {{-- 35 --}}>
        <input type="text" value="1" name="estado" hidden>
        <input type="text" value="" name="rechazo" hidden id="rechazoRespaldo">
    </form>




    @push('js')
        <script>
            function envioForm() {
                const envio = document.getElementById('FormRechazo2');
                envio.submit();
            }

            /* Asignación de campo rechazo */
            document.getElementById('textRechazo').addEventListener('change', function() {
                const textRechazo = document.getElementById('textRechazo'); // Selecciona el campo de entrada
                const rechazoRespaldo = document.getElementById(
                    'rechazoRespaldo'); // Selecciona el campo del formulario

                rechazoRespaldo.value = textRechazo.value; // Asigna el valor ingresado
            });




            // Escuchar cambios en la selección de "Problema con la impresora"
            document.getElementById('BotonRechazo').addEventListener('click', function() {
                const problemaSeleccionado = this.value;
                const texto = document.getElementById('descripcion');
                const ConfirmarBotonRechazo = document.getElementById('ConfirmarBotonRechazo');
                const BotonRealizado = document.getElementById('BotonRealizado');
                const CancelarBotonRechazo = document.getElementById('CancelarBotonRechazo');
                const BotonRechazo = document.getElementById('BotonRechazo');
                ConfirmarBotonRechazo.style.display = 'block';
                BotonRechazo.style.display = 'none';
                BotonRealizado.style.display = 'none';
                CancelarBotonRechazo.style.display = 'block';
                texto.style.display = 'block'; // Mostrar el input de código


            });

            document.getElementById('CancelarBotonRechazo').addEventListener('click', function() {
                const problemaSeleccionado = this.value;
                const texto = document.getElementById('descripcion');
                const ConfirmarBotonRechazo = document.getElementById('ConfirmarBotonRechazo');
                const BotonRealizado = document.getElementById('BotonRealizado');
                const CancelarBotonRechazo = document.getElementById('CancelarBotonRechazo');
                const BotonRechazo = document.getElementById('BotonRechazo');
                ConfirmarBotonRechazo.style.display = 'none';
                BotonRealizado.style.display = 'block';
                CancelarBotonRechazo.style.display = 'none';
                BotonRechazo.style.display = 'block';
                texto.style.display = 'none'; // Mostrar el input de código
            })
        </script>
    @endpush

</x-app-layout>
