<x-app-layout>

    <form action="{{route('Inventarios_Registros.store')}}" method="POST" 
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
            @csrf
            <div class="mb-4">
                <x-label>
                    Tipo de equipo
                </x-label>
                <x-select class="w-full" name="modelo">
                    <option value="Pc">Pc de mesa</option>
                    <option value="Portatil">Portatil</option>
                    <option value="TodoEnUno">Todo en uno</option>
                    <option value="Monitor">Monitor</option>
                    <option value="Impresora">Impresora</option>
                    <option value="Scanner">Scanner</option>
                </x-select>
            </div>
            <div class="mb-4">
                <x-label>
                    Marca del equipo
                </x-label>
                <x-input name="marca" class="w-full" required placeholder="Ejemplo Lenovo / Hp"/>
            </div>
            <div class="mb-4">
                <x-label>
                    Numero de activo del equipo
                </x-label>
                <x-input name="activo" class="w-full" required placeholder="Numero de la placa"/>
            </div>
            
            <div class="mb-4">
                <x-label>
                    Proveedor
                </x-label>
                <x-select class="w-full" name="proveedor">
                    <option value="Redvital">Redvital</option>
                    <option value="Zinko">Zinko</option>
                    <option value="Cpyparte">Cpyparte</option>
                    <option value="Integratyc">Integratyc</option>
                    <option value="Farmart">Farmart</option>
                </x-select>
            </div>

            <div class="mb-4">
                <x-label>
                    Cantidad de memoria ram
                </x-label>
                <x-input name="ram" class="w-full" placeholder="Catidad ram si es monito dejas en blanco"/>
            </div>
            <div class="mb-4">
                <x-label>
                    Tidpo de disco
                </x-label>
                <x-select name="disco" class="w-full" >
                    <option value="" >No aplica</option>
                    <option value="Solido">Disco Solido</option>
                    <option value="Duro">Disco Duro</option>
                </x-select>
            </div>
            <div class="mb-4">
                <x-label>
                    Espacio del disco
                </x-label>
                <x-input name="espacio_disco" class="w-full" placeholder="Ejemplo 500GB si no aplica dejar en blanco" />
            </div>
            <div class="flex justify-end">
                <x-button style="background: green;">
                    REGISTRAR EQUIPOS
                </x-button>
            </div>
        </form>
    


    

    @push('js')
        <script>
            /* envio de formilarios extras */
                function busqueda(){
                    form = document.getElementById('busqueda');
                    form.submit();  
                }

        </script>

    @endpush
   
</x-app-layout>