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

    <form action="{{ route('Mipres.update', $Mipre) }}" method="POST" class="bg-white rounded-lg p-6"
        style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
        @csrf
        @method('PUT')
        <div class="mb-4">
            <x-label>
                Nombre Completo Paciente
            </x-label>
            <x-input name="name" value="{{ $Mipre->name }}" class="w-full mb-4" />
        </div>
        <div class="mb-4">
            <label>Tipo Documento</label>
            <x-select class="w-full" name="tipoDocumento">
                <option value="">Seleccione Tipo Documento</option>
                <option value="CC" @selected($Mipre->tipoDocumento == 'cc')>CC</option>
                <option value="TI" @selected($Mipre->tipoDocumento == 'ti')>TI</option>
                <option value="RC" @selected($Mipre->tipoDocumento == 'rc')>RC</option>
                <option value="AS" @selected($Mipre->tipoDocumento == 'as')>AS</option>
                <option value="MS" @selected($Mipre->tipoDocumento == 'ms')>MS</option>
            </x-select>

        </div>
        <div class="mb-4">
            <x-label>
                N. Documento
            </x-label>
            <x-input name="documento" class="w-full mb-4" value="{{ $Mipre->documento }}" />
        </div>
        <div class="mb-4">
            <x-label>
                N. Historia clinica
            </x-label>
            <x-input name="historia" class="w-full mb-4" value="{{ $Mipre->historia }} " />
        </div>

        <div class="flex justify-end">
            <x-button>
                Actualizar
            </x-button>
        </div>
    </form>
</x-app-layout>
