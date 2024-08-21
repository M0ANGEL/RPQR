<x-app-layout>

    <form action="{{route('gestion.store')}}" method="POST" 
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
            @csrf
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
                   <option value=""></option>
                   <option value="w001">w001</option>
                   <option value="w001">w003</option>
                   <option value="w001">w004</option>
                   <option value="w001">w005</option>
                   <option value="w001">w007</option>
                   <option value="w001">w011</option>
                   <option value="w001">w012</option>
                   <option value="w001">w013</option>
                   <option value="w001">w017</option>
                   <option value="w001">Wvit</option>
                </x-select>
            </div>
            <div>
                <x-label>
                    Usuario referencia
                </x-label>
                <x-input name="usuario_clonar" class="w-full mb-4"/>
            </div>
            <div>
                <x-label>
                    Cedula de usuario referencia
                </x-label>
                <x-input name="cedula" class="w-full mb-4"/>
            </div>

            <div>
                <x-label>
                    Motivo de solicitud
                </x-label>
                <textarea name="reporte" id=""  rows="4" class="border-gray-300 mb-4 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"></textarea>
            </div>

            <div class="flex justify-end">
                <x-button>
                    SOLICITAR
                </x-button>
            </div>
        </form>  
</x-app-layout>