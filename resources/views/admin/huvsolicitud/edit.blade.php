<x-app-layout>

    <form action="{{route('solicitud.update',$solicitud)}}" method="POST"
    class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
        @csrf

        @method('PUT')
        <div class="mb-4">
            <x-label>
                Nombre
            </x-label>
            <x-input 
            class="w-full" value="{{$solicitud->name}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Cedula
            </x-label>
            <x-input 
            class="w-full" value="{{$solicitud->cedula}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Bodega
            </x-label>
            <x-input 
             class="w-full" value="{{$solicitud->bodega}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Area
            </x-label>
            <x-input 
            class="w-full" value="{{$solicitud->area}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Correo Redvital
            </x-label>
            <x-input 
            class="w-full" value="{{$solicitud->correo_redv}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Cargo
            </x-label>
            <x-input 
           class="w-full" value="{{$solicitud->cargo}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Bodega
            </x-label>
            <x-input 
            class="w-full" value="{{$solicitud->bodega}}" readonly required />
        </div>
        <div class="mb-4">
            <x-label>
                Usuario Referencia
            </x-label>
            <x-input 
            class="w-full" value="{{$solicitud->usuario_clonar_huv}}" readonly  />
        </div>
        <div class="mb-4">
            <x-label>
                Cedula Usuario Referencia
            </x-label>
            <x-input 
            class="w-full" value="{{$solicitud->cedula_clonar}}" readonly  />
        </div>

        <h1 style="color: blue" class="mb-4"><b>Credenciales de usuario</b></h1>
        <div class="mb-4">
            <x-label>
                Usuario
            </x-label>
            <x-input 
            name="login_servinte" class="w-full"  required />
        </div>
        <div class="mb-4">
            <x-label>
                Password
            </x-label>
            <x-input 
            name="password_servinte" type="password" class="w-full"  required />
        </div>

        <div class="mb-4">
            <input type="hidden" value="0" name="activo">


            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" value="1" 
                name="activo_servinte" class="sr-only peer"
                @checked(old('activo_sebthi',$solicitud->activo_servinte == 1))>
                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-black-300">
                    @if ($solicitud->activo_servinte==1)
                        <p style="color: blue">Realizado</p> 
                    
                    @else
                        <p style="color: red">Pendiente</p>
                    
                    @endif
                </span>
            </label>
        </div>
        
       
        <div class="flex justify-end">

            <x-button>
                Actualizar
            </x-button>
        </div>
    </form>  
</x-app-layout>