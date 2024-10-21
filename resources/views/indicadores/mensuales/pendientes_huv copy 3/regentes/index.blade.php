@php
use Carbon\Carbon;

// Configurar Carbon para español
Carbon::setLocale('es');
@endphp

<style>
    #marco{
           border: 2px solid #BDC3C7 
       }

       #filas:hover{
       background: rgb(234, 242, 248)
       }
</style>

<x-app-layout>    

  <div id="marco" class="relative overflow-x-auto" style="border-radius: 6px">
    <table class="w-full text-sm text-center rtl:text-right text-gray-800 dark:text-gray-800" style="border: rgb(172, 174, 175)">
        <thead class="text-xs text-gray-50 uppercase   dark:text-white-400" style="background: rgb(52, 73, 94);">
            <tr>
                <th scope="col" class="px-6 py-3">
                    MES
                </th>
        
                <th scope="col" class="px-6 py-3">
                    DIGITADO
                </th>
                <th scope="col" class="px-6 py-3">
                    HALLAZGOS
                </th>
                <th scope="col" class="px-6 py-3">
                    PORCENTAJE
                </th>
            </tr>
        </thead>
        <tbody>
             @foreach ($datos as $dato) 
                <tr id="filas" class=" border-b  dark:border-gray-700" style="color: rgb(44, 62, 80)">
                    <td style="color: rgb(5, 35, 59)" class="px-6 py-4">
                        {{ $dato->month}} {{-- F mes --}}
                    </td>
    
                    <td style="color: rgb(5, 35, 59)" class="px-6 py-4">
                        {{ $dato->digitado }}
                    </td>
                    <td style="color: rgb(5, 35, 59)" class="px-6 py-4">
                        {{ $dato->hallazgo}}
                    </td>
                    
                    @if ($dato->porcentaje >5)
                      <td  class="px-6 py-4" style="background: rgb(255, 172, 172);">
                        <b>{{ $dato->porcentaje}} %</b>
                      </td>
                    @else
                        <td  class="px-6 py-4" style="background: rgb(16, 156, 14); color:white;" >
                            <b>{{ $dato->porcentaje}} %</b>
                        </td>
                    @endif
                </tr>
            @endforeach 
        </tbody>
    </table>
    <div class="mt-8">
        {{$datos->links()}}
    </div>


   
   
</x-app-layout>