<x-app-layout>

    <form action="{{route('gestion.store')}}" method="POST" 
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
            @csrf
            <h1 style="color: blue; text-align: center;"><b>DATOS DEL USUARIO</b></h1>
            <div class="mb-4">
                <x-label>
                    Nombre Completo
                </x-label>
                <x-input name="name" class="w-full mb-4"/>
            </div>
            <div class="mb-4">
                <x-label>
                    Cedula
                </x-label>
                <x-input name="cedula" class="w-full mb-4"/>
            </div>
            <div class="mb-4">
                <x-label>
                    Usuario servinte
                </x-label>
                <x-input name="usuario_servinte" class="w-full mb-4"/>
            </div>
            <div class="mb-4">
                <x-label>
                    Usuario Sebthi
                </x-label>
                <x-input name="usuario_sebthi" class="w-full mb-4"/>
            </div>
            <div class="mb-4">
                <x-label>
                    Requerimiento
                </x-label>
                <x-select class="w-full" name="pb">    
                   <option value="cambio_bodega">Cambio de bodega</option>
                   <option value="cambio_permiso">Cambio de permisos</option>
                </x-select>
            </div>
            <div class="mb-4">
                <x-label>
                    Bodega nueva
                </x-label>
                <x-select class="w-full" name="bodega_nueva">    
                   <option value="NO_APLICA">NO APLICA</option>
                   <option value="w001">w001</option>
                   <option value="w003">w003</option>
                   <option value="w004">w004</option>
                   <option value="w005">w005</option>
                   <option value="w007">w007</option>
                   <option value="w011">w011</option>
                   <option value="w012">w012</option>
                   <option value="w013">w013</option>
                   <option value="w017">w017</option>
                   <option value="wvit">Wvit</option>
                </x-select>
            </div>
            <h2 style="color: blue; text-align: center;"><b>DATOS USUARIO REFERENCIA</b></h2>
            <div>
                <x-label>
                    Usuario referencia servinte
                </x-label>
                <x-input name="usuario_clonar_servinte" class="w-full mb-4"/>
            </div>
            <div>
                <x-label>
                    Usuario referencia sebthi
                </x-label>
                <x-input name="usuario_clonar_sebthi" class="w-full mb-4"/>
            </div>
            <div>
                <x-label>
                    Cedula de usuario referencia
                </x-label>
                <x-input name="cedula_usuario_referencia" class="w-full mb-4"/>
            </div>

            <div>
                <x-label>
                    Motivo de solicitud
                </x-label>
                <textarea name="reporte" id=""  rows="4" class="border-gray-300 mb-4 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"></textarea>
            </div>

            <div class="flex justify-end">
                <x-button style="background: green;">
                    <b>SOLICITAR</b>
                </x-button>
            </div>
        </form>  
</x-app-layout>