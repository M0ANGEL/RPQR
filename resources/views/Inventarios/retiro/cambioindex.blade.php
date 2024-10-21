<x-app-layout>  
    <style>


        /* busqueda */
            .buscar{
                margin:50px 0 50px 340px;
                margin-bottom: 30px;
            }

            .barra{
                width: 500px;
                border-radius: 10px;
                padding: 10px;
                border: solid 2px #111827;  
            }

            .btn-buscar{
                padding: 10px;
                border-radius: 10px;
                font-size: 15px;
                background-color: #0496ff;
                color: aliceblue;
                
            }

            .btn-buscar:hover{
                padding: 10px;
                border-radius: 10px;
                font-size: 15px;
                background-color: aliceblue;
                border: 3px solid #111827;
                color: #111827;
            }

            #marco{
                border: 2px solid #BDC3C7 
            }

            #filas:hover{
            background: rgb(234, 242, 248)
            }

    </style>

    <h1 style="text-align: center; color: blue; font-size: 20px;"><b>CAMBIO AREA DE EQUIPOS</b></h1>
    {{-- barra buscar --}}


    <form action="{{route('Inventarios_Retiros.index')}}" method="get">   
            <div class="buscar" >
                <input class="barra" type="text" name="text" value="{{$busqueda}}"  />
                <input class="btn-buscar" type="submit" value="Buscar" >
            </div>
    </form>

    

    {{-- tabla para mostrar datos --}}

    @if (count($datos)<=0)
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">No hay registro para este serial.</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
    @else
    <div class="relative overflow-x-auto" style="border-radius: 6px">
        <table class="w-full text-sm text-center rtl:text-right text-gray-800 dark:text-gray-800">
            <thead class="text-xs text-gray-50 uppercase bg-gray-800 dark:bg-gray-700 dark:text-gray-400">
                    <tr >
                        <th scope="col" class="px-6 py-3">  Area</th>
                        <th scope="col" class="px-6 py-3" > Piso</th>
                        <th scope="col" class="px-6 py-3">  Estado</th>
                        <th scope="col" class="px-6 py-3">  Activo	</th>
                        <th scope="col" class="px-6 py-3">  Pareja	</th>
                        <th scope="col" class="px-6 py-3">  Ver/Mas	</th>
                    </tr>
                </thead>
                <tbody style="border-radius: 15px; ">
                        @foreach ($datos as $Inventarios_Retiro)
                        {{-- {{dd($Inventarios_Retiro)}} --}}
                        <tr id="filas" class=" border-b dark:border-gray-700" style="color: rgb(44, 62, 80)">
                            <td style="color: rgb(44, 62, 80)" class="px-6 py-4">
                                    <b>{{$Inventarios_Retiro->bodega}}</b>
                                </th>
                                <td class="px-6 py-4" style="color: rgb(44, 62, 80)">
                                    {{ $Inventarios_Retiro->piso }}
                                </td>
                               
                                @if ($Inventarios_Retiro->estado == true)
                                    <th class="px-6 py-4" style="color: rgb(44, 62, 80)">
                                        <b style="background: green; color: white; padding: 5px; border-radius: 10px;">ACTIVO</b>
                                    </th>
                                @endif
                                <td class="px-6 py-4" style="color: rgb(44, 62, 80)">
                                    {{ $Inventarios_Retiro->equipo->activo }}
                                </td>
                                <td class="px-6 py-4" style="color: rgb(44, 62, 80)">
                                    {{ $Inventarios_Retiro->pareja }}
                                </td>

                                <td class="px-6 py-4" style="color: rgb(44, 62, 80)">
                                    <a href="{{route('cambiar',$Inventarios_Retiro->id)}}">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>

    @endif  
  
    <div class="mt-8">
        {{$datos->links()}}
    </div> 

    

</x-app-layout>  