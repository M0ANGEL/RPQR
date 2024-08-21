<x-app-layout>

    <form action="{{route('IngresoVistaMedica.store')}}" method="POST" 
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
            @csrf
            <div class="mb-4">
                <x-label>
                    Acttor
                </x-label>
                <x-input name="acttor" class="w-full mb-4"/>
            </div>
            <div class="mb-4">
                <x-label>
                    Codigo vista medica
                </x-label>
                <x-input name="vistamedica" class="w-full mb-4"/>
            </div>
            <div>
                <x-label>
                    Medicamento Vista meidca
                </x-label>
                <x-input name="nombrevistamedica" class="w-full mb-4"/>
            </div>
            <div>
                <x-label>
                    Unidad de medida
                </x-label>
                <x-input name="unidadmedica" class="w-full mb-4"/>
            </div>
            <div>
                <x-label>
                    Codigo sebthi
                </x-label>
                <x-input name="codigosebthi" class="w-full mb-4"/>
            </div>
            <div>
                <x-label>
                    Medicamento sebthi
                </x-label>
                <x-input name="medicamento" class="w-full mb-4"/>
            </div>
            <div class="flex justify-end">
                <x-button>
                    CREAR
                </x-button>
            </div>
        </form>  
</x-app-layout>