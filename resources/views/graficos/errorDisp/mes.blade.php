<x-app-layout>

    <div class="flex justify-end mb-4">
        <a style="background: red;" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
        href="{{route('DispensadoMes.index')}}"><b>VOLVER</b></a>
    </div>

    <style>
        body{
            background: white;
        }
    </style>
    
    <div style="width: 80%; margin: auto;">
        <canvas id="myChart"></canvas>
    </div>
    
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        
        // Obtener los datos del controlador
        const data = @json($hallazgos);
        
        // Extraer las fechas y los totales
        const labels = data.map(item => {
            // Usa la fecha en formato año-mes para las etiquetas
            const date = new Date(item.month + '-01'); // Asume el primer día del mes
            const month = date.toLocaleString('es-ES', { month: 'short' });
            const year = date.getFullYear();
            return `${month} ${year}`;
        });
        const values = data.map(item => item.total);
    
        // Configuración del gráfico
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels, // Etiquetas para el eje X
                datasets: [{
                    label: 'Hallazgos',
                    data: values, // Valores para el gráfico
                    backgroundColor: ['#6bf1ab','#63d69f', '#438c6c', '#509c7f', '#1f794e', '#34444c', '#90CAF9', '#64B5F6', '#42A5F5', '#2196F3', '#0D47A1'],
                    borderColor: 'black',
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value + '%'; // Agrega el símbolo de porcentaje (%) al final de los valores del eje Y
                            }
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Mes'
                        }
                    }
                }
            }
        });
    </script>
    
    
</x-app-layout>











