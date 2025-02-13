<x-app-layout>    
    <div class="flex justify-end mb-4">
        <a  style="background-color: rgb(60, 94, 10)" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
        href="{{-- {{route('huv.create')}} --}}">REPORTE/DATOS</a>
    </div>

    <style>
        #marco{
               border: 2px solid #BDC3C7 
           }

           #filas:hover{
           background: rgb(234, 242, 248)
           }
   </style>
    
@if ($reports->count())
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
                        Cedula
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Requerimiento
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Bodega nueva
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Usuario CLonar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Regente que solicitica
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $huvpermiso) 
                <tr id="filas" class=" border-b  dark:border-gray-700" style="color: rgb(44, 62, 80)">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                            {{$huvpermiso->id}}
                        </th>
                        <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                            {{$huvpermiso->name}}
                        </td>
                        <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                            {{$huvpermiso->cedula}}
                        </td>
                        <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                            {{$huvpermiso->pb}}
                        </td>
                        <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                            {{$huvpermiso->bodega_nueva}}
                        </td>
                        <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                            {{$huvpermiso->usuario_clonar_sebthi}}
                        </td>
                        <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                            {{$huvpermiso->user->name}}
                        </td>
                    </tr>
                @endforeach 
            </tbody>
            
        </table>
    
    </div>
    <div class="mt-8">
        {{$reports->links()}}
    </div> 

    @else
    {{-- alert --}}
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">No hay solicitudes de permisos.</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>
@endif

</x-app-layout>