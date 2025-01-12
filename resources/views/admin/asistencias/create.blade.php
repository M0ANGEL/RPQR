<x-app-layout>
    <style>
        #asistenciaCarta {
            margin: 40px 25%;
        }
    </style>

    @if (session('swal'))
        <script>
            Swal.fire({
                icon: '{{ session('swal')['icon'] }}',
                title: '{{ session('swal')['title'] }}',
                text: '{{ session('swal')['text'] }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif


    @canany(['reporte_asistenacias_induciones'])
        <form method="GET" action="{{ route('descarga.asistencias') }}" class="flex justify-end mb-4">
            <input type="date" name="start_date" class="mr-2 border rounded px-2 py-1" required>
            <input type="date" name="end_date" class="mr-2 border rounded px-2 py-1" required>
            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150">
                BAJAR REPORTE
            </button>
        </form>
    @endcanany


    <div id="asistenciaCarta">
        <div class="bg-white  shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4  ">CONFIRMACION DE ASISTENCIA A CAPACITACION</h1>
            <p class="text-gray-600  mb-6">Digita tu numero de cedula y dale en confirmar</p>
            <form action="{{ route('asistencia.store') }}" method="POST">
                @csrf
                <div class="flex flex-wrap gap-4 mb-6">
                    <div class="flex-1">
                        <label>Numero Cedula</label>
                        <input type="text" name="cedula" class="border p-2 rounded w-full" pattern="[0-9]*"
                            inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                    </div>
                </div>

                <div class="flex justify-end">
                    <x-button type="submit" style="background: rgb(0, 128, 38);">
                        <b>CONFIRMAR ASISTENCIA</b>
                    </x-button>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>
