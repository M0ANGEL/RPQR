<x-app-layout>
    <form action="{{route('roles.update',$role)}}" method="POST"
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
        @csrf
        @method('PUT')
        <div class="mb-4">
            <x-label>
                Roll
            </x-label>
            <x-input 
            name="name"
            class="w-full" 
            placeholder="Escriba el nombre del roll" value="{{$role->name}}" required />
        </div>
        <div class="mb-4">
            <ul>
                @foreach ($permissions as $permission)
                    <li>
                        <x-checkbox name="permissions[]"
                        value="{{$permission->id}}"
                        :checked="in_array($permission->id, $role->permissions->pluck('id')->toArray())"/>
                        {{$permission->name}}
                    </li>
                 @endforeach
            </ul>
           
        </div>
        <div class="flex justify-end">
            
            <x-danger-button class="mr-2" onclick="deleteRol()">
                Eliminar
            </x-danger-button>

            <x-button>
                Actualizar
            </x-button>
        </div>
    </form>

    {{-- form de delete --}}
    <form action="{{route('roles.destroy', $role)}}" 
    method="POST" id="formDelete">
        @csrf
        @method('DELETE')
    </form>

    @push('js')
        <script>
            function deleteRol(){
                form = document.getElementById('formDelete');
                form.submit();
            }
        </script>
    @endpush
</x-app-layout>