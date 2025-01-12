<x-app-layout>
    <div class="flex justify-end mb-4">
        <a style="background-color: rgb(8, 35, 99)"
            class="inline-flex items-center px-4 mr-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
            href="{{ route('Tikes.index') }}">VOLVER</a>
    </div>
    <form action="{{ route('Tikes.update', $Tike) }}" method="POST" class="bg-white rounded-lg p-6 shadow-lg">
        @csrf
        @method('PUT')
        <h1 class="text-center mb-4" style="color: blue">
            <b>Informacion detallada <br> Ticket {{ $Tike->numero_tike }} </b>
        </h1>

        {{-- assd --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <x-label>Categoria</x-label>
                <x-input class="w-full" value="{{ $Tike->categoria }}" readonly />
            </div>
            <div>
                <x-label>Sub categoria</x-label>
                <x-input class="w-full" value="{{ $Tike->subcategoria }}" readonly />
            </div>
            <div>
                <x-label>Sedes</x-label>
                <x-input class="w-full" value="{{ $Tike->sede }}" readonly />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="mb-4">
                <x-label>Descripción detallada del requerimiento</x-label>
                <textarea id="descripcion" cols="" rows="4"
                    class="border w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" readonly>{{ $Tike->detalle }}</textarea>
            </div>
            @if ($Tike->autorizacion == 2)
                <div class="mb-4">
                    <x-label><b>Observacion del area encargada de autorizar</b></x-label>
                    <textarea name="respuesta" cols="" rows="4" readonly
                        class="border w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ $Tike->respuesta_autorizacion ? $Tike->respuesta_autorizacion : 'El ticket fue autorizado por el area encargada' }} </textarea>
                </div>
            @endif
            @if ($Tike->estado === 2)
                <div class="mb-4">
                    <x-label>Observaciones</x-label>
                    <textarea id="descripcion" cols="" rows="4"
                        class="border w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" readonly>{{ $Tike->respuesta ? $Tike->respuesta : 'Ticket resuelto, favor calificar el servicio' }}</textarea>
                </div>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div>
                <x-button style="background: rgb(25, 111, 4);">
                    <a href="nada">Descargar Archivos</a>
                </x-button>
            </div>
        </div>

        @switch($Tike->estado)
            @case(0)
            @case(1)
                @switch($Tike->autorizacion)
                    @case(1)
                        <div class="flex justify-end ">
                            <h4 style="background: rgb(212, 128, 128); border-radius: 9px; padding: 7px; color: rgb(91, 1, 1)">
                                <b>TICKET EN PROCESO ||
                                    <span>NO AUTORIZADO</span>
                                </b>
                            </h4>
                        </div>
                    @break

                    @case(2)
                        <div class="flex justify-end ">
                            <h4 style="background: rgb(128, 212, 131); border-radius: 9px; padding: 7px; color: rgb(1, 91, 1)">
                                <b>TICKET EN PROCESO ||
                                    <span> AUTORIZADO</span>
                                </b>
                            </h4>
                        </div>
                    @break

                    @default
                        <div class="flex justify-end ">
                            <h4 style="background: blue; border-radius: 9px; padding: 7px; color: white"><b>TICKET EN PROCESO</b>
                            </h4>
                        </div>
                @endswitch
            @break

            @case(2)
                <h4 style="color: blue; text-align: center"><b>Califica el servicio prestado <br> nos ayudas mucho a mejorar,
                        gracias.</b>
                </h4>
                <div>
                    {{--  <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div>
                            <x-label>Se siente satisfecho con el servicio</x-label> <br>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                <div>
                                    <x-input class="w-full roun" type="radio" name="satisfaccion" value="Si" />
                                    <x-label class="text-center">Si</x-label>
                                </div>
                                <div>
                                    <x-input class="w-full" type="radio" name="satisfaccion" value="No" />
                                    <x-label class="text-center">No</x-label>
                                </div>
                            </div>
                        </div>

                    </div> --}}

                    <div class="flex justify-center items-center space-x-4 mt-6">
                        <div class="mr-4">
                            <x-select name="calificacion">
                                <option value="5"> ⭐ ⭐ ⭐ ⭐ ⭐ </option>
                                <option value="4"> ⭐ ⭐ ⭐ ⭐ </option>
                                <option value="3"> ⭐ ⭐ ⭐ </option>
                                <option value="2"> ⭐ ⭐ </option>
                                <option value="1"> ⭐ </option>
                            </x-select>
                        </div>
                        <input hidden name="estado" value="3">
                        <div>
                            <x-button style="background: blue;">
                                Confirmar Calificacion
                            </x-button>
                        </div>
                    </div>
                </div>
            @break

            @default
        @endswitch
    </form>
</x-app-layout>
