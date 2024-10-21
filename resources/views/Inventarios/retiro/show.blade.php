<x-app-layout>

    <form action="{{route('huv.update',$huv)}}" method="POST"
    class="bg-white rounded-lg p-6 shadow-lg">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <x-label> Nombre Completo </x-label>
            <x-input class="w-full"  value="{{$huv->name}}" required readonly />
        </div>
        <div class="mb-4">
            <x-label> Numero de cedula </x-label>
            <x-input class="w-full" value="{{$huv->cedula}}" readonly required/>
        </div>
        <div class="mb-4">
            <x-label> Telefono </x-label>
            <x-input class="w-full" value="{{$huv->telefono}}" readonly required/>
        </div>     
       <div class="mb-4">
            <x-label> Bodega </x-label>
             <x-input class="w-full" value="{{$huv->bodega}}" readonly required/>
        </div>
        <div class="mb-4">
            <x-label> Usuario Referencia Referencia</x-label>
            <x-input class="w-full" value="{{$huv->usuario_clonar_huv}}" readonly required/>
        </div>
        <div class="mb-4">
            <x-label>Cedula </x-label>
            <x-input class="w-full" value="{{$huv->cedula}}" readonly required/>
        </div>
        <h1 class="mb-4" style="color: blue"><b>Credenciales Servinte</b></h1>
        @if ($huv->activo_servinte == 1)
            <div class="mb-4">
                <x-label>
                    Usuario 
                </x-label>
                <x-input 
                name="clonar" class="w-full" value="{{$huv->login_servinte}}" readonly required/>
            </div>
            <div class="mb-4">
                <x-label>
                    Contraseña
                </x-label>
                <x-input 
                name="clonar" class="w-full" value="{{$huv->password_servinte}}" readonly required/>
            </div>
        @endif

        {{-- usuario sebthis --}}
            <h1 class="mb-4" style="color: blue"><b>Credenciales Sebthi</b></h1>
        @if ($huv->activo_sebthi == 1)
            <div class="mb-4">
                <x-label>
                    Usuario 
                </x-label>
                <x-input 
                name="clonar" class="w-full" value="{{$huv->login_sebthi}}" readonly required/>
            </div>
            <div class="mb-4">
                <x-label>
                    Contraseña
                </x-label>
                <x-input 
                name="clonar" class="w-full" value="{{$huv->password_sebthi}}" readonly required/>
            </div>
        @endif

        {{-- <div class="flex justify-end">
            <x-button>
               <a href="#"> Volver</a>
            </x-button>
        </div> --}}
    </form>


  
</x-app-layout>