<x-app-layout>
    <div class="flex justify-end mb-4">
        <a style="background-color: rgb(8, 35, 99)"
            class="inline-flex items-center px-4 mr-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
            href="{{ route('TikectPendientesCalificados.index') }}">Volver al Menu</a>
    </div>

    <form action="" method="POST" class="bg-white rounded-lg p-6 shadow-lg">
        <div>
            <h1 class="text-center mb-4" style="color: blue">
                <b>Informacion detallada <br> Ticket {{ $tickesPendiente->numero_tike }} </b>
                <br>
                <p><b>Cerrado</b></p>
            </h1>

        </div>

        {{-- assd --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <x-label>Categoria</x-label>
                <x-input class="w-full" value="{{ $tickesPendiente->categoria }}" readonly />
            </div>
            <div>
                <x-label>Sub categoria</x-label>
                <x-input class="w-full" value="{{ $tickesPendiente->subcategoria }}" readonly />
            </div>
            <div>
                <x-label>Sedes</x-label>
                <x-input class="w-full" value="{{ $tickesPendiente->sede }}" readonly />
            </div>
        </div>



        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="mb-4">
                <x-label>Descripción detallada del requerimiento</x-label>
                <textarea id="descripcion" cols="" rows="3"
                    class="border w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" readonly>{{ $tickesPendiente->detalle }}</textarea>
            </div>
            {{-- si el ticket ya esta autorizado --}}
            @if ($tickesPendiente->autorizacion == 2)
                <div class="mb-4">
                    <x-label><b>Observacion del area encargada de autorizar</b></x-label>
                    <textarea name="respuesta" cols="" rows="3" readonly
                        class="border w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ $tickesPendiente->respuesta_autorizacion ? $tickesPendiente->respuesta_autorizacion : 'El ticket fue autorizado por el area encargada' }} </textarea>
                </div>
            @endif
            <div class="mb-4">
                <x-label>Observaciones</x-label>
                <textarea id="descripcion" cols="" rows="3"
                    class="border w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" readonly>{{ $tickesPendiente->respuesta ? $tickesPendiente->respuesta : 'Ticket Realizado con exito' }}</textarea>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <x-button>
                    <a href="nada">Descargar Archivos</a>
                </x-button>
            </div>
        </div>



        <h2 class="text-center mb-4" style="color: blue">
            <b>Información</b>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <x-label>Usuario Que Crea El Ticket</x-label>
                <x-input class="w-full" value="{{ $tickesPendiente->usuario_reporta }}" readonly />
            </div>
            <div>
                <x-label>Fecha de cierre del reporte</x-label>
                <x-input class="w-full" value="{{ $tickesPendiente->updated_at }}" readonly />
            </div>
            <div>
                <x-label>Encargado de realizar el proceso</x-label>
                <x-input class="w-full" value="{{ $tickesPendiente->user->name }}" readonly />
            </div>
        </div>
        <div class="flex justify-center items-center space-x-4 mt-4">
            <h4>Calificacion: <span style="color: blue"><b>Pendinetes</b></span></h4>

        </div>
    </form>
</x-app-layout>
