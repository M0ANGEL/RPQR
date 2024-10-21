<x-app-layout>

    <form action="{{route('huv.update',$huv)}}" method="POST"
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
        @csrf
        @method('PUT')
        <div class="mb-4">
            <x-label>
                Nombre
            </x-label>
            <x-input 
            name="name" class="w-full" 
            placeholder="Escriba el nombre de la bodega" value="{{$huv->name}}" required  />
        </div>
        <div class="mb-4">
            <x-label>
                Numero de cedula sin (.)
            </x-label>
            <x-input 
            name="cedula" class="w-full" value="{{$huv->cedula}}" required
            placeholder="Escriba el numero de cedula sin(.)" />
        </div>
        <div class="mb-4">
            <x-label>
                Telefono
            </x-label>
            <x-input 
            name="telefono" class="w-full" value="{{$huv->telefono}}" required
            placeholder="Ejemplo 311 *** ** **" />
        </div>     
        <div class="mb-4">
            <x-label>
                Bodega
            </x-label>
            <x-input 
            name="bodega" class="w-full" value="{{$huv->bodega}}" required/>
        </div>    

        <div class="mb-4">
            <x-label>
                Usuario Referencia Servinte
            </x-label>
            <x-input 
            name="usuario_clonar_huv" class="w-full" 
            value="{{$huv->usuario_clonar_huv}}"  required
            placeholder="Usuario clonar" />
        </div>
        <div class="mb-4">
            <x-label>
                Usuario Referencia Sebthi
            </x-label>
            <x-input 
            name="usuario_clonar_sebthi" class="w-full"
             value="{{$huv->usuario_clonar_sebthi}}" required 
            placeholder="Usuario clonar" />
        </div>
        <div class="mb-4">
            <x-label>
                Cedula Usuario Referencia sin(.)
            </x-label>
            <x-input 
            name="cedula_clonar" class="w-full" 
            value="{{$huv->cedula_clonar}}" required
            placeholder="Cedula" />
        </div>
        <div class="flex justify-end">
        
            <x-button>
                Actualizar
            </x-button>
        </div>
    </form>

 
</x-app-layout>