<x-app-layout>

    <form action="{{route('huvpermisos.update',$huvpermiso)}}" method="POST"
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
        @csrf

        @method('PUT')
        <div class="mb-4">
            <x-label>
                Nombre
            </x-label>
            <x-input 
             class="w-full" value="{{$huvpermiso->name}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Cedula
            </x-label>
            <x-input 
            class="w-full" value="{{$huvpermiso->cedula}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Requerimiento
            </x-label>
            <x-input 
             class="w-full" value="{{$huvpermiso->pb}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Bodega Nueva
            </x-label>
            <x-input 
             class="w-full" value="{{$huvpermiso->bodega_nueva}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Usuario clonar
            </x-label>
            <x-input 
             class="w-full" value="{{$huvpermiso->pb}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Regente que solicita
            </x-label>
            <x-input 
             class="w-full" value="{{$huvpermiso->user->name}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Motivo
            </x-label>
            <x-input 
             class="w-full" value="{{$huvpermiso->reporte}}" readonly required />
        </div>

        <input type="hidden" name="estado" value="1">

        <div class="flex justify-end" >

            <x-button style="background-color: cadetblue">
                REALIZADO
            </x-button>
        </div>
    </form>  
</x-app-layout>