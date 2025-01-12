<x-app-layout>
    <!-- component -->
    <div class="container mx-auto p-2">
        <div class="bg-white  shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4 text-gray-900 ">Solicitud Creacion Usuario</h1>
            <p class="text-gray-600  mb-6">Llenar todo los datos para una solicitud completa </p>
            <form action="{{ route('huv.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label>Nombre Completo</label>
                        <input type="text" name="name" placeholder="Ejemplo: Miguel Angel"
                            class="border p-2 rounded w-full">
                    </div>
                    <div class="flex-1">
                        <label>Numero Documento</label>
                        <input type="text" name="cedula" class="border p-2 rounded w-full" pattern="[0-9]*"
                            inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                    <div class="flex-1">
                        <label>Numero Telefono</label>
                        <input type="text" name="telefono" class="border p-2 rounded w-full" pattern="[0-9]*"
                            inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label>Perfil Usuario</label>
                        <select class="border p-2 rounded w-full" name="cargo">
                            <option>Selecione Un Perfil</option>
                            <option value="Aux Farmacia">Aux Farmacia</option>
                            <option value="Patinador">Patinador</option>
                            <option value="Regente">Regente</option>
                            <option value="Quimico">Quimico</option>
                            <option value="auditoria">Auditoria</option>
                        </select>
                    </div>
                    <div class="flex-1">
                        <label>Bodega Asignar</label>
                        <select class="border p-2 rounded w-full" name="bodega">
                            <option>Seleccione Farmacia</option>
                            <option value="Farmacia Principal">Farmacia Principal</option>
                            <option value="Farmacia Alto Costo - Principal">Farmacia Alto Costo - Principal</option>
                            <option value="Farmacia Bodega">Farmacia Bodega</option>
                            <option value="Farmacia Urgencias">Farmacia Urgencias</option>
                            <option value="Farmacia Alto costo">Farmacia Alto costo</option>
                            <option value="Farmacia Uci">Farmacia Uci</option>
                            <option value="Farmacia Operaciones">Farmacia Operaciones</option>
                            <option value="Farmacia Operaciones">Farmacia Partos</option>
                        </select>
                    </div>
                </div>

                <p class="text-gray-900  mb-6">Informacion usuario referencia. <br>
                    este usuario se usara para clonar los permisos
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label>Nombre Completo</label>
                        <input type="text" name="name_referencia" class="border p-2 rounded w-full">
                    </div>
                    <div class="flex-1">
                        <label>Numero Documento</label>
                        <input type="text" name="cedula_clonar" class="border p-2 rounded w-full" pattern="[0-9]*"
                            inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label>Usuario Sebthi</label>
                        <input type="text" name="usuario_clonar_sebthi" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label>Usuario Servinte</label>
                        <input type="text" name="usuario_clonar_huv" class="border p-2 rounded w-full">
                    </div>
                </div>

                <div class="flex justify-end">
                    <x-button type="submit" style="background: rgb(0, 128, 38);">
                        <b>Registrar Entrega</b>
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
