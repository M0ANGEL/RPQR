<x-app-layout>
    <div class="container mx-auto p-2">
        <div class="bg-white shadow rounded-lg p-6">
            <h1 style="color: blue; text-align: center;"><b>DATOS DEL USUARIO</b></h1>
            <p class="text-gray-900 mb-6"><b>Llenar todos los datos para una solicitud completa</b></p>
            <form action="{{ route('gestion.store') }}" method="POST">
                @csrf
                <div class="flex flex-wrap gap-4 mb-6">
                    <div>
                        <label>Nombre Completo</label>
                        <input type="text" name="name" placeholder="Ejemplo: Miguel Angel Riasco"
                            class="border p-2 rounded w-full">
                    </div>
                    <div class="flex-1">
                        <label>Numero Cedula</label>
                        <input type="text" name="cedula" class="border p-2 rounded w-full" pattern="[0-9]*"
                            inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                    <div>
                        <label>Usuario Servinte</label>
                        <input type="text" name="usuario_servinte" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label>Perfil | Cargo</label>
                        <select class="border p-2 rounded w-full" name="perfil">
                            <option value=""></option>
                            <option value="Patinador">Patinador</option>
                            <option value="Aux farmacia">Aux farmacia</option>
                            <option value="Regente">Regente</option>
                            <option value="Regente Bodega">Regente Bodega</option>
                            <option value="Quimico">Quimico</option>
                            <option value="Auditoria">Auditoria</option>
                        </select>
                    </div>


                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label>Usuario Sebthi</label>
                        <input type="text" name="usuario_sebthi" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label>Requerimiento</label>
                        <select id="requerimiento" class="border p-2 rounded w-full" name="pb"
                            onchange="toggleBodegaNueva()">
                            <option value="??"><-- Seleccione un requerimiento --></option>
                            <option value="Cambio o asignacion de permisos">Cambio o asignacion de permisos</option>
                            <option value="Cambio o asignacion de bodega">Cambio o asignacion de bodega</option>
                        </select>
                    </div>
                    <div id="bodegaNuevaContainer" style="display: none;">
                        <label>Bodega Nueva</label>
                        <select class="border p-2 rounded w-full" name="bodega_nueva">
                            <option value=""></option>
                            <option value="w001 | Farmacia Principal">Farmacia Principal</option>
                            <option value="w003 | Farmacia Operaciones">Farmacia Operaciones</option>
                            <option value="w004 | Alto Costo">Alto Costo</option>
                            <option value="w005 | Farmacia Urgencias">Farmacia Urgencias</option>
                            <option value="w007 | Farmacia Partos">Farmacia Partos</option>
                            <option value="w011 | Bodega Controlados">Bodega Controlados</option>
                            <option value="w012 | Alto Costo Principal">Alto Costo Principal</option>
                            <option value="w013 | Farmacia Uci">Farmacia Uci</option>
                            <option value="w017 | devolutivo">Farmacia Devolutivo</option>
                            <option value="wvit | Bodega General">Bodega General Wvit</option>
                        </select>
                    </div>
                </div>
                <br>
                <p class="text-gray-900 mb-6"><b>Informacion usuario referencia. <br>
                        Este usuario se usará para clonar los permisos.</b>
                </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div class="flex-1">
                        <label>Numero Cedula</label>
                        <input type="text" name="cedula_usuario_referencia" class="border p-2 rounded w-full"
                            pattern="[0-9]*" inputmode="numeric"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                    <div>
                        <label>Usuario Sebthi</label>
                        <input type="text" name="usuario_clonar_sebthi" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label>Usuario Servinte</label>
                        <input type="text" name="usuario_clonar_servinte" class="border p-2 rounded w-full">
                    </div>
                </div>

                <div>
                    <x-label>Motivo de solicitud</x-label>
                    <textarea name="reporte" id="" rows="4"
                        class="border-gray-900 mb-4 focus:border-indigo-500 focus:ring-indigo-900 rounded-md shadow-sm w-full"></textarea>
                </div>

                <div class="flex justify-end">
                    <x-button type="submit" style="background: rgb(0, 128, 38);">
                        <b>SOLICITAR</b>
                    </x-button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleBodegaNueva() {
            const requerimiento = document.getElementById('requerimiento').value;
            const bodegaNuevaContainer = document.getElementById('bodegaNuevaContainer');
            if (requerimiento === 'Cambio o asignacion de bodega') {
                bodegaNuevaContainer.style.display = 'block';
            } else {
                bodegaNuevaContainer.style.display = 'none';
            }
        }

        // Ejecutar al cargar la página en caso de que ya esté seleccionada "Cambio de bodega"
        document.addEventListener('DOMContentLoaded', function() {
            toggleBodegaNueva();
        });
    </script>
</x-app-layout>
