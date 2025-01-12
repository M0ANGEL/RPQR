<x-app-layout>
    <div class="container mx-auto p-4">
        <div class="bg-white  shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4  ">CREAR REPORTE DE NOVEDADES</h1>
            <p class="text-gray-600  mb-6">Datos del reporte</p>
            <form action="{{ route('reportar.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div>
                        <label for="">Farmacia</label>
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
                    <div>
                        <label>Fecha De Novedad</label>
                        <x-input class="w-full" type="date" name="fechareporte" />
                    </div>
                    <div>
                        <label>Servicio De La Novedad</label>
                        <x-input required class="w-full" name="huvservicio" />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label>Nombre de quien esta imbolucrado</label>
                        <x-input required class="w-full" name="imbolucrado" />
                    </div>
                    <div>
                        <label>Empresa del imbolucrado</label>
                        <x-input required class="w-full" name="empresa" />
                    </div>
                </div>

                <div class="flex flex-wrap gap-4 mb-6">
                    <div class="flex-1">
                        <label>Reporte de lo que paso</label>
                        <x-textarea name="reporte" cols="" rows="8"
                            class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            placeholder="Escribe tu reporte" required></x-textarea>
                    </div>
                </div>

                <div class="flex justify-end">
                    <x-button type="submit" style="background: rgb(0, 128, 38);">
                        <b>Reportar</b>
                    </x-button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
