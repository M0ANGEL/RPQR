<x-app-layout>
    <!-- component -->
    <div class="container mx-auto p-2">
        <div class="bg-white  shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4 text-gray-900 ">Entrega Usuario Servinte</h1>
            <form action="{{ route('solicitud.update', $solicitud) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label>Nombre Completo</label>
                        <input type="text" class="border p-2 rounded w-full" value="{{ $solicitud->name }}" readonly>
                    </div>
                    <div class="flex-1">
                        <label>Numero Documento</label>
                        <input type="text" class="border p-2 rounded w-full" value="{{ $solicitud->cedula }}"
                            readonly>
                    </div>
                    <div class="flex-1">
                        <label>Numero Telefono</label>
                        <input type="text" class="border p-2 rounded w-full" value="{{ $solicitud->telefono }}"
                            readonly>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div class="flex-1">
                        <label>Bodega</label>
                        <input type="text" class="border p-2 rounded w-full" value="{{ $solicitud->bodega }}"
                            readonly>
                    </div>
                    <div class="flex-1">
                        <label>Cargo</label>
                        <input type="text" class="border p-2 rounded w-full" value="{{ $solicitud->cargo }}"
                            readonly>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div class="flex-1">
                        <label>Area</label>
                        <input type="text" class="border p-2 rounded w-full" value="{{ $solicitud->area }}" readonly>
                    </div>
                    <div class="flex-1">
                        <label>Correo</label>
                        <input type="text" class="border p-2 rounded w-full" value="{{ $solicitud->correo_redv }}"
                            readonly>
                    </div>
                </div>


                <p class="text-gray-900  mb-6">Informacion usuario referencia. <br>
                    este usuario se usara para clonar los permisos
                </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label>Nombre Completo</label>
                        <input type="text" class="border p-2 rounded w-full"
                            value="{{ $solicitud->name_referencia }}" readonly>
                    </div>
                    <div class="flex-1">
                        <label>Numero Documento</label>
                        <input type="text" class="border p-2 rounded w-full" value="{{ $solicitud->cedula_clonar }}"
                            readonly>
                    </div>
                    <div>
                        <label>Usuario Servinte</label>
                        <input type="text" class="border p-2 rounded w-full"
                            value="{{ $solicitud->usuario_clonar_huv }}" readonly>
                    </div>
                </div>

                <hr style="border: 2px solid rgb(125, 11, 170); margin: 20px">
                <p class="text-gray-900  mb-6">Informacion de la cuenta creada</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label>Usuario</label>
                        <input type="text" name="login_servinte" class="border p-2 rounded w-full" required>
                    </div>
                    <div class="flex-1">
                        <label>Contraseña</label>
                        <input type="text" name="password_servinte" class="border p-2 rounded w-full" required>
                    </div>
                </div>

                <div class="mb-4">
                    <input type="hidden" value="1" name="activo_servinte">
                </div>

                <div class="flex justify-end">
                    <x-button type="submit" style="background: rgb(0, 128, 38);">
                        <b>Confirmar Credenciles</b>
                    </x-button>
                </div>
            </form>
        </div>
    </div>




    @push('js')
        <script>
            /* envio de formilarios extras */
            function busqueda() {
                form = document.getElementById('busqueda');
                form.submit();
            }
        </script>
    @endpush

</x-app-layout>
