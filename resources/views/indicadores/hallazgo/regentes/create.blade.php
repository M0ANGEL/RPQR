@php
    $currentTime = now(); // Hora actual
    $startTime = $currentTime->copy()->setTime(00, 00); // 3:00 AM
    $endTime = $currentTime->copy()->setTime(24, 10); // 10:00 AM
@endphp

<x-app-layout>

    <form action="{{ route('indicadores.store') }}" method="POST" id="myForm" class="bg-white rounded-lg p-6"
        style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
        @csrf
        <div class="text-center">
            <h1><b>REGISTRO DIARIO DE HALLAZGOS</b></h1>
            <p>Recuerda, tienes plazo de responder antes de las 9AM </p>
        </div>
        <div class="mb-4">
            <x-label>
                Total Hallazgos dia
            </x-label>
            <input type="text" name="numerador" required class="border p-2 rounded w-full" pattern="[0-9]*"
                inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">{{-- numerador --}}
        </div>
        <div class="mb-4">
            <x-label>
                Total documento dispensados dia
            </x-label>
            <input type="text" name="denominador" required class="border p-2 rounded w-full" pattern="[0-9]*"
                inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">{{-- denominador --}}


            <input type="hidden" name="bodega" class="w-full" required value="{{ $usuario->bodega }}">

        </div>
        @if ($currentTime->between($startTime, $endTime))
            <div class="flex justify-end">
                <x-button id="submitButton">
                    REGISTRAR
                </x-button>
            </div>
        @else
            <div class="flex justify-end">
                <x-button type="button" class="readonly text-white" style="background-color: red"
                    onclick="alert('Plazo de responder cerrado, informar al ADMIN')">
                    CERRADO
                </x-button>
            </div>
        @endif

    </form>
    <div class="mt-4" style="float: right">
        <x-button class="mt-4 ml-4" style="background-color: rgb(0, 124, 182)">
            <a href="{{ route('fichaTecnica.hallazgo') }}">Ficha Tecnica</a>
        </x-button>
        <x-button class="mt-4 ml-4" style="background-color: rgb(2, 85, 57)">
            <a href="{{ route('indicadoresDiario.index') }}">Vista datos diarios</a>
        </x-button>

        <x-button class="mt-4 ml-4" style="background-color: rgb(1, 36, 78)">
            <a href="{{ route('indicadoresMes.index') }}">Vista datos mes</a>
        </x-button>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('myForm');
            const submitButton = document.getElementById('submitButton');

            // Evitar que el formulario se envíe con Enter
            form.addEventListener('keydown', (event) => {
                if (event.key === 'Enter') {
                    event.preventDefault();
                }
            });

            // Asegurarse de que solo el clic en el botón envíe el formulario
            submitButton.addEventListener('click', () => {
                form.submit();
            });
        });
    </script>

</x-app-layout>
