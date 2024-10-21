<style>
    .cardtInfo {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: auto auto;
        gap: 20px;
    }

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


    /* Ubicamos el tercer div debajo del segundo */
    .card-:nth-child(3) {
        grid-column: 1 / 2;
        grid-row: 2;
    }
</style>

<x-app-layout>

    <div class="cardtInfo">
        <div class="card-" style="background: blue;">
            <h4><b>NO SEBTHI</b></h4>
            <hr style="background: white; border: 2px solid"><br>
            <p>Son los documentos que solo fueron digitados por el aplicativo SERVINTE, que aun no estan dititados en
                SEBTHI 3.0
            </p>
            <div class="button-ir">
                <x-button style="width: 100px; ">
                    <a href="#"><b>IR</b></a>
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
                    <a href="#"><b>IR</b></a>
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
                    <a href="#"><b>IR</b></a>
                </x-button>
            </div>
        </div>
    </div>

</x-app-layout>
