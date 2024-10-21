<x-app-layout>

    <form action="{{route('huv.store')}}" method="POST" 
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
            @csrf
            <div class="mb-4">
                <x-label>
                    Nombre Completo
                </x-label>
                <x-input 
                name="name"
                class="w-full" 
                required/>
            </div>
            <div class="mb-4">
                <x-label>
                    Numero de cedula
                </x-label>
                <x-input 
                name="cedula"
                class="w-full" 
                required/>
            </div>
            <div class="mb-4">
                <x-label>
                    Telefono Usuario
                </x-label>
                <x-input 
                name="telefono"
                class="w-full" required
                placeholder="Ejemplo 3110100011" />
            </div>
            <div class="mb-4">
                <x-label>
                    Bodega
                </x-label>
                {{-- componente select --}}
                <x-select class="w-full" name="bodega" >
                    @foreach ($bodegas as $bodega)           
                        <option value={{$bodega->name}}>{{$bodega->name}}</option>
                    @endforeach
            </x-select>
            </div>
            <div class="mb-4">
                <x-label>
                    Perfil de usuario
                </x-label>
                <x-select class="w-full" name="cargo">
                    <option value="Aux Farmacia">Aux Farmacia</option>
                    <option value="Patinador">Patinador</option>
                    <option value="Regente">Regente</option>
                    <option value="Quimico">Quimico</option>
                    <option value="auditoria">Auditoria</option>
                </x-select>
            </div>

            <h1 class="mb-4 mt-4" style="color: blue"><b>Usuarios de referencia para crear perfil nuevo</b></h1>
            <div class="mb-4">
                <x-label>
                    Nombre Completo Usuario Referencia
                </x-label>
                <x-input 
                name="name_referencia"
                class="w-full" 
                placeholder="Nombre Completo" required/>
            </div>
            <div class="mb-4">
                <x-label>
                    Usuario Referencia Servinte
                </x-label>
                <x-input 
                name="usuario_clonar_huv"
                class="w-full" 
                placeholder="Usuario clonar" required/>
            </div>
            <div class="mb-4">
                <x-label>
                    Usuario Referencia Sebthi
                </x-label>
                <x-input 
                name="usuario_clonar_sebthi"
                class="w-full" 
                placeholder="Usuario clonar" required/>
            </div>
            <div class="mb-4">
                <x-label>
                    Cedula Usuario Referencia sin(.)
                </x-label>
                <x-input 
                name="cedula_clonar"
                class="w-full" 
                placeholder="Cedula" required/>
            </div>
            <div class="flex justify-end">
                <x-button>
                    Crear
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