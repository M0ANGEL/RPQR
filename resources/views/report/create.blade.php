<x-app-layout>
    <form action="{{route('reportar.store')}}" method="POST"
    class="bg-white rounded-lg p-6 shadow-lg" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 1); ">
        @csrf

        <h1 class="text-center mb-4 " style="color: blue">
            <b>Reportes de novedades de sala</b>
        </h1>

        <div class="mb-4">
            <x-label> Farmacia redvital donde ocurre la novedad </x-label>
            <x-select required class="w-full" name="redservicio">
                <option value="Principal"></option>
                <option value="Principal">Principal</option>
                <option value="Urgencias">Urgencias</option>
                <option value="bodega">Bodega</option>
                <option value="Uci">Uci</option>
                <option value="AltoCosto">Alto costo</option>
                <option value="Operaciones">Operaciones</option>
                <option value="Partos">Partos</option>   
            </x-select>
        </div>

        <div class="mb-4">
            <x-label>Fecha de la novedad</x-label>
            <x-input class="w-full" type="date" name="fechareporte"/>
        </div>

        <div class="mb-4">
            <x-label>Servicio  donde ocurre la novedad</x-label>
            <x-input required class="w-full" name="huvservicio"/>
        </div>

        <div class="mb-4">
            <x-label>Nombre de quien esta imbolucrado</x-label>
            <x-input required class="w-full" name="imbolucrado"/>
        </div>

        <div class="mb-4">
            <x-label>Empresa del imbolucrado</x-label>
            <x-input required class="w-full" name="empresa"/>
        </div>


        <div class="mb-4">
            <x-label>Reporte de lo que paso</x-label>
            <textarea name="reporte" cols="" rows="8"
            class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
            placeholder="Escribe tu reporte" required></textarea>
        </div>
        
     
    

        <div class="flex justify-end">
            <x-button>
                Enviar
            </x-button>
        </div>
    </form>
       
    </x-app-layout>