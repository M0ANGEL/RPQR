<x-app-layout>

    
<form  id="shoForm" style="display: block;" method="POST"
    class="bg-white rounded-lg p-6 shadow-lg">
       @csrf
       @method('PUT')
       <h1 style="color: blue" class="text-center" ><b>REPORTE DE EVENTOS</b></h1>
      

        <div class="mb-4">
            <x-label> Usuario que reporta </x-label>
            <x-input class="w-full" value="{{$reportes_regente->user->name}}" readonly />
        </div>

        <div class="mb-4">
            <x-label> Servicio Redvital</x-label>
            <x-input class="w-full" value="{{$reportes_regente->redservicio}}" readonly/>
         </div>

        <div class="mb-4">
            <x-label>Servicio Huv </x-label>
            <x-input class="w-full"  value="{{$reportes_regente->huvservicio}}" readonly/>
        </div>

        <div class="mb-4">
            <x-label>Fecha del evento </x-label>
            <x-input class="w-full" value="{{$reportes_regente->fechareporte}}" readonly/>
        </div>

        <div class="mb-4">
            <x-label>Tipo de medida correctiva </x-label>
            <x-input class="w-full" value="{{$reportes_regente->tipo_accion}}" readonly/>
        </div>

        <div class="mb-4">
            <x-label>Reporte de falla </x-label>
            <textarea   rows="4"
                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
                readonly>{{$reportes_regente->reporte}}
            </textarea>
        </div>
     
        @switch($reportes_regente->estado)
            @case(2)
                <h1 style="color: red" class="text-center"><b>EL CASO FUE RECHAZADO</b></h1>
                    
                <div class="mb-4">
                    <x-label>Motivo de rechazo</x-label>
                    <x-input class="w-full" value="{{$reportes_regente->rechazado}}" readonly/>
                </div>

                <div class="flex justify-center mt-4">
                    <button type="button" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150" style="background-color: greenyellow"
                    id="btnOcultarShoForm">
                        EDITAR RESPUESTAS
                    </button>
                </div>  
                @break
            @case(3)
                @if ($reportes_regente->estado==3)
                    <h1 style="color: blue" class="text-center"><b>SOLUCION DEL CASO POR REGENTE</b></h1>
                    <p class="text-center mb-4">Responder el siguiente cuestionario</p>
                        
                    <div class="flex justify-center mt-4">
                        <button type="button" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150" style="background-color: greenyellow"
                        id="btnOcultarShoForm">
                            RESPONDER
                        </button>
                    </div>      
                @endif   
                
            @case(4)
                @if ($reportes_regente->estado==4)
                <p style="color:green" class="text-center"><b>RESPUESTA ENVIADA CORRECTAMENTE</b></p>  
                    
                @endif
          
                @break
            @default
                
        @endswitch
    

    </form>

    {{---------------------------------- preguntas por que---------------------------- --}}
<form style="display: none" id="respuestasForm" action="{{route('reportes_regente.update',$reportes_regente)}}" method="POST"
    class="bg-white rounded-lg p-6 shadow-lg">
       @csrf
       @method('PUT')
            <h1 style="color: blue" class="text-center">
                <b>RESPONDA LAS PREGUNTAS Y ENVIAR PARA EL CIERRE DEL CASO</b>
            </h1>
        <div class="mb-4">
            <x-label><P style="color: red">Problema/Hallazgo</P></x-label>
            <textarea   rows="4"
            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
            readonly>{{$reportes_regente->reporte}}</textarea>
        </div>
           
        <div class="mb-4">
            <x-label> Porque #1 </x-label>
            <x-input class="w-full"  value="{{$reportes_regente->porque1}}" name="porque1" required />
        </div>
    
        <div class="mb-4">
            <x-label> Respuesta porque #1 </x-label>
            <x-input class="w-full" value="{{$reportes_regente->respuesta_porque1}}" name="respuesta_porque1" required />
        </div>
            
        <div class="mb-4">
            <x-label> Porque #2</x-label>
            <x-input class="w-full" value="{{$reportes_regente->porque2}}" name="porque2" />
        </div>

        <div class="mb-4">
            <x-label> Respuesta porque #2 </x-label>
            <x-input class="w-full" value="{{$reportes_regente->respuesta_porque2}}" name="respuesta_porque2"  />
        </div>

        <div class="mb-4">
            <x-label>Porque #3 </x-label>
            <x-input class="w-full" value="{{$reportes_regente->porque3}}" name="porque3" />
        </div>

        <div class="mb-4">
            <x-label>Respuesta porque #3 </x-label>
            <x-input class="w-full" value="{{$reportes_regente->respuesta_porque3}}" name="respuesta_porque3"  />
        </div>

        <div class="mb-4">
            <x-label>Porque #4 </x-label>
            <x-input class="w-full" value="{{$reportes_regente->porque4}}" name="porque4" />
        </div>

        <div class="mb-4">
            <x-label> Respuesta porque #4 </x-label>
            <x-input class="w-full" value="{{$reportes_regente->respuesta_porque4}}" name="respuesta_porque4"  />
        </div>

        <div class="mb-4">
            <x-label>Porque #5 </x-label>
            <x-input class="w-full" value="{{$reportes_regente->porque5}}"  name="porque5" />
        </div>

        <div class="mb-4">
            <x-label> Respuesta porque #5 </x-label>
            <x-input name="respuesta_porque5" value="{{$reportes_regente->respuesta_porque5}}" class="w-full"   />
        </div>

        <div class="mb-4">
            <x-label>Cauza raiz identificada </x-label>
            <textarea name="causa_raiz" id=""
            class="w-full  border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            rows="8" required>{{$reportes_regente->causa_raiz}}</textarea>
        </div>
         <input type="hidden" name="estado" value="4">
        
        <div class="flex justify-end mt-4">
            <button id="btnOcultarResForm" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150" type="button" style="background-color: rgb(86, 136, 12)" required >
                VOLVER
            </button>
            <x-button class="ml-4"  >
                ENVIAR RESPUESTAS
            </x-button>
        </div>

    </form>

    @push('js')
        <script>
            /* vista */
            document.addEventListener('DOMContentLoaded', function() {
            var botonOcultar = document.getElementById('btnOcultarShoForm');
            var formulario = document.getElementById('shoForm');

            /* respuestas */
            var botonOcultar1 = document.getElementById('btnOcultarResForm');
            var formulario1 = document.getElementById('respuestasForm');


            botonOcultar.addEventListener('click', function() {
                formulario.style.display = 'none'; // Ocultar el formulario
                formulario1.style.display = 'block'; // mostrar el formulario
            });

            botonOcultar1.addEventListener('click', function() {
                formulario.style.display = 'block'; // mostrar el formulario
                formulario1.style.display = 'none'; // Ocultar el formulario
            });
        });
        </script>
    @endpush

</x-app-layout>