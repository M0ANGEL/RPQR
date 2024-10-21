<x-app-layout>  
    
    <style>
        /* busqueda */
        .buscar {
            margin: 50px 0 50px 340px;
            margin-bottom: 30px;
        }

        .barra {
            width: 500px;
            border-radius: 10px;
            padding: 10px;
            border: solid 2px #111827;
        }

        .btn-buscar {
            padding: 10px;
            border-radius: 10px;
            font-size: 15px;
            background-color: #0f52e4;
            color: aliceblue;
        }

        .btn-buscar:hover {
            padding: 10px;
            border-radius: 10px;
            font-size: 15px;
            background-color: aliceblue;
            border: 3px solid #111827;
            color: #111827;
        }

        #marco {
            border: 2px solid #BDC3C7;
        }

        #filas:hover {
            background: rgb(234, 242, 248);
        }
    </style>
    


    <div class="flex justify-end mb-4">
        <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
        href="{{route('IngresoVistaMedica.create')}}">NUEVO REGISTRO</a>
    </div>
    
    <form action="{{ route('IngresoVistaMedica.index') }}" method="get">
        <div class="buscar">
            <input class="barra" type="text" name="text" value="{{ $busqueda }}" />
            <input class="btn-buscar" type="submit" value="Buscar">
        </div>
    </form>


<div class="relative overflow-x-auto" style="border-radius: 6px">
    <table class="w-full text-sm text-center rtl:text-right text-gray-800 dark:text-gray-800">
        <thead class="text-xs text-gray-50 uppercase bg-gray-800 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Acttor
                </th>
                <th scope="col" class="px-6 py-3">
                    Codigo VistaMec
                </th>
                <th scope="col" class="px-6 py-3">
                    Medicamento VistaMec
                </th>
                <th scope="col" class="px-6 py-3">
                    Unidad medida
                </th>
                <th scope="col" class="px-6 py-3">
                    Codigo Sebthi
                </th>
                <th scope="col" class="px-6 py-3">
                    Medicamento 
                </th>
                <th scope="col" class="px-6 py-3">
                    Editar
                </th>
            </tr>
        </thead>
        <tbody>
             @foreach ($datos as $IngresoVistaMedica) 
                <tr class="bg-white border-b  dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$IngresoVistaMedica->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$IngresoVistaMedica->acttor}}
                    </td>
                    <td class="px-6 py-4">
                        {{$IngresoVistaMedica->vistamedica}}
                    </td>
                    <td class="px-6 py-4">
                        {{$IngresoVistaMedica->nombrevistamedica}}
                    </td>
                    <td class="px-6 py-4">
                        {{$IngresoVistaMedica->unidadmedica}}
                    </td>
                    <td class="px-6 py-4">
                        {{$IngresoVistaMedica->codigosebthi}}
                    </td>
                    <td class="px-6 py-4">
                        {{$IngresoVistaMedica->medicamento}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('IngresoVistaMedica.edit',$IngresoVistaMedica->id)}}">
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