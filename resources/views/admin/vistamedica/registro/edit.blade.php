<x-app-layout>

    <form action="{{route('IngresoVistaMedica.update',$IngresoVistaMedica)}}" method="POST"
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
        @csrf
        @method('PUT')
        <div class="mb-4">
            <x-label>
                Acttor
            </x-label>
            <x-input name="acttor" value="{{$IngresoVistaMedica->acttor}}" class="w-full mb-4"/>
        </div>
        <div class="mb-4">
            <x-label>
                Codigo vista medica
            </x-label>
            <x-input name="vistamedica" value="{{$IngresoVistaMedica->vistamedica}}" class="w-full mb-4"/>
        </div>
        <div>
            <x-label>
                Medicamento Vista meidca
            </x-label>
            <x-input name="nombrevistamedica" value="{{$IngresoVistaMedica->nombrevistamedica}}" class="w-full mb-4"/>
        </div>
        <div>
            <x-label>
                Unidad de medida
            </x-label>
            <x-input name="unidadmedica" value="{{$IngresoVistaMedica->unidadmedica}}" class="w-full mb-4"/>
        </div>
        <div>
            <x-label>
                Codigo sebthi
            </x-label>
            <x-input name="codigosebthi" value="{{$IngresoVistaMedica->codigosebthi}}" class="w-full mb-4"/>
        </div>
        <div>
            <x-label>
                Medicamento sebthi
            </x-label>
            <x-input name="medicamento" value="{{$IngresoVistaMedica->medicamento}}" class="w-full mb-4"/>
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
<form action="{{route('IngresoVistaMedica.destroy', $IngresoVistaMedica)}}" 
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