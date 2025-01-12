<x-app-layout>
    <form action="{{ route('redvital.update', $redvital) }}" method="POST" class="bg-white rounded-lg p-6"
        style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
        @csrf

        @method('PUT')
        {{--  <div class="mb-4">
            <x-label>
                Nombre
            </x-label>
            <x-input class="w-full" value="{{ $redvital->name }}" readonly />
        </div>
        <div class="mb-4">
            <x-label>
                Cedula
            </x-label>
            <x-input class="w-full" value="{{ $redvital->cedula }}" readonly />
        </div>
        <div class="mb-4">
            <x-label>
                Bodega
            </x-label>
            <x-input class="w-full" value="{{ $redvital->bodega }}" readonly />
        </div>
        <div class="mb-4">
            <x-label>
                Area
            </x-label>
            <x-input class="w-full" value="{{ $redvital->area }}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Cargo
            </x-label>
            <x-input class="w-full" value="{{ $redvital->cargo }}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Usuario Referencia
            </x-label>
            <x-input class="w-full" value="{{ $redvital->usuario_clonar_sebthi }}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Cedula Usuario Referencia
            </x-label>
            <x-input class="w-full" value="{{ $redvital->cedula_clonar }}" readonly required />
        </div>

        <h1 style="color: blue" class="mb-4"><b>Credenciales de usuario</b></h1>
        <div class="mb-4">
            <x-label>
                Usuario
            </x-label>
            <x-input name="login_sebthi" class="w-full" required />
        </div>
        <div class="mb-4">
            <x-label>
                Password
            </x-label>
            <x-input name="password_sebthi" type="text" class="w-full" required />
        </div>

        <div class="mb-4">
            <input type="hidden" value="1" name="activo_sebthi">
        </div>


        <div class="flex justify-end">

            <x-button>
                CONFIRMAR USUARIO
            </x-button>
        </div> --}}


        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label>Nombre Completo</label>
                <input type="text" class="border p-2 rounded w-full" value="{{ $redvital->name }}" readonly>
            </div>
            <div class="flex-1">
                <label>Numero Documento</label>
                <input type="text" class="border p-2 rounded w-full" value="{{ $redvital->cedula }}" readonly>
            </div>
            <div class="flex-1">
                <label>Numero Telefono</label>
                <input type="text" class="border p-2 rounded w-full" value="{{ $redvital->telefono }}" readonly>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div class="flex-1">
                <label>Bodega</label>
                <input type="text" class="border p-2 rounded w-full" value="{{ $redvital->bodega }}" readonly>
            </div>
            <div class="flex-1">
                <label>Cargo</label>
                <input type="text" class="border p-2 rounded w-full" value="{{ $redvital->cargo }}" readonly>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div class="flex-1">
                <label>Area</label>
                <input type="text" class="border p-2 rounded w-full" value="{{ $redvital->area }}" readonly>
            </div>
            <div class="flex-1">
                <label>Correo</label>
                <input type="text" class="border p-2 rounded w-full" value="{{ $redvital->correo_redv }}" readonly>
            </div>
        </div>


        <p class="text-gray-900  mb-6">Informacion usuario referencia. <br>
            este usuario se usara para clonar los permisos
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <label>Nombre Completo</label>
                <input type="text" class="border p-2 rounded w-full" value="{{ $redvital->name_referencia }}"
                    readonly>
            </div>
            <div class="flex-1">
                <label>Numero Documento</label>
                <input type="text" class="border p-2 rounded w-full" value="{{ $redvital->cedula_clonar }}" readonly>
            </div>
            <div>
                <label>Usuario Sebthi</label>
                <input type="text" class="border p-2 rounded w-full"value="{{ $redvital->usuario_clonar_sebthi }}"
                    readonly>
            </div>
        </div>

        <hr style="border: 2px solid rgb(125, 11, 170); margin: 20px">
        <p class="text-gray-900  mb-6">Informacion de la cuenta creada</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label>Usuario</label>
                <input type="text" name="login_sebthi" class="border p-2 rounded w-full" required>
            </div>
            <div class="flex-1">
                <label>Contraseña</label>
                <input type="text" name="password_sebthi" class="border p-2 rounded w-full" required>
            </div>
        </div>

        <div class="mb-4">
            <input type="hidden" value="1" name="activo_sebthi">
        </div>

        <div class="flex justify-end">
            <x-button type="submit" style="background: rgb(0, 128, 38);">
                <b>Confirmar Credenciles</b>
            </x-button>
        </div>
    </form>
</x-app-layout>
