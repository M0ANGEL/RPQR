<x-app-layout> 
    
    <style>
        img{
            width: 100%;
        }
    </style>
    

    <div  class="flex justify-end mb-4"> 
        <x-button style="background: red;">
            <a href="{{route('indicadores.create')}}">VOLVER</a>
        </x-button>  
    </div>
    <img src="{{ asset('images/fichas_tecnicas/hallazgos.jpg') }}" alt="Imagen">
</x-app-layout>  