<x-app-layout>
    <style>
        /* Ajustes para escritorio */
        .buscar {
            margin: 1% 2% 35% 35%;
            margin-bottom: 30px;
        }

        .barra {
            width: 50%;
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

        /* Ajustes para móviles */
        @media (max-width: 640px) {
            .buscar {
                margin: 20px auto;
                text-align: center;
            }

            .barra {
                width: 90%;
            }

            .btn-buscar {
                width: 90%;
                margin-top: 10px;
            }

            table {
                font-size: 12px;
            }

            th, td {
                padding: 5px;
            }
        }
    </style>

    {{-- barra buscar --}}
    <div class="buscar">
        <input class="barra" type="text" id="search" name="text" value="{{ $busqueda }}" placeholder="Buscar por codigo o medicamento sebthi"/>
    </div>

    {{-- tabla para mostrar datos --}}
    <div id="tabla-datos">
        @include('admin.vistamedica.tabla', ['datos' => $datos])
    </div>

    <div class="mt-8">
        {{ $datos->appends(['text' => $busqueda])->links() }}
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Evento de escritura en la barra de búsqueda
            $('#search').on('keyup', function () {
                var query = $(this).val();
                $.ajax({
                    url: "{{ route('vistamedica.index') }}",
                    type: "GET",
                    data: {'text': query},
                    success: function (data) {
                        $('#tabla-datos').html(data);
                    }
                });
            });
        });
    </script>
</x-app-layout>
