<x-app-layout>
    <style>
        body {
            background: black;
        }
    </style>
    <div class="flex justify-end">
        <a style="background: red;" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 transition ease-in-out duration-150"
           href="{{ route('agotados') }}"><b>VOLVER</b></a>
    </div>

    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4 text-center">Carta Agotado</h1>

        <div class="pdf-container">
            <embed src="data:application/pdf;base64,{{ base64_encode($item->pdfs) }}" style="border-radius: 10px;" type="application/pdf" width="100%" height="600px" />
        </div>
    </div>
</x-app-layout>
