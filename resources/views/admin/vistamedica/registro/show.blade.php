<x-app-layout>

    <form action="{{route('huv.update',$vista)}}" method="POST"
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
        @csrf
        @method('PUT')
        <div class="mb-4">
            <x-label>
                Acttor
            </x-label>
            <x-input name="acttor" value="{{$vista->acttor}}" class="w-full mb-4"/>
        </div>
        <div class="mb-4">
            <x-label>
                Codigo vista medica
            </x-label>
            <x-input name="vistamedica" value="{{$vista->vistamedica}}" class="w-full mb-4"/>
        </div>
        <div>
            <x-label>
                Medicamento Vista meidca
            </x-label>
            <x-input name="nombrevistamedica" value="{{$vista->nombrevistamedica}}" class="w-full mb-4"/>
        </div>
        <div>
            <x-label>
                Unidad de medida
            </x-label>
            <x-input name="unidadmedica" value="{{$vista->unidadmedica}}" class="w-full mb-4"/>
        </div>
        <div>
            <x-label>
                Codigo sebthi
            </x-label>
            <x-input name="codigosebthi" value="{{$vista->codigosebthi}}" class="w-full mb-4"/>
        </div>
        <div>
            <x-label>
                Medicamento sebthi
            </x-label>
            <x-input name="medicamento" value="{{$vista->medicamento}}" class="w-full mb-4"/>
        </div>
        <div class="flex justify-end">
            <x-button>
                CREAR
            </x-button>
        </div>
    </form>


  
</x-app-layout>