<x-app-layout>

    <div class="flex justify-end mb-4">
        <a style="background: red;" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
        href="{{route('HomeGrafica.index')}}"><b>VOLVER</b></a>
    </div>

    <style>
        body{
            background: white;
        }
    </style>
    
    <div style="width: 80%; margin: auto;">
        <canvas id="myChart"></canvas>
    </div>
    
    {{-- <canvas id="myChart"></canvas> --}}
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar', // Puedes cambiar el tipo de gráfico según tus necesidades
            data: {
                labels: @json($labels), // Etiquetas del gráfico (bodegas)
                datasets: [{
                    label: 'Total Hallazgo',
                    data: @json($values), // Datos del gráfico (suma de hallazgo)
                    backgroundColor: ['#6bf1ab','#63d69f', '#438c6c', '#509c7f', '#1f794e', '#34444c', '#90CAF9', '#64B5F6', '#42A5F5', '#2196F3', '#0D47A1'],
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











