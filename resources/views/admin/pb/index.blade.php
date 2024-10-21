<x-app-layout>    
    <div class="flex justify-end mb-4">
        <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
        href="{{route('gestion.create')}}">CREAR SOLICITUD HUV</a>
    </div>

    <style>
        #marco{
               border: 2px solid #BDC3C7 
           }

           #filas:hover{
           background: rgb(234, 242, 248)
           }
   </style>
    
<div id="marco" class="relative overflow-x-auto" style="border-radius: 6px">
    <table class="w-full text-sm text-center rtl:text-right text-gray-800 dark:text-gray-800" style="border: rgb(172, 174, 175)">
        <thead class="text-xs text-gray-50 uppercase  dark:bg-gray-700 dark:text-white-400" style="background: rgb(52, 73, 94);">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Requerimiento
                </th>
                <th scope="col" class="px-6 py-3">
                    Bodega nueva
                </th>
                <th scope="col" class="px-6 py-3">
                    Usuario clonar servinte
                </th>
                <th scope="col" class="px-6 py-3">
                    Usuario clonar sebthi
                </th>
                <th scope="col" class="px-6 py-3">
                    Estado Servinte
                </th>
                <th scope="col" class="px-6 py-3">
                    Estado Sebthi
                </th>
            </tr>
        </thead>
        <tbody>
             @foreach ($reports as $report) 
             <tr id="filas" class=" border-b  dark:border-gray-700" style="color: rgb(44, 62, 80)">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        {{$report->id}}
                    </th>
                    <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                        {{$report->name}}
                    </td>
                    <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                        {{$report->pb}}
                    </td>
                    <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                        {{$report->bodega_nueva}}
                    </td>
                    <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                        {{$report->usuario_clonar_servinte}}
                    </td>
                    <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                        {{$report->usuario_clonar_sebthi}}
                    </td>
                    @switch($report->estado_servinte)
                        @case(0)
                                <td style="color: rgb(44, 62, 80)"><p style="color:rgb(0, 60, 255)"><b>En espera</b></p></td>    
                            @break
                        @case(1)
                                <td style="color: rgb(44, 62, 80)"><p style="color:rgb(52, 84, 3)"><b>Realizado</b></p></td>    
                            @break
                        @default
                    @endswitch
                    @switch($report->estado_sebthi)
                        @case(0)
                                <td style="color: rgb(44, 62, 80)"><p style="color:rgb(0, 60, 255)"><b>En espera</b></p></td>    
                            @break
                        @case(1)
                                <td style="color: rgb(44, 62, 80)"><p style="color:rgb(79, 121, 15)"><b>Realizado</b></p></td>    
                            @break
                        @default
                    @endswitch
                </tr>
            @endforeach 
        </tbody>
        
    </table>
   
</div>
<div class="mt-8">
    {{$reports->links()}}
</div> 


<script>
    function estado(){
        alert('No se puede editar, el usuario ya fue creado');
    }
</script>
   
</x-app-layout>