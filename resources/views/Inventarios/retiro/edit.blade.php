@php
    $fecha = now();
@endphp

<style>
    #botonequipo, #botonubicacion, #botonretiro {
        padding: 10px; 
        text-align: center; 
        border-radius: 10px;
        border: 2px solid black;
        background: rgb(4, 136, 70);
        display: flex;
        margin-bottom: 10px;
        cursor: pointer;
        margin-left: 40%;
        margin-right: 40%;
    }

    #datosequipo, #datoasubicacion, #datosretiro{
        display: flex;
        flex-wrap: wrap; /* Permite que los elementos se ajusten a la siguiente fila */
        justify-content: space-between; /* Espacio entre los elementos */
        background: rgb(24, 69, 195);
        border-radius: 10px;
    }

    .equipo_info {
        margin: 10px;
        width: 23%; /* Aproximadamente un 1/4 de la fila, ajustando espacio */
        margin-bottom: 20px; /* Espacio entre filas */
        box-sizing: border-box; /* Incluye el padding y el borde en el cálculo del ancho */
    }

    /* Animación suave para los divs ocultos */
    .submenu {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.5s ease-out;
    }

    /* Clase para mostrar el contenido con una transición suave */
    .submenu.show {
        max-height: none; /* Permite que la altura se ajuste dinámicamente */
    }
</style>

<x-app-layout>
    <form action="{{ route('Inventarios_Retiros.update', $Inventarios_Retiro) }}" method="POST" class="bg-white rounded-lg p-6" style="box-shadow: 0 4px 6px rgba(0, 0, 0, 1);">
        @csrf
        @method('PATCH')

        
        <!-- Botón y contenido para Datos del Equipo -->
        <button type="button" id="botonequipo"><b>DATOS DEL EQUIPO</b></button>
        <div id="datosequipo" class="submenu">
            <div class="equipo_info">
                <x-label style="color: white; text-align: center;">N. Activo</x-label>
                <x-input class="{{-- w-full --}} mb-4" readonly value="{{ $Inventarios_Retiro->equipo->activo }}" />
            </div>
            <div class="equipo_info">
                <x-label style="color: white; text-align: center;">Modelo</x-label>
                <x-input class="{{-- w-full --}} mb-4" readonly value="{{ $Inventarios_Retiro->equipo->modelo }}" />
            </div>
            <div class="equipo_info">
                <x-label style="color: white; text-align: center;">Marca</x-label>
                <x-input class="{{-- w-full --}} mb-4" readonly value="{{ $Inventarios_Retiro->equipo->marca }}" />
            </div>
            <div class="equipo_info">
                <x-label style="color: white; text-align: center;">Proveedor</x-label>
                <x-input class="{{-- w-full --}} mb-4" readonly value="{{ $Inventarios_Retiro->equipo->proveedor }}" />
            </div>
            <div class="equipo_info">
                <x-label style="color: white; text-align: center;">Memoria ram</x-label>
                <x-input class="{{-- w-full --}} mb-4" readonly value="{{ $Inventarios_Retiro->equipo->ram }}" />
            </div>
            <div class="equipo_info">
                <x-label style="color: white; text-align: center;">Disco</x-label>
                <x-input class="{{-- w-full --}} mb-4" readonly value="{{ $Inventarios_Retiro->equipo->disco }}" />
            </div>
            <div class="equipo_info">
                <x-label style="color: white; text-align: center;">Espacio del disco</x-label>
                <x-input class="{{-- w-full --}} mb-4" readonly value="{{ $Inventarios_Retiro->equipo->espacio_disco }}" />
            </div>
        </div>

        <!-- Botón y contenido para Ubicación del Equipo -->
        <button type="button" id="botonubicacion"><b>UBICACION DEL EQUIPO</b></button>
        <div id="datoasubicacion" class="submenu">
            <div class="equipo_info">
                <x-label style="color: white; text-align: center;">Bodega</x-label>
                <x-input class=" mb-4" readonly value="{{ $Inventarios_Retiro->bodega }}" />
            </div>
            <div class="equipo_info">
                <x-label style="color: white; text-align: center;">Piso</x-label>
                <x-input class=" mb-4" readonly value="{{ $Inventarios_Retiro->piso }}" />
            </div>
            <div class="equipo_info">
                <x-label style="color: white; text-align: center;">Fecha entrega</x-label>
                <x-input class=" mb-4" readonly value="{{ $Inventarios_Retiro->fecha_entrega }}" />
            </div>
            <div class="equipo_info">
                <x-label style="color: white; text-align: center;">Mouse</x-label>
                <x-input class=" mb-4" readonly value="{{ $Inventarios_Retiro->mouse }}" />
            </div>
            <div class="equipo_info">
                <x-label style="color: white; text-align: center;">Teclado</x-label>
                <x-input class=" mb-4" readonly value="{{ $Inventarios_Retiro->teclado }}" />
            </div>
            <div class="equipo_info">
                <x-label style="color: white; text-align: center;">Teclado</x-label>
                <x-input class=" mb-4" readonly value="{{ $Inventarios_Retiro->pareja }}" />
            </div>
        </div>

        <!-- Botón y contenido para Retiro del Equipo -->
        <button type="button" id="botonretiro"><b>RETIRO DEL EQUIPO</b></button>
        <div id="datosretiro" class="submenu">
            <div class="equipo_info">
                <x-label style="color: white; text-align: center;">Fecha del retiro</x-label>
                <x-input class=" mb-4" name="fecha_retiro" type="date" required/>
            </div>
            <div class="equipo_info">
                <x-label style="color: white; text-align: center;">Motivo de retiro</x-label>
                <x-textarea name="motivo_salida" required></x-textarea>
            </div>
        </div>

        <div class="flex justify-end mt-4">
            <x-button style="background: red;">RETIRAR</x-button>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Selección de botones y divs
            var botonEquipo = document.getElementById('botonequipo');
            var datosEquipo = document.getElementById('datosequipo');
            
            var botonUbicacion = document.getElementById('botonubicacion');
            var datosUbicacion = document.getElementById('datoasubicacion');
            
            var botonRetiro = document.getElementById('botonretiro');
            var datosRetiro = document.getElementById('datosretiro');

            // Función para alternar visibilidad
            function toggleVisibility(button, content) {
                content.classList.toggle('show');
            }

            // Eventos para los botones
            botonEquipo.addEventListener('click', function() {
                toggleVisibility(botonEquipo, datosEquipo);
            });

            botonUbicacion.addEventListener('click', function() {
                toggleVisibility(botonUbicacion, datosUbicacion);
            });

            botonRetiro.addEventListener('click', function() {
                toggleVisibility(botonRetiro, datosRetiro);
            });
        });
    </script>
</x-app-layout>
