<x-app-layout>
    <h1 class="text-3xl font-semibold mb-2">
        Nueva bodega
    </h1>

    <form action="{{route('bodegas.store')}}" method="POST"
    class="bg-white rounded-lg p-6 shadow-lg">
        @csrf
        <div class="mb-4">
            <x-label>
                Nombre bodega
            </x-label>
            <x-input 
            name="name" class="w-full" 
            placeholder="Escriba el nombre de la bodega" required/>
        </div>
       
        <div class="flex justify-end">
            <x-button>
                CREAR BODEGA
            </x-button>
        </div>
    </form>


    
   
</x-app-layout>