<x-app-layout>
    <style>
        /* Estilos */
        .buscar {
            margin: 50px 0 50px 340px;
            margin-bottom: 30px;
        }

        .barra {
            width: 500px;
            border-radius: 10px;
            padding: 10px;
            border: solid 2px #111827;
        }

        .btn-buscar {
            padding: 10px;
            border-radius: 10px;
            font-size: 15px;
            background-color: #111827;
            color: aliceblue;
        }

        .btn-buscar:hover {
            padding: 10px;
            border-radius: 10px;
            font-size: 15px;
            background-color: aliceblue;
            border: 3px solid #111827;
            color: #111827;
        }
    </style>

    <form action="{{ route('Inventarios_Entrega.create') }}" method="get">
        <div class="buscar">
            <input class="barra" type="text" name="text" value="{{ $busqueda }}" />
            <input class="btn-buscar" type="submit" value="Buscar">
        </div>
    </form>

    @if (count($datos)<=0)

    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">No hay registro para este activo o esta en uso.</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>

    @else
        <form action="{{ route('Inventarios_Entrega.store') }}" method="POST" class="bg-white rounded-lg p-6 shadow-lg" style="box-shadow: 0px 2px 4px rgba(0, 0, 0, 1); ">
            @csrf

            <div class="mb-4">
                <x-label>Serial De Equipo</x-label>
                <x-select class="w-full" name="equiposPC_id">
                    @foreach ($datos as $dato)
                        <option value="{{ $dato->id }}">{{ $dato->activo }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-4">
                <x-label>Piso</x-label>
                <x-select class="w-full" name="piso">
                        <option value="1">Piso 1</option>
                        <option value="3">Piso 3</option>
                        <option value="4">Piso 4</option>
                        <option value="6">Piso 6</option>
                </x-select>
            </div>

            <div class="mb-4">
                <x-label>Fecha de entrega</x-label>
                <x-input name="fecha_entrega" type="date" class="w-full mb-4" required />
            </div>

            <div class="mb-4">
                <x-label>Area del equipo</x-label>
                <x-select class="w-full" name="bodega">
                    <option value="w001">w001 - principal</option>
                    <option value="w003">w003 - operaciones</option>
                    <option value="w004">w004 - alto costo</option>
                    <option value="w005">w005 - urgencias</option>
                    <option value="w007">w007 - partos</option>
                    <option value="w013">w013 - uci </option>
                    <option value="w017">w017 - devolutivos</option>
                    <option value="wvit">wvit - bodega</option>
                    <option value="auditoria">auditoria</option>
                </x-select>
            </div>

            <div class="mb-4">
                <x-label>Pareja de equipo</x-label>
                <x-input name="pareja"  class="w-full mb-4" required />
            </div>

            <div class="mb-4">
                <x-label>El equipo se entrega con teclado</x-label>
                <x-select class="w-full" name="teclado">
                        <option value="si">Si tiene</option>
                        <option value="no">No tiene</option>
                </x-select>
            </div>

            <div class="mb-4">
                <x-label>El equipo se entrega con mouse</x-label>
                <x-select class="w-full" name="mouse">
                        <option value="si">Si tiene</option>
                        <option value="no">No tiene</option>
                </x-select>
            </div>

            <!-- Casilla para hacer pareja -->
            <label for="pareja"> ¿Pareja?</label>
            <input type="checkbox" id="pareja" onclick="mostrarCampoPareja()" class="mb-4">

            <div id="formularioPareja" style="display: none">
                <div class="mb-4">
                    <x-label>Serial De Equipo</x-label>
                    <x-select class="w-full" name="equiposPC_id">
                        @foreach ($datos as $dato)
                            <option value="{{ $dato->id }}">{{ $dato->activo }}</option>
                        @endforeach
                    </x-select>
                </div>
    
                <div class="mb-4">
                    <x-label>Piso</x-label>
                    <x-select class="w-full" name="piso">
                            <option value="1">Piso 1</option>
                            <option value="3">Piso 3</option>
                            <option value="4">Piso 4</option>
                            <option value="6">Piso 6</option>
                    </x-select>
                </div>
    
                <div class="mb-4">
                    <x-label>Fecha de entrega</x-label>
                    <x-input name="fecha_entrega" type="date" class="w-full mb-4" required />
                </div>
    
                <div class="mb-4">
                    <x-label>Area del equipo</x-label>
                    <x-select class="w-full" name="bodega">
                        <option value="w001">w001 - principal</option>
                        <option value="w003">w003 - operaciones</option>
                        <option value="w004">w004 - alto costo</option>
                        <option value="w005">w005 - urgencias</option>
                        <option value="w007">w007 - partos</option>
                        <option value="w013">w013 - uci </option>
                        <option value="w017">w017 - devolutivos</option>
                        <option value="wvit">wvit - bodega</option>
                        <option value="auditoria">auditoria</option>
                    </x-select>
                </div>
    
                <div class="mb-4">
                    <x-label>Pareja de equipo</x-label>
                    <x-input name="pareja"  class="w-full mb-4" required />
                </div>
    
                <div class="mb-4">
                    <x-label>El equipo se entrega con teclado</x-label>
                    <x-select class="w-full" name="teclado">
                            <option value="si">Si tiene</option>
                            <option value="no">No tiene</option>
                    </x-select>
                </div>
    
                <div class="mb-4">
                    <x-label>El equipo se entrega con mouse</x-label>
                    <x-select class="w-full" name="mouse">
                            <option value="si">Si tiene</option>
                            <option value="no">No tiene</option>
                    </x-select>
                </div>
            </div>
            <div class="flex justify-end">
                <x-button style="background: red;">CREAR ENTREGA</x-button>
            </div>
        </form>
    @endif

    <script>
        function mostrarCampoPareja() {
            var formularioPareja = document.getElementById("formularioPareja");
            if (document.getElementById("pareja").checked) {
                formularioPareja.style.display = "block";
            } else {
                formularioPareja.style.display = "none";
            }
        }
    </script>
</x-app-layout>
