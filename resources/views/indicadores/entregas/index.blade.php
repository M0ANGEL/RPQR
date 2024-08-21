<x-app-layout>
    @include('layouts.includes.admin.indicador')

    <div class="bg-white mt-4 " style="border-radius: 6px">
        <div >
            
            <div class="box">
                <h4>NOMBRE DEL INDICADOR:</h4>
                <p>Contabilidad de inventario <br> del servicio farmaceutico</p>
                <h4>PROCESO:</h4>
                <p>Servicio Farmaceutico</p>
            </div>
            <div style="display: inline;">
                <h4>TIPO DE INDICADOR:</h4>
                    <p>Resultado</p>
                    <h4>RESPONSABLE DE ANALISIS:</h4>
                    <p>Regente de farmacia</p>
            </div>
            
            <h2>ObJECTIVO DEL INDICADOR</h2>
            <h4>FORMA DE CALCULO:</h4>
            <P>Resultado costo del conteo del inventario/ Total de costo en sistema
                del inventario servicio farmaceutico*100
            </P>

            <h2>COMPONENTES DE LA FORMA DE CALCULO</h2>
            <h4>NUMERADOR</h4>
            <ul>
                <li>
                    FUENTE
                    <P>total del costo del inventario real</P>
                </li>
                <li>
                    RESPONSABLE
                    <P>Regente de farmacia</P>
                </li>
            </ul>

            <h4>DENOMINADOR</h4>
            
            <ul>
                <li>
                    FUENTE
                    <P>total del costo del inventario inicial en sistemas</P>
                </li>
                <li>
                    RESPONSABLE
                    <P>Regente de farmacias</P>
                </li>
            </ul>
                
            
        </div>

        {{-- <div>
            <form action="">
                <label>
                    <p>Campos</p>
                </label>
                <input></input>
            </form>
        </div> --}}
    </div>
</x-app-layout>