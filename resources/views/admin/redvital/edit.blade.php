<x-app-layout>
    <form action="{{route('redvital.update',$redvital)}}" method="POST"
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
        @csrf

        @method('PUT')
        <div class="mb-4">
            <x-label>
                Nombre
            </x-label>
            <x-input 
            class="w-full" value="{{$redvital->name}}" readonly  />
        </div>
        <div class="mb-4">
            <x-label>
                Cedula
            </x-label>
            <x-input 
            class="w-full" value="{{$redvital->cedula}}" readonly  />
        </div>
        <div class="mb-4">
            <x-label>
                Bodega
            </x-label>
            <x-input 
             class="w-full" value="{{$redvital->bodega}}" readonly  />
        </div>
        <div class="mb-4">
            <x-label>
                Area
            </x-label>
            <x-input 
            class="w-full" value="{{$redvital->area}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Cargo
            </x-label>
            <x-input 
           class="w-full" value="{{$redvital->cargo}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Usuario Referencia
            </x-label>
            <x-input 
            class="w-full" value="{{$redvital->usuario_clonar_sebthi}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Cedula Usuario Referencia
            </x-label>
            <x-input 
            class="w-full" value="{{$redvital->cedula_clonar}}" readonly required />
        </div>

        <h1 style="color: blue" class="mb-4"><b>Credenciales de usuario</b></h1>
        <div class="mb-4">
            <x-label>
                Usuario
            </x-label>
            <x-input 
            name="login_sebthi" class="w-full" required />
        </div>
        <div class="mb-4">
            <x-label>
                Password
            </x-label>
            <x-input 
            name="password_sebthi" type="text" class="w-full"  required />
        </div>

        <div class="mb-4">
            <input type="hidden" value="1" name="activo_sebthi">
        </div>
        
       
        <div class="flex justify-end">

            <x-button>
                CONFIRMAR USUARIO
            </x-button>
        </div>
    </form>  
</x-app-layout>