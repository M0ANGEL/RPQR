<x-app-layout>

    <form  
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
    <h1 class="mb-4 text-center">DATOS DE CUENTA</h1>

        <div class="mb-4">
            <x-label>
                Nombre
            </x-label>
            <x-input 
            class="w-full"  value="{{$cambio->name}}" readonly  />
        </div>
        <div class="mb-4">
            <x-label>
                Usuario
            </x-label>
            <x-input 
            class="w-full"  value="{{$cambio->email}}" readonly  />
        </div>
        <div class="mb-4">
            <x-label>
                Bodega
            </x-label>
            <x-input 
            class="w-full"  value="{{$cambio->bodega}}" readonly  />
        </div>

        <div class="flex justify-end">
            <x-button>
                <a href="{{route('cambio.edit',$cambio)}}">CAMBIAR CONTRASEÑA</a>
            </x-button>
        </div>
    </form>

</x-app-layout>