<x-app-layout>

    @if (session('swal'))
        <script>
            Swal.fire({
                icon: '{{ session('swal')['icon'] }}',
                title: '{{ session('swal')['title'] }}',
                text: '{{ session('swal')['text'] }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif

    <div class="container mx-auto p-4">
        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4 text-gray-900 text-center">CREAR USUARIO ASISTENCIAS</h1>
            <p class="text-gray-600 mb-6">Datos del usuario</p>
            <form action="{{ route('registroPersonal.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div>
                        <label>Nombre Completo</label>
                        <input type="text" placeholder="Nombre Completo" name="nombre"
                            class="border p-2 rounded w-full">
                    </div>

                    <div>
                        <label>Numero Documento</label>
                        <input type="text" name="cedula" class="border p-2 rounded w-full" pattern="[0-9]*"
                            inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                    <div>
                        <label>Numero telefono</label>
                        <input type="text" name="telefono" class="border p-2 rounded w-full" pattern="[0-9]*"
                            inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label>Cargo Actual</label>
                        <x-select class="border p-2 rounded w-full" name="perfil">
                            <option>Selecione Un Perfil</option>
                            <option value="Aux Farmacia">Aux Farmacia</option>
                            <option value="Patinador">Patinador</option>
                            <option value="Regente">Regente</option>
                            <option value="Quimico">Quimico</option>
                            <option value="auditoria">Auditoria</option>
                        </x-select>
                    </div>
                </div>

                <div class="flex justify-end">
                    <x-button type="submit" style="background: rgb(0, 128, 38);">
                        <b>Crear Registro</b>
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
