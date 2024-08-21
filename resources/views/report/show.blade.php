<x-app-layout>    
    <div class="flex justify-end mb-4">
        <x-button type="button">
            <a href="{{route('reporte.index',$reports)}}">CASOS PENDIENTES</a>
        </x-button>
    </div>
    @if ($reports->count())
    <h1 class="text-center mb-4 " style="color: blue"><b>REPORTES DE FARMACIA A SERVICIOS CERRADOS</b></h1>
    
    <div class="relative overflow-x-auto" style="border-radius: 6px">
        <table  class="w-full text-sm text-center rtl:text-right text-gray-800 dark:text-gray-800">
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
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ver mas
                    </th>
                </tr>
            </thead>
            <tbody>

                @foreach ($reports as $reporte) 
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$reporte->id}}
                        </th>
    
                        <td class="px-6 py-4">
                            {{$reporte->created_at}}
                        </td>
                    
                        <td class="px-6 py-4">
                            {{$reporte->redservicio}}
                        </td>

                        <td class="px-6 py-4">
                            {{$reporte->huvservicio}}
                        </td>
                        @switch($reporte->estado)
                            @case(0)
                            <td><p style="color:rgb(247, 244, 95)">PENDIENTE</p></td>>    
                                @break
                            @case(1)
                                    <td><p style="color:aliceblue">CERRADO</p></td>    
                                @break
                            
                            @default
                            
                        @endswitch

                        <td class="px-6 py-4">
                            <a href="{{route('reporte.edit',$reporte)}}">
                                <i class="fa-regular fa-eye"></i>
                            </a>
                        </td>
                    
                    </tr>
                @endforeach 
            </tbody>
            
        </table>

        <div class="mt-8">
            {{$reports->links()}}
        </div>
    
    </div>

    

    @else
    <div class="mt-5  bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">No hay solicitudes pendientes.</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>
    @endif
 
</x-app-layout>
