<div id="marco" class="relative overflow-x-auto" style="border-radius: 6px">
    <table class="w-full text-sm text-center rtl:text-right text-gray-800 dark:text-gray-800" style="border: rgb(172, 174, 175;">
        <thead class="text-xs text-gray-50 uppercase dark:bg-gray-700 dark:text-white-400" style="background: rgb(52, 73, 94);">
            <tr>
                <th scope="col" class="px-6 py-3">Codigo Vista Medica</th>
                <th scope="col" class="px-6 py-3">Nombre Vista Medica</th>
                <th scope="col" class="px-6 py-3">Unidad Medica</th>
                <th scope="col" class="px-6 py-3">Codigo Sebthi</th>
                <th scope="col" class="px-6 py-3">Medicamento Sebthi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos as $item)
                <tr id="filas" class="border-b dark:border-gray-700" style="color: rgb(44, 62, 80)">
                    <th class="px-6 py-4"><b>{{ $item->vistamedica }}</b></th>
                    <td style="color: rgb(44, 62, 80)" class="px-6 py-4"><b>{{ $item->nombrevistamedica }}</b></td>
                    <td style="color: rgb(44, 62, 80)" class="px-6 py-4"><b>{{ $item->unidadmedica }}</b></td>
                    <td style="color: rgb(44, 62, 80)" class="px-6 py-4"><b>{{ $item->codigosebthi }}</b></td>
                    <td style="color: rgb(44, 62, 80)" class="px-6 py-4"><b>{{ $item->medicamento }}</b></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
