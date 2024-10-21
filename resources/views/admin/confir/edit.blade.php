<x-app-layout>

    <form action="{{route('confirmacion.update',$confirmacion)}}" method="POST"
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
        @csrf

        @method('PUT')
        <h1 style="color: blue; text-align: center; font-size: 17px;" class="mb-4"><b>Datos usuario</b></h1>
        <div class="mb-4">
            <x-label>
                Nombre
            </x-label>
            <x-input 
             class="w-full" value="{{$confirmacion->name}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Cedula
            </x-label>
            <x-input 
            class="w-full" value="{{$confirmacion->cedula}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Perfil
            </x-label>
            <x-input 
            class="w-full" value="{{$confirmacion->cargo}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Bodega
            </x-label>
            <x-input 
             class="w-full" value="{{$confirmacion->bodega}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Usuario Referencia Sebthi
            </x-label>
            <x-input 
             class="w-full" value="{{$confirmacion->usuario_clonar_sebthi}}" readonly/>
        </div>

        <div class="mb-4">
            <x-label>
                Usuario Referencia Sevinte
            </x-label>
            <x-input 
             class="w-full" value="{{$confirmacion->usuario_clonar_huv}}" readonly/>
        </div>

        <h2 style="color: blue; text-align: center; font-size: 17px;" class="mb-4"><b>Regente que solicita usuario</b></h2>
        <div class="mb-4">
            <x-label>
                Regente
            </x-label>
            <x-input 
             class="w-full" value="{{$confirmacion->user->name}}" readonly required />
        </div>

        <div class="mb-4">
            <x-label>
                Regente de bodega
            </x-label>
            <x-input 
             class="w-full" value="{{$confirmacion->user->bodega}}" readonly required />
        </div>

        <div class="mb-4">
            <input type="hidden" value="1" name="confirmado">
        </div>
        
       
        <div class="flex justify-end">

            <x-button style="background: blue;">
                CONFIRMAR CREACION DE USUARIO
            </x-button>
        </div>
    </form>  
</x-app-layout>