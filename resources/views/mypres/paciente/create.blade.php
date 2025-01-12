<x-app-layout>

    @if (session('swal'))
        <script>
            Swal.fire({
                icon: '{{ session('swal.icon') }}',
                title: '{{ session('swal.title') }}',
                text: '{{ session('swal.text') }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif

    <div class="container mx-auto p-4">
        <div class="bg-white  shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4 text-gray-900 text-center">CREAR PACIENTE MIPRES</h1>
            <p class="text-gray-600  mb-6">Datos del paciente</p>
            <form action="{{ route('Mipres.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div>
                        <label>Nombre Completo</label>
                        <input type="text" placeholder="Nombre Completo" name="name"
                            class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label>Tipo Documento</label>
                        <x-select class="w-full" name="tipoDocumento">
                            <option value="">Seleccione Tipo Documento</option>
                            <option value="cc">CC</option>
                            <option value="ti">TI</option>
                            <option value="rc">RC</option>
                            <option value="as">AS</option>
                            <option value="rc">RC</option>
                            <option value="ms">MS</option>
                            <option value="pt">PT</option>
                        </x-select>
                    </div>
                    <div>
                        <label>Numero Documento</label>
                        <input type="text" name="documento" placeholder="Numero Documento"
                            class="border p-2 rounded w-full">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label>Numero Historia Clinica</label>
                        <input type="text" name="historia" placeholder="N. Historia clinica"
                            class="border p-2 rounded w-full">
                    </div>
                </div>

                <div class="flex justify-end">
                    <x-button type="submit" style="background: rgb(0, 128, 38);">
                        <b>Crear Paciente</b>
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
