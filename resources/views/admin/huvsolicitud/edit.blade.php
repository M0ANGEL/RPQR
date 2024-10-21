<x-app-layout>

    <form action="{{route('solicitud.update',$solicitud)}}" method="POST"
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
        @csrf

        @method('PUT')
        <h2 style="color: blue; text-align: center;" class="mb-4"><b>Datos de usuarior</b></h2>
        <div class="mb-4">
            <x-label>
                Nombre 
            </x-label>
            <x-input 
            class="w-full" value="{{$solicitud->name}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Cedula
            </x-label>
            <x-input 
            class="w-full" value="{{$solicitud->cedula}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Bodega
            </x-label>
            <x-input 
             class="w-full" value="{{$solicitud->bodega}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Area
            </x-label>
            <x-input 
            class="w-full" value="{{$solicitud->area}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Correo Redvital
            </x-label>
            <x-input 
            class="w-full" value="{{$solicitud->correo_redv}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Cargo
            </x-label>
            <x-input 
           class="w-full" value="{{$solicitud->cargo}}" readonly required />
        </div>
        <h2 style="color: blue; text-align: center;" class="mb-4"><b>Datos de usuario aclonar</b></h2>
        <div class="mb-4">
            <x-label>
                Nombre Completo Usuario Referencia
            </x-label>
            <x-input 
            class="w-full" value="{{$solicitud->name_referencia}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Usuario Referencia
            </x-label>
            <x-input 
            class="w-full" value="{{$solicitud->usuario_clonar_huv}}" readonly  />
        </div>
        <div class="mb-4">
            <x-label>
                Cedula Usuario Referencia
            </x-label>
            <x-input 
            class="w-full" value="{{$solicitud->cedula_clonar}}" readonly  />
        </div>

        <h1 style="color: blue; text-align: center;" class="mb-4"><b>Credenciales de usuario</b></h1>
        <div class="mb-4">
            <x-label style="color: rgb(106, 8, 131)">
                <b>Usuario de servinte</b>
            </x-label>
            <x-input 
            name="login_servinte" type="text" class="w-full" required />
        </div>
        <div class="mb-4">
            <x-label style="color: rgb(106, 8, 131)">
                <b>Password de servinte</b>
            </x-label>
            <x-input 
            name="password_servinte" type="text" class="w-full" required />
        </div>

        <div class="mb-4">
            <input type="hidden" value="1" name="activo_servinte">
        </div>
        
       
        <div class="flex justify-end">

            <x-button style="background: blue;">
                CONFIRMAR CREACION
            </x-button>
        </div>
    </form>  
</x-app-layout>