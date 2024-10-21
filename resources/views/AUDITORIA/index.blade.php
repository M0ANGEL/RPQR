<style>
    .card- {
        background: red;
        border-radius: 15px;
        padding: 25px;
        margin: 20px;
        height: 270px;
        width: 550px;
        text-align: center;
        color: white;
    }

    .button-ir {
        margin-top: 50px;
    }

    .modal {
        margin: 20px 40px 0 40%;
        width: 30%;
    }

    .hidden-form {
        display: none;
        position: fixed;
        margin: 0 4% 0 20%;
        top: 15%;
        right: 0;
        background-color: white;
        width: 600px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 100;
    }

    .show {
        display: block;
    }

    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: none;
        z-index: 99;
    }

    .overlay.show {
        display: block;
    }
</style>

<x-app-layout>

    <div class="card-" style="background: rgb(0, 0, 0); display: block;">
        <h4><b>SUBIDA DE REPORTES</b></h4>
        <hr style="background: white; border: 2px solid"><br>
        <p>Son los iten del documentos que fueron digitados por el aplicativo SERVINTE ,
            y en SEBTHI 3.0 no fueron digitado estos item </p>
        <div class="flex justify-end mt-4">
            <button id="show-form-button"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button" style="background-color: rgb(86, 136, 12)">
                SUBIR DATOS
            </button>
            <x-button class="ml-4">
                BAJAR PLANTILLA
            </x-button>
        </div>
    </div>

    <!-- Formulario oculto a la derecha -->
    <div id="upload-form" class="hidden-form">
        <h4><b>SUBIR REPORTES DE EXCEL</b></h4>
        <hr><br>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="file1">Reporte Servinte:</label><br>
            <x-input type="file" id="file1" name="servinte" accept=".xls,.xlsx" required /><br><br>

            <label for="file2">Reporte Sebthi:</label><br>
            <x-input type="file" id="file2" name="sebthi" accept=".xls,.xlsx" required /><br><br>

            <button style="background: red; border-radius: 10px;" type="submit"
                class="bg-blue-700 text-white px-4 py-2 ">
                CARGAR REPORTES
            </button>
        </form>
    </div>

    <!-- Overlay oscuro -->
    <div id="overlay" class="overlay"></div>

    <!-- Más contenido aquí... -->

    <div class="cardtInfo">
        <div class="card-" style="background: blue;">
            <h4><b>NO SEBTHI</b></h4>
            <hr style="background: white; border: 2px solid"><br>
            <p>Son los documentos que solo fueron digitados por el aplicativo SERVINTE, que aun no estan dititados en
                SEBTHI 3.0
            </p>
            <div class="button-ir">
                <x-button style="width: 100px; ">
                    <a href="#"><b>DESCARGAR REPORTE</b></a>
                </x-button>
            </div>
        </div>
        <div class="card-">
            <h4><b>CANTIDAD MAL DIGITADAD</b></h4>
            <hr style="background: white; border: 2px solid"><br>
            <p>Son los documentos que fueron digitados por el aplicativo SERVINTE con X cantidad,
                y en SEBTHI 3.0 con una cantidad distinta</p>
            <div class="button-ir">
                <x-button style="width: 100px; ">
                    <a href="#"><b>DESCARGAR REPORTE</b></a>
                </x-button>
            </div>
        </div>
        <div class="card-" style="background: rgb(9, 132, 27);">
            <h4><b>ARTICULO NO DIGITADO</b></h4>
            <hr style="background: white; border: 2px solid"><br>
            <p>Son los iten del documentos que fueron digitados por el aplicativo SERVINTE ,
                y en SEBTHI 3.0 no fueron digitado estos item </p>
            <div class="button-ir">
                <x-button style="width: 100px; ">
                    <a href="#"><b>DESCARGAR REPORTE</b></a>
                </x-button>
            </div>
        </div>
    </div>

</x-app-layout>

<script>
    document.getElementById('show-form-button').addEventListener('click', function() {
        var form = document.getElementById('upload-form');
        var overlay = document.getElementById('overlay');

        // Mostrar el formulario y el overlay
        form.classList.toggle('show');
        overlay.classList.toggle('show');
    });

    // Para cerrar el formulario si se hace clic fuera de él
    document.getElementById('overlay').addEventListener('click', function() {
        var form = document.getElementById('upload-form');
        var overlay = document.getElementById('overlay');

        form.classList.remove('show');
        overlay.classList.remove('show');
    });
</script>
