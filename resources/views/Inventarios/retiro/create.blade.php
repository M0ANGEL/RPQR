<x-app-layout>

    <form action="{{route('entregas.store')}}" method="POST" 
        class="bg-white rounded-lg p-6 shadow-lg" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 1); ">
            @csrf

            <div class="mb-4">
                <x-label>
                    Serial De Equipo
                </x-label>
                <x-select class="w-full" name="equipos_id">    
                   @foreach ($equipos as $equipo)
                    <option value="{{$equipo->id}}">{{$equipo->serial}}</option>
                   @endforeach
                </x-select>
            </div>

            <div class="mb-4">
                <x-label>
                    Cliente
                </x-label>
                <x-select class="w-full" name="empresa">    
                   @foreach ($clientes as $cliente)
                    <option value="{{$cliente->name}}">{{$cliente->name}}</option>
                   @endforeach
                </x-select>
            </div>

            <div class="mb-4">
                <x-label>
                   Persona Que Recibe
                </x-label>
                <x-input name="recibe" class="w-full mb-4" required/>
            </div>

            <div class="mb-4">
                <x-label>Observaciones Del Equipo</x-label>
                <textarea name="observacion" cols="" rows="8"
                class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>
            </div>

            <div class="flex justify-end">
                <x-button>
                    CREAR
                </x-button>
            </div>
        </form>  
</x-app-layout>