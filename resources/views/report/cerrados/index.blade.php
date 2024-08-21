<x-app-layout>    
    <div class="flex justify-end mb-4">
        <x-button type="button">
            <a href="{{route('reporte.index',$reports)}}">CASOS PENDIENTES</a>
        </x-button>
    </div>
    @if ($reports->count())
    <h1 class="text-center mb-4 " style="color: blue"><b>REPORTES DE FARMACIA A SERVICIOS CERRADOS</b></h1>
    
    <x-app-layout>
   
        <form style="display: block" id="shoForm" action="{{route('reporte.update',$reporte)}}" method="POST"
            class="bg-white rounded-lg p-6 shadow-lg">
               @csrf
               @method('PUT')
               <h1 style="color: blue" class="text-center" ><b>REPORTE DE EVENTOS</b></h1>
                <div class="mb-4">
                    <x-label> Fecha Creacion </x-label>
                    <x-input class="w-full"  value="{{$reporte->created_at}}"  readonly />
                </div>
        
                <div class="mb-4">
                    <x-label> Usuario que reporta </x-label>
                    <x-input class="w-full" value="{{$reporte->user->name}}" readonly />
                </div>
        
                <div class="mb-4">
                    <x-label> Bodega usuario </x-label>
                    <x-input class="w-full" readonly value="{{$reporte->user->bodega}}" />
                </div>     
        
                <div class="mb-4">
                    <x-label> Servicio Redvital</x-label>
                    <x-input class="w-full" value="{{$reporte->redservicio}}" readonly/>
                </div>
        
                <div class="mb-4">
                    <x-label>Servicio Huv </x-label>
                    <x-input class="w-full" value="{{$reporte->huvservicio}}"  readonly/>
                </div>
        
                <div class="mb-4">
                    <x-label>Fecha del evento </x-label>
                    <x-input class="w-full" value="{{$reporte->fechareporte}}" readonly/>
                </div>
        
                <div class="mb-4">
                    <x-label>Reporte de falla </x-label>
                    <textarea name="reporte" {{--cols="146"--}} rows="6"
                    class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
                    readonly>{{$reporte->reporte}}</textarea>
                </div>
                @if ($reporte->estado==0)
                    <div class="mb-4">
                        <x-label>
                            Regente encargado
                        </x-label>
                        <x-select class="w-full" name="regente" >
                            @foreach ($regentes as $regene)           
                                <option value={{$regene->bodega}}>{{$regene->name}}</option>
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
        
                <input  type="hidden" name="estado" value="3">
              {{--   <input  type="hidden" name="rechazado" value="pendiente"> --}}
        
        
                {{-- rechazado por --}}
                @if ($reporte->estado==1)
                 <h1 style="color: blue" class="text-center"><b>CIERRE DE REPORTE</b></h1>
                    <div class="mb-4">
                        <x-label>Reporte cerrado por: </x-label>
                        <x-input class="w-full" value="{{$reporte->user->name}}" readonly/>
                    </div>
                @endif
                {{-- rechazar --}}
        
                @if ($reporte->estado==1)
                    <p style="color: rgb(10, 35, 143)" class="text-end"><b>El caso esta cerrado correctamente</b></p>    
                @else
                    <div class="flex justify-end">
        
                        @if ($reporte->estado==4)
                            <button type="button" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150" style="background-color: rgb(47, 206, 255)"
                            id="btnOcultarShoForm">
                                RESPUESTAS
                            </button>
                        @endif
        
                        @if ($reporte->estado==0)
                            {{-- manda el formulario full --}}
                            <x-button type="button" onclick="direccion()" style="background-color: green" class="ml-4 inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Direcionar
                            </x-button>
                        @endif
        
                        {{-- manda el formulario pequeño del scrip --}}
                        <button type="button" class=" ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150" onclick="update()">
                            Cerrar
                        </button>
                    </div>
                @endif
               
            </form>
        
            {{-- --------------------------------------------------------------------- --}}
            
        <form style="display: none" id="respuestasForm" method="POST" action="{{route('reporte.update',$reporte)}}"
            class="bg-white rounded-lg p-6 shadow-lg">
            @csrf
            @method('PUT')
        
            <h1 style="color: blue" class="text-center" ><b>RESPUESTA DE REGENTE ANTE EL EVENTO</b></h1>
        
            <div class="mb-4">
                <x-label><P style="color: red">Problema/Hallazgo</P></x-label>
                <textarea  cols="148" rows="4"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
                readonly>{{$reporte->reporte}}</textarea>
            </div>
               
            <div class="mb-4">
                <x-label> PORQUE #1 </x-label>
                <x-input class="w-full" readonly value="{{$reporte->porque1}}"/>
            </div>
        
            <div class="mb-4">
                <x-label> RESPUESTA PORQUE #1 </x-label>
                <x-input class="w-full" readonly value="{{$reporte->respuesta_porque1}}"/>
            </div>
                
            <div class="mb-4">
                <x-label> PORQUE #2</x-label>
                <x-input class="w-full" readonly value="{{$reporte->porque2}}"/>
            </div>
        
            <div class="mb-4">
                <x-label> RESPUESTA PORQUE #2 </x-label>
                <x-input class="w-full" readonly value="{{$reporte->respuesta_porque2}}"/>
            </div>
        
            <div class="mb-4">
                <x-label>PORQUE #3 </x-label>
                <x-input class="w-full" readonly value="{{$reporte->porque3}}"/>
            </div>
        
            <div class="mb-4">
                <x-label> RESPUESTA PORQUE #3 </x-label>
                <x-input class="w-full" readonly value="{{$reporte->respuesta_porque3}}"/>
            </div>
        
            <div class="mb-4">
                <x-label>PORQUE #4 </x-label>
                <x-input class="w-full" readonly value="{{$reporte->porque4}}"/>
            </div>
        
            <div class="mb-4">
                <x-label> RESPUESTA PORQUE #4 </x-label>
                <x-input class="w-full" readonly value="{{$reporte->respuesta_porque4}}"/>
            </div>
        
            <div class="mb-4">
                <x-label>PORQUE #5 </x-label>
                <x-input class="w-full" readonly value="{{$reporte->porque5}}"/>
            </div>
        
            <div class="mb-4">
                <x-label> RESPUESTA PORQUE #5 </x-label>
                <x-input class="w-full" readonly value="{{$reporte->respuesta_porque5}}"/>
            </div>
        
            <div class="mb-4">
                <x-label>Cauza raiz identificada por regente </x-label>
                <textarea  id="" readonly
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                 rows="4">{{$reporte->causa_raiz}}</textarea>
            </div>
           
            {{-- rechazo --}}
        
            <input  type="hidden" name="estado" value="2">
        
            <div class="mb-4" style="display: none" id="rechaz">
                <x-label style="color:red"><b>MOTIVO DEL RECHAZO</b></x-label>
                <textarea rows="4" name="rechazado" required
                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
            </div>
            
            <div class="flex justify-end mt-4">
                 {{-- manda el formulario de rechazo --}}
                @if ($reporte->estado==4)
                    <x-button type="button" style="display: block" 
                    class="ml-4  inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                    id="btnRechazo">Rechazar</x-button>
                @endif
        
                {{-- enviar rechazo --}}
                <x-button type="button" onclick="formRechazo()" style="display: none" id="btnConfirmarRechazo" class="ml-4  inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150{{-- " onclick="rechazar() --}}">
                    Confirmar Rechazo
                </x-button>
                
                <button id="btnOcultarResForm" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150" type="button" style="background-color: rgb(86, 136, 12)" >
                    VOLVER
                </button>
            </div>    
        </form>
            {{-- update --}}
        <form action="{{route('reporte.update', $reporte)}}" method="POST" id="formDelete">
                @csrf
                @method('PUT')
                <input  type="hidden" name="estado" value="1">
        </form>
        
       
        
       

    @else
    <div class="mt-5  bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">No hay solicitudes pendientes.</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>
    @endif

    {{-- js --}}
    @push('js')
    <script>
        /* envio de formilarios extras */
            function update(){
                form = document.getElementById('formDelete');
                form.submit();  
            }

            function formRechazo(){
                form = document.getElementById('respuestasForm');
                form.submit();  
            }

            function direccion(){
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
