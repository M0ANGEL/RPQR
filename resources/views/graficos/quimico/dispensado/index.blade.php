<x-app-layout>
    <div class="flex justify-end mb-4">
        <a style="background: red;" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
           href="{{ route('HomeGrafica.index') }}"><b>VOLVER</b></a>
    </div>

    <style>
        body {
            background: white;
        }
        .filter-container {
            display: flex;
            justify-content: center; /* Centra el formulario horizontalmente */
            margin: 20px; /* Espacio alrededor del contenedor */
        }

        form {
            display: flex;
            flex-wrap: wrap; /* Permite que los elementos se ajusten en varias líneas si es necesario */
            align-items: center; /* Alinea verticalmente los elementos */
            gap: 10px; /* Espacio entre los elementos */
            max-width: 100%; /* Asegura que el formulario no se expanda más allá del contenedor */
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        label{
            font-weight: bold;
        }

        x-input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            flex: 1; /* Hace que el campo de entrada ocupe el espacio disponible */
        }

        .btn-filter {
            background: #0496ff;
            padding: 10px 15px;
            border-radius: 5px;
            border: 2px solid black;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 30px;
        }

        .btn-filter:hover {
            background: #0373e3; /* Color de hover */
        }
    </style>

    <div class="filter-container">
        <form action="{{ route('DispensadoBodegas.index') }}" method="GET">
            <div class="form-group">
                <label for="start_date">Fecha de Inicio:</label>
                <x-input type="date" id="start_date" name="start_date" value="{{ request('start_date') }}" class="w-full"/>
            </div>

            <div class="form-group">
                <label for="end_date">Fecha de Fin:</label>
                <x-input type="date" id="end_date" name="end_date" value="{{ request('end_date') }}" class="w-full"/>
            </div>

            <button type="submit" class="btn-filter"><b>Filtrar</b></button>
        </form>
    </div>

    <div style="width: 80%; margin: auto;">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar', // Puedes cambiar el tipo de gráfico según tus necesidades
            data: {
                labels: @json($labels), // Etiquetas del gráfico (bodegas)
                datasets: [{
                    label: 'Total Hallazgo',
                    data: @json($values), // Datos del gráfico (suma de hallazgo)
                    backgroundColor: ['#6bf1ab', '#63d69f', '#438c6c', '#509c7f', '#1f794e', '#34444c', '#90CAF9', '#64B5F6', '#42A5F5', '#2196F3', '#0D47A1'],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Bodega'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Total Hallazgo'
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-app-layout>
