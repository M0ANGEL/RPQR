<x-app-layout>    

    <h1 class="text-center mb-4 " style="color: blue"><b>REPORTES DE FARMACIA A SERVICIOS</b></h1>
    
<div class="relative overflow-x-auto" style="border-radius: 6px">
    <table class="w-full text-sm text-center rtl:text-right text-gray-800 dark:text-gray-800">
        <thead class="text-xs text-gray-50 uppercase bg-gray-800 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha Creacion
                </th>
                <th scope="col" class="px-6 py-3">
                    Servicio Redvital
                </th>
                <th scope="col" class="px-6 py-3">
                    Sericio Huv
                </th>
                <th scope="col" class="px-6 py-3">
                    Medida correctiva
                </th>
                <th scope="col" class="px-6 py-3">
                    Estado
                </th>
                <th scope="col" class="px-6 py-3">
                    Ver mas
                </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($reportes_regentes as $reportes_regente) 
                <tr class="bg-white border-b dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$reportes_regente->id}}
                    </th>
   
                    <td class="px-6 py-4">
                        {{$reportes_regente->created_at}}
                    </td>
                
                    <td class="px-6 py-4">
                        {{$reportes_regente->redservicio}}
                    </td>

                    <td class="px-6 py-4">
                        {{$reportes_regente->huvservicio}}
                    </td>

                    <td class="px-6 py-4">
                        {{$reportes_regente->tipo_accion}}
                    </td>
                    @switch($reportes_regente->estado)
                        @case(2)
                            <td><p style="color:red"><b>RECHAZADO</b><p></td>    
                            @break
                        @case(3)
                            <td><p style="color:rgb(47, 184, 47)"><b>ABIERTO</b></p></td>    
                            @break
                        @case(4)
                            <td><p style="color:rgb(107, 234, 238)"><b>ENVIADO</b></p></td>    
                            @break
                        @default
                         
                    @endswitch

                    <td class="px-6 py-4">
                        <a href="{{route('reportes_regente.edit',$reportes_regente)}}">
                            <i class="fa-regular fa-eye"></i>
                        </a>
                    </td>
                </tr>
            @endforeach 
        </tbody>
        
    </table>
   
</div>

<div class="mt-8">
    {{$reportes_regentes->links()}}
</div>




   
</x-app-layout>
