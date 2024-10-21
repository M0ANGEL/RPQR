<x-app-layout>

    <form action="{{route('RedvitalPermisos.update',$RedvitalPermiso)}}" method="POST"
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
        @csrf

        @method('PUT')
        <h1 style="color: rgb(255, 255, 255); text-align: center; margin-bottom: 10px; margin-top: 10px; background: blue; border-radius: 10px;"><b>DATOS DEL USUARIO</b></h1>
        <div class="mb-4">
            <x-label>
                Nombre Completo
            </x-label>
            <x-input 
             class="w-full" value="{{$RedvitalPermiso->name}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Usuario Sebthi
            </x-label>
            <x-input 
             class="w-full" value="{{$RedvitalPermiso->usuario_sebthi}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Cedula
            </x-label>
            <x-input 
            class="w-full" value="{{$RedvitalPermiso->cedula}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Requerimiento
            </x-label>
            <x-input 
             class="w-full" value="{{$RedvitalPermiso->pb}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Bodega Nueva
            </x-label>
            <x-input 
             class="w-full" value="{{$RedvitalPermiso->bodega_nueva}}" readonly required />
        </div>
        <h2 style="color: rgb(255, 255, 255); text-align: center; margin-bottom: 10px; margin-top: 10px; background: blue; border-radius: 10px;"><b>DATOS USUARIO REFERENCIA</b></h2>
        <div class="mb-4">
            <x-label>
                Usuario clonar
            </x-label>
            <x-input 
             class="w-full" value="{{$RedvitalPermiso->usuario_clonar_sebthi}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Cedula Usuario clonar
            </x-label>
            <x-input 
             class="w-full" value="{{$RedvitalPermiso->cedula_usuario_referencia}}" readonly required />
        </div>
        <h2 style="color: rgb(255, 255, 255); text-align: center; margin-bottom: 10px; margin-top: 10px; background: blue; border-radius: 10px;"><b>DATOS REGENTE</b></h2>
        <div class="mb-4">
            <x-label>
                Regente que solicita
            </x-label>
            <x-input 
             class="w-full" value="{{$RedvitalPermiso->user->name}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Motivo
            </x-label>
            <x-input 
             class="w-full" value="{{$RedvitalPermiso->reporte}}" readonly required />
        </div>

        <input type="hidden" name="estado_sebthi" value="1">

        <div class="flex justify-end" >

            <x-button style="background-color: cadetblue">
                REALIZADO
            </x-button>
        </div>
    </form>  
</x-app-layout>