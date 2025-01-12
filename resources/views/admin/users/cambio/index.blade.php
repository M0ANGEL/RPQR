<x-app-layout>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6" {{-- style="margin: 40px 20%" --}}>
        <form class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
            <h1 class="mb-4 text-center" style="color: blue" class="text-center mb-4 mp-4"><b>Datos De Cuenta</b></h1>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div>
                    <x-label>
                        Nombre
                    </x-label>
                    <x-input class="w-full" value="{{ $cambio->name }}" readonly />
                </div>
                <div>
                    <x-label>
                        Usuario
                    </x-label>
                    <x-input class="w-full" value="{{ $cambio->email }}" readonly />
                </div>
                <div>
                    <x-label>
                        Bodega
                    </x-label>
                    <x-input class="w-full" value="{{ $cambio->bodega }}" readonly />
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <x-label>
                        Perfil
                    </x-label>
                    <x-input class="w-full" value="{{ $cambio->perfil }}" readonly />
                </div>
                <div>
                    <x-label>
                        Ultimo Login
                    </x-label>
                    <x-input class="w-full" value="2025-01-20" readonly />
                </div>
            </div>
        </form>
        <form action="{{ route('cambio.update', $cambio) }}" method="POST" class="bg-white rounded-lg p-6"
            style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
            <h1 style="color: blue" class="text-center mb-4 mp-4"><b>Cambias Contraseña</b></h1>
            @csrf

            @method('PUT')

            <div class="mb-4">
                <x-label>
                    Contraseña nueva
                </x-label>
                <x-input name="password" type="password" class="w-full" placeholder="Escriba nueva contraseña" />
            </div>

            <div class="flex justify-end">
                <x-button>
                    CAMBIAR CONTRASEÑA
                </x-button>
            </div>
        </form>
    </div>

</x-app-layout>
