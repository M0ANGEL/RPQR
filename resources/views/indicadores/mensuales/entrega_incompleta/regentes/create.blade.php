@php
    $currentTime = now(); // Hora actual
    $startTime = $currentTime->copy()->setTime(00, 00); // 3:00 AM
    $endTime = $currentTime->copy()->setTime(24, 10); // 10:00 AM
@endphp

<x-app-layout>

    <form action="{{ route('EntregaIncompleta.store') }}" method="POST" id="myForm" class="bg-white rounded-lg p-6"
        style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 1); "> {{-- /* Sombra del formulario */ --}}
        @csrf
        <div class="text-center">
            <h1><b>REGISTRO MENSUAL DE ENTREGA DE PEDIDO INCOMPLETAS</b></h1>
            <p>Recuerda, tienes plazo de responder los 5 primeros dias de cada mes</p> <br><br>
        </div>
        <div class="mb-4">
            <x-label>
                Total de medicamentos e insumos identificados incompletos en la entrega de los servicios
            </x-label>
            <input type="text" name="numerador" required class="border p-2 rounded w-full" pattern="[0-9]*"
                inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">{{-- numerador --}}


            <input type="hidden" name="bodega" class="w-full" required value="{{ $usuario->bodega }}">
        </div>
        <div class="mb-4">
            <x-label>
                Total de medicamentos e insumos entregados en los servicios
            </x-label>
            <input type="text" name="denominador" required class="border p-2 rounded w-full" pattern="[0-9]*"
                inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">{{-- denominador --}}
        </div>
        <div class="mb-4">
            <x-label>
                Analisis
            </x-label>
            <x-textarea name="analisis" required />
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
            <a href="{{ route('fichaTecnica_pendientes') }}">Ficha Tecnica</a>
        </x-button>

        <x-button class="mt-4 ml-4" style="background-color: rgb(1, 36, 78)">
            <a href="{{ route('EntregaIncompleta.index') }}">Vista datos mes</a>
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
