<x-app-layout>
    <form action="{{ route('reportar.store') }}" method="POST" class="bg-white rounded-lg p-6 shadow-lg"
        style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 1); ">
        @csrf

        <h1 class="text-center mb-4 " style="color: blue">
            <b>Reportes de novedades de sala</b>
        </h1>

        <div class="mb-4">
            <x-label> Reporte subido en la plantilla de sebthi 3.0 </x-label>
            <x-input type="file" name="sebthi"></x-input>
        </div>

        <div class="mb-4">
            <x-label> Reporte subido en la plantilla de servinte</x-label>
            <x-input type="file" name="servinte"></x-input>
        </div>


        <div class="flex justify-end">
            <x-button>
                Enviar
            </x-button>
        </div>
    </form>
</x-app-layout>
