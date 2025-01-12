<style>
    .tituloCargueInventario {
        text-align: center;
        margin: 2% 15%;
        background: white;
        border-radius: 9px;
        padding: 1%;
        text-align: 15px;
    }

    .contenedorSubidaDatos {
        margin: 2% 25%;
    }
</style>

<x-app-layout>

    <h1 class="tituloCargueInventario"><b>CARGUE DE REPORTES PARA EL INVENTARIO</b></h1>
    <div class="contenedorSubidaDatos">
        <div class="container mx-auto p-4">
            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('EntregaMedicamentos.store') }}" method="POST">
                    @csrf
                    <div class="flex items-center justify-center w-full mb-4">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-500 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click a aqui</span> o arrastre archivo</p>
                            </div>
                            <input id="dropzone-file" type="file" class="hidden" />
                        </label>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="w-full bg-blue-500 rounded-lg p-2 text-white">
                            <b>Cargar Reportes</b>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
