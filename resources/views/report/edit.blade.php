<x-app-layout>

    <form style="display: block" id="shoForm" action="{{ route('reporte.update', $reporte) }}" method="POST"
        class="bg-white rounded-lg p-6 shadow-lg">
        @csrf
        @method('PUT')
        <h1 style="color: blue" class="text-center"><b>REPORTE DE EVENTOS</b></h1>
        <div class="mb-4">
            <x-label> Fecha Creacion </x-label>
            <x-input class="w-full" value="{{ $reporte->created_at }}" readonly />
        </div>

        <div class="mb-4">
            <x-label> Usuario que reporta </x-label>
            <x-input class="w-full" value="{{ $reporte->user->name }}" readonly />
        </div>

        <div class="mb-4">
            <x-label> Bodega usuario </x-label>
            <x-input class="w-full" readonly value="{{ $reporte->user->bodega }}" />
        </div>

        <div class="mb-4">
            <x-label> Servicio Redvital</x-label>
            <x-input class="w-full" value="{{ $reporte->redservicio }}" readonly />
        </div>

        <div class="mb-4">
            <x-label>Servicio Huv </x-label>
            <x-input class="w-full" value="{{ $reporte->huvservicio }}" readonly />
        </div>

        <div class="mb-4">
            <x-label>Imbolucrado</x-label>
            <x-input class="w-full" value="{{ $reporte->imbolucrado }}" readonly />
        </div>

        <div class="mb-4">
            <x-label>Empresa Del Imbolucrado</x-label>
            <x-input class="w-full" value="{{ $reporte->empresa }}" readonly />
        </div>

        <div class="mb-4">
            <x-label>Fecha del evento </x-label>
            <x-input class="w-full" value="{{ $reporte->fechareporte }}" readonly />
        </div>

        <div class="mb-4">
            <x-label>Reporte de falla </x-label>
            <textarea name="reporte" {{-- cols="146" --}} rows="6"
                class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" readonly>{{ $reporte->reporte }}</textarea>
        </div>
        
        @if ($reporte->estado==3)
            <h2 style="color: blue; text-align: center;"><b>DATOS DEL REGENTE ASIGNADO AL CASO</b></h2>
            <div class="mb-4">
                <x-label>Regente</x-label>
                <x-input class="w-full" value="{{ $reporte->regente ? $reporte->regente->name : 'N/A' }}" readonly />
            </div>
            
            <div class="mb-4">
                <x-label>Grupo Bodega</x-label>
                <x-input class="w-full" value="{{ $reporte->grupo_bodega }}" readonly />
            </div>
            
            <h3 style="color: red; text-align: center; font-size:20px; "><b>Esperando respuestas del caso por parte del regente</b></h3>
        @endif

        @if ($reporte->estado==4)
            <h2 style="color: blue; text-align: center;"><b>DATOS DEL REGENTE ASIGNADO AL CASO</b></h2>
            <div class="mb-4">
                <x-label>Regente</x-label>
                <x-input class="w-full" value="{{ $reporte->regente ? $reporte->regente->name : 'N/A' }}" readonly />
            </div>
            
            <div class="mb-4">
                <x-label>Grupo Bodega</x-label>
                <x-input class="w-full" value="{{ $reporte->grupo_bodega }}" readonly />
            </div>
            
        @endif


        @if ($reporte->estado == 0)
            <div class="mb-4">
                <x-label>
                    Regente encargado
                </x-label>
                <x-select class="w-full" name="regente_id">
                    @foreach ($regentes as $regene)
                        <option value={{ $regene->id }}>{{ $regene->name }}</option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-4">
                <x-label>Tipo</x-label>
                <x-select required class="w-full" name="tipo_accion">
                    <option value=""></option>
                    <option value="accion correctiva">ACCIÓN CORRECTIVA</option>
                    <option value="accion preventiva">ACCIÓN PREVENTIVA </option>
                    <option value="accion de mejora">ACCIÓN DE MEJORA</option>
                    <option value="evento adverso">EVENTO ADVERSO</option>
                    <option value="acidente adverso">INCIDENTE ADVERSO</option>
                </x-select>
            </div>

        @endif

        <input type="hidden" name="estado" value="3">
        {{--   <input  type="hidden" name="rechazado" value="pendiente"> --}}


        {{-- rechazado por --}}
        @if ($reporte->estado == 1)
            <h1 style="color: blue" class="text-center"><b>CIERRE DE REPORTE</b></h1>
            <div class="mb-4">
                <x-label>Reporte cerrado por: </x-label>
                <x-input class="w-full" value="{{ $reporte->user->name }}" readonly />
            </div>
        @endif
        {{-- rechazar --}}

        @if ($reporte->estado == 1)

            <button type="button"
                class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
                style="background-color: rgb(47, 206, 255)" id="btnOcultarShoForm">
                VER RESPUESTAS DEL CASO 
            </button>
            <button type="button" style="background: red;"
                    class=" ml-4 inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
                    onclick="activar()">
                    ACTIVAR CASO DE NUEVO
                </button>
            <p style="color: rgb(10, 35, 143)" class="text-end"><b>El caso esta cerrado correctamente</b></p>
        @else
            <div class="flex justify-end">

                @if ($reporte->estado == 4)
                    <button type="button"
                        class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
                        style="background-color: rgb(47, 206, 255)" id="btnOcultarShoForm">
                        RESPUESTAS
                    </button>
                @endif

                @if ($reporte->estado == 0)
                    {{-- manda el formulario full --}}
                    <x-button type="button" onclick="direccion()" style="background-color: green"
                        class="ml-4 inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Direcionar
                    </x-button>
                @endif

                {{-- manda el formulario pequeño del scrip --}}
                
                <button type="button" style="background: blue;"
                    class=" ml-4 inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
                    onclick="update()">
                    Cerrar Caso
                </button>
            </div>
        @endif

    </form>

    {{-- ------------------------CASOS CERRADOS--------------------------------------------- --}}

    <form style="display: none" id="respuestasForm" method="POST" action="{{ route('estado', $reporte) }}"
        class="bg-white rounded-lg p-6 shadow-lg">
        @csrf
        @method('PUT')

        <h1 style="color: blue" class="text-center"><b>RESPUESTA DE REGENTE ANTE EL EVENTO</b></h1>

        <div class="mb-4">
            <x-label>
                <P style="color: red">Problema/Hallazgo</P>
            </x-label>
            <textarea  rows="4"
                class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" readonly>{{ $reporte->reporte }}</textarea>
        </div>

        <div class="mb-4">
            <x-label> PORQUE #1 </x-label>
            <x-input class="w-full" readonly value="{{ $reporte->porque1 }}" />
        </div>

        <div class="mb-4">
            <x-label> RESPUESTA PORQUE #1 </x-label>
            <x-input class="w-full" readonly value="{{ $reporte->respuesta_porque1 }}" />
        </div>

        <div class="mb-4">
            <x-label> PORQUE #2</x-label>
            <x-input class="w-full" readonly value="{{ $reporte->porque2 }}" />
        </div>

        <div class="mb-4">
            <x-label> RESPUESTA PORQUE #2 </x-label>
            <x-input class="w-full" readonly value="{{ $reporte->respuesta_porque2 }}" />
        </div>

        <div class="mb-4">
            <x-label>PORQUE #3 </x-label>
            <x-input class="w-full" readonly value="{{ $reporte->porque3 }}" />
        </div>

        <div class="mb-4">
            <x-label> RESPUESTA PORQUE #3 </x-label>
            <x-input class="w-full" readonly value="{{ $reporte->respuesta_porque3 }}" />
        </div>

        <div class="mb-4">
            <x-label>PORQUE #4 </x-label>
            <x-input class="w-full" readonly value="{{ $reporte->porque4 }}" />
        </div>

        <div class="mb-4">
            <x-label> RESPUESTA PORQUE #4 </x-label>
            <x-input class="w-full" readonly value="{{ $reporte->respuesta_porque4 }}" />
        </div>

        <div class="mb-4">
            <x-label>PORQUE #5 </x-label>
            <x-input class="w-full" readonly value="{{ $reporte->porque5 }}" />
        </div>

        <div class="mb-4">
            <x-label> RESPUESTA PORQUE #5 </x-label>
            <x-input class="w-full" readonly value="{{ $reporte->respuesta_porque5 }}" />
        </div>

        <div class="mb-4">
            <x-label>Cauza raiz identificada por regente </x-label>
            <textarea id="" readonly
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" rows="4">{{ $reporte->causa_raiz }}</textarea>
        </div>

        {{-- rechazo --}}

        <input type="hidden" name="estado" value="2">

        <div class="mb-4" style="display: none" id="rechaz">
            <x-label style="color:red"><b>MOTIVO DEL RECHAZO</b></x-label>
            <textarea rows="4" name="rechazado" required
                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
        </div>

        <div class="flex justify-end mt-4">
            {{-- manda el formulario de rechazo --}}
            @if ($reporte->estado == 4)
                <x-button type="button" style="display: block"
                    class="ml-4  inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    id="btnRechazo">Rechazar</x-button>
            @endif

            {{-- enviar rechazo --}}
            <x-button type="button" onclick="formRechazo()" style="display: none" id="btnConfirmarRechazo"
                class="ml-4  inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150{{-- " onclick="rechazar() --}}">
                Confirmar Rechazo
            </x-button>

            <button id="btnOcultarResForm"
                class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
                type="button" style="background-color: rgb(86, 136, 12)">
                VOLVER
            </button>
        </div>
    </form>
    {{-- update --}}
    <form action="{{ route('estado', $reporte) }}" method="POST" id="formDelete">
        @csrf
        @method('PUT')
        <input type="hidden" name="estado" value="1">
    </form>
    {{-- activar caso --}}
    <form action="{{ route('estado', $reporte) }}" method="POST" id="activar">
        @csrf
        @method('PUT')
        <input type="hidden" name="estado" value="0">
    </form>

    @push('js')
        <script>
            /* envio de formilarios extras */
            function update() {
                form = document.getElementById('formDelete');
                form.submit();
            }

            function activar() {
                form = document.getElementById('activar');
                form.submit();
            }

            function formRechazo() {
                form = document.getElementById('respuestasForm');
                form.submit();
            }

            function direccion() {
                form = document.getElementById('shoForm');
                form.submit();
            }
            /* fin envio de formularios extras */

            document.addEventListener('DOMContentLoaded', function() {
                var botonOcultar = document.getElementById('btnOcultarShoForm');
                var formulario = document.getElementById('shoForm');

                /* respuestas */
                var botonOcultar1 = document.getElementById('btnOcultarResForm');
                var formulario1 = document.getElementById('respuestasForm');


                /* modelo rechazo */

                var botonR = document.getElementById('btnConfirmarRechazo');
                var botonCon = document.getElementById('btnRechazo');
                var rechazo = document.getElementById('rechaz');

                /* fin modelo rechazo */

                botonOcultar.addEventListener('click', function() {
                    formulario.style.display = 'none'; // Ocultar el formulario
                    formulario1.style.display = 'block'; // mostrar el formulario
                });

                botonOcultar1.addEventListener('click', function() {
                    formulario.style.display = 'block'; // mostrar el formulario
                    formulario1.style.display = 'none'; // Ocultar el formulario
                });

                btnRechazo.addEventListener('click', function() {
                    botonR.style.display = 'block'; // Ocultar rechazor
                    botonCon.style.display = 'none'; // mostrar el conromar rechazo
                    rechazo.style.display = 'block'; // mostrar el campo rechazo
                });
            });
        </script>
    @endpush

</x-app-layout>
