<x-app-layout>

    <form action="{{route('confirmacion.update',$confirmacion)}}" method="POST"
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
        @csrf

        @method('PUT')
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

        <h1 style="color: blue" class="mb-4"><b>Regente que solicita</b></h1>
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
            <input type="hidden" value="0" name="confirmado">


            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" value="1" 
                name="confirmado" class="sr-only peer"
                @checked(old('confirmado',$confirmacion->confirmado == 1))>
                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-black-300">
                    @if ($confirmacion->confirmado==1)
                        <p style="color: blue">Confirmado</p> 
                    
                    @else
                        <p style="color: red">No confirmado</p>
                    
                    @endif
                </span>
            </label>
        </div>
        
       
        <div class="flex justify-end">

            <x-button>
                Actualizar
            </x-button>
        </div>
    </form>  
</x-app-layout>