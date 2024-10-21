<x-app-layout>    
    <div class="flex justify-end mb-4">
        <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
        href="{{route('AdministrarAgotados.create')}}">NUEVO REGISTRO</a>
    </div>
    
<div class="relative overflow-x-auto" style="border-radius: 6px">
    <table class="w-full text-sm text-center rtl:text-right text-gray-800 dark:text-gray-800">
        <thead class="text-xs text-gray-50 uppercase bg-gray-800 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    DESCRIPCION
                </th>
                <th scope="col" class="px-6 py-3">
                    MARCA
                </th>
                <th scope="col" class="px-6 py-3">
                    ESTADO
                </th>
                <th scope="col" class="px-6 py-3">
                    OBSERVACION
                </th>
                <th scope="col" class="px-6 py-3">
                    FECHA ESTIMADA
                </th>
                <th scope="col" class="px-6 py-3">
                    DOCUMENTO
                </th>
            </tr>
        </thead>
        <tbody>
             @foreach ($datos as $AdministrarAgotado) 
                 <tr id="filas" class=" border-b dark:border-gray-700" style="color: rgb(44, 62, 80)">
                    <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                        <b>{{ $AdministrarAgotado->descripcion }}</b>
                    </td>
                     <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                         <b>{{ $AdministrarAgotado->marca }}</b>
                     </td>
                     @switch($AdministrarAgotado->estado)
                         @case(0)
                            <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                                <b style="background: red; padding: 5px; color: white; border-radius: 10px;">Inactivo</b>
                            </td>
                             @break
                         @case(1)
                            <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                                <b style="background: rgb(19, 137, 3); padding: 5px; color: white; border-radius: 10px;">Activo</b>
                            </td>
                             @break
                         @default
                             
                     @endswitch
                    
                     @switch($AdministrarAgotado->estado_p)
                         @case(0)
                            <td style="color: rgb(44, 62, 80); " class="px-6 py-4">
                                <b>Agotado Parcial</b>
                            </td>
                             @break
                         @case(1)
                            <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                                <b>Agotado Completo</b>
                            </td>
                             @break
                         @default
                             
                     @endswitch
                     <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                        <b>{{ $AdministrarAgotado->fecha_En }}</b>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('AdministrarAgotados.edit',$AdministrarAgotado)}}">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                    </td>
                 </tr>
            @endforeach 
        </tbody>
        
    </table>
   
</div>
<div class="mt-8">
    {{$datos->links()}}
</div> 
   
</x-app-layout>