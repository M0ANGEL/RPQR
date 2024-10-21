<style>
    #indica{
        border-radius: 6px;
        padding: 10px;
        background-color: rgb(1, 1, 1);
        
    }

    h1{
        color: rgb(255, 255, 255);
        text-align: center;
        padding: 6px;
        font-size: 30px;
        -webkit-text-stroke:1px solid rgb(0, 0, 0);
        
    }
</style>

<h1><b>INDICADORES FARMACIA</b></h1>


<div id="indica">
    <a href="{{route('graficaBodegas.index')}}"  class="mr-4 ml-4" style="color: white">Hallazgos</a>
    
    <a href="{{route('DispensadoBodegas.index')}}"  class="mr-4 ml-4" style="color: white">Errores Disp</a>   
    
    <a href="{{route('PendientesBodegasM.index')}}"  class="mr-4 ml-4" style="color: white">Pendientes huv</a>
    
    <a href="{{route('graficaBodegas.index')}}"  class="mr-4 ml-4" style="color: white">Entrega Incompletas</a>            
    
    <a href="{{route('graficaBodegas.index')}}"  class="mr-4 ml-4" style="color: white">Costo De Perdidas</a>   
        
    <a href="{{route('graficaBodegas.index')}}"  class="mr-4 ml-4" style="color: white">Costo Averias</a> 

    <a href="{{route('graficaBodegas.index')}}"  class="mr-4 ml-4" style="color: white">Rec Planeada</a>            
        
    <a href="{{route('graficaBodegas.index')}}"  class="mr-4 ml-4" style="color: white" >Rec Planeada Alto Costo</a>            

    <a href="{{route('graficaBodegas.index')}}" class="mr-4 ml-4" style="color: white">Confi De Inventario</a>            
   
</div>