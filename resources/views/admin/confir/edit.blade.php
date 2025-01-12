<x-app-layout>

    <div class="container mx-auto p-4">
        <div class="bg-white  shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4 text-gray-900 text-center">SOLICITUD DE CREACION DE USUARIO</h1>
            <p class="text-gray-600  mb-6">Datos de la creacion</p>
            <form action="{{ route('confirmacion.update', $confirmacion) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div>
                        <label><b>Nombre Completo</b></label>
                        <input type="text" value="{{ $confirmacion->name }}" readonly class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label><b>Numero Documento</b></label>
                        <input type="text" name="documento" readonly value="{{ $confirmacion->cedula }}"
                            class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label><b>Perfil Usuario</b></label>
                        <input type="text" name="documento" value="{{ $confirmacion->cargo }}" readonly
                            class="border p-2 rounded w-full">
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label><b>Bodega Usuario</b></label>
                        <input type="text" name="historia" value="{{ $confirmacion->bodega }}" readonly
                            class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label><b>Usuario Referencia Sebthi</b></label>
                        <input type="text" name="historia" value="{{ $confirmacion->usuario_clonar_sebthi }}"
                            readonly class="border p-2 rounded w-full">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label><b>Usuario Referencia Servinte</b></label>
                        <input type="text" name="historia" value="{{ $confirmacion->usuario_clonar_huv }}" readonly
                            class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label><b>Regente Envia Crear</b></label>
                        <input type="text" name="historia" value="{{ $confirmacion->user->name }}" readonly
                            class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label><b>Bodega Regente</b></label>
                        <input type="text" name="historia" value="{{ $confirmacion->user->bodega }}" readonly
                            class="border p-2 rounded w-full">
                    </div>
                </div>

                <div class="mb-4">
                    <input type="hidden" value="1" name="confirmado">
                </div>

                <div class="flex justify-end">
                    <x-button style="background: rgb(16, 141, 25);">
                        CONFIRMAR CREACION DE USUARIO
                    </x-button>
                </div>
            </form>
        </div>
    </div>

    {{--  <form action="{{ route('confirmacion.update', $confirmacion) }}" method="POST" class="bg-white rounded-lg p-6"
        style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> 
        @csrf

        @method('PUT')
        <h1 style="color: blue; text-align: center; font-size: 17px;" class="mb-4"><b>Datos usuario</b></h1>
        <div class="mb-4">
            <x-label>
                Nombre
            </x-label>
            <x-input class="w-full" value="{{ $confirmacion->name }}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Cedula
            </x-label>
            <x-input class="w-full" value="{{ $confirmacion->cedula }}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Perfil
            </x-label>
            <x-input class="w-full" value="{{ $confirmacion->cargo }}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Bodega
            </x-label>
            <x-input class="w-full" value="{{ $confirmacion->bodega }}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Usuario Referencia Sebthi
            </x-label>
            <x-input class="w-full" value="{{ $confirmacion->usuario_clonar_sebthi }}" readonly />
        </div>

        <div class="mb-4">
            <x-label>
                Usuario Referencia Sevinte
            </x-label>
            <x-input class="w-full" value="{{ $confirmacion->usuario_clonar_huv }}" readonly />
        </div>

        <h2 style="color: blue; text-align: center; font-size: 17px;" class="mb-4"><b>Regente que solicita usuario</b>
        </h2>
        <div class="mb-4">
            <x-label>
                Regente
            </x-label>
            <x-input class="w-full" value="{{ $confirmacion->user->name }}" readonly required />
        </div>

        <div class="mb-4">
            <x-label>
                Regente de bodega
            </x-label>
            <x-input class="w-full" value="{{ $confirmacion->user->bodega }}" readonly required />
        </div>

        <div class="mb-4">
            <input type="hidden" value="1" name="confirmado">
        </div>


        <div class="flex justify-end">

            <x-button style="background: blue;">
                CONFIRMAR CREACION DE USUARIO
            </x-button>
        </div>
    </form> --}}
</x-app-layout>
