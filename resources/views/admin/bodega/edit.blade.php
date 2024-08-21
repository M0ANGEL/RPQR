<x-app-layout>

    <form action="{{route('bodegas.update',$bodega)}}" method="POST"
    class="bg-white rounded-lg p-6 shadow-lg">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <x-label>
                Bodega
            </x-label>
            <x-input 
            name="name"
            class="w-full" 
            placeholder="Escriba el nombre de la bodega" value="{{old('title',$bodega->name)}}" required />
        </div>
          
        <div class="flex justify-end">
            
            <x-danger-button class="mr-2" onclick="deleteBodega()">
                Eliminar
            </x-danger-button>

            <x-button>
                Actualizar
            </x-button>
        </div>
    </form>

    {{-- form de delete --}}
    <form action="{{route('bodegas.destroy', $bodega)}}" 
    method="POST" id="formDelete">
        @csrf
        @method('DELETE')
    </form>

    @push('js')
        <script>
            function deleteBodega(){
                form = document.getElementById('formDelete');
                form.submit();
            }
        </script>
    @endpush

  
</x-app-layout>