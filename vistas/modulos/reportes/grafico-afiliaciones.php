<?php

error_reporting(0);

if(isset($GET["fechaInicial"])){

    $fechaInicial = $_GET["fechaInicial"];
    $fechaFinal = $_GET["fechaFinal"];


}else{

    $fechaInicial = null;
    $fechaFinal = null;
}

    $respuesta = ControladorAfiliaciones::ctrRangoFechasAfiliaciones($fechaInicial, $fechaFinal);

    $arrayFechas = array();
    $arrayAfiliaciones = array();
    $sumaPagosMes = array();

    foreach ($respuesta as $key => $value){

        //var_dump($value);

        #Capturamos sólo el año y el mes
	    $fecha = substr($value["fecha"],0,7);

	    #Introducir las fechas en arrayFechas
	    array_push($arrayFechas, $fecha);

	    #Capturamos las afiliaciones
	    $arrayAfiliaciones = array($fecha => $value["tarifa"]);

	    #Sumamos los pagos que ocurrieron el mismo mes
	    foreach ($arrayAfiliaciones as $key => $value) {
		
		    $sumaPagosMes[$key] += $value;
	    }

    }


    $noRepetirFechas = array_unique($arrayFechas);


    


?>

<!--=======================================================
GRÁFICO AFILIACIONES
========================================================-->

<div class="box box-solid bg-teal-gradient">

    <div class="box-header">
    
        <i class="fa fa-th"></i>

        <h3 class="box-title">Gráfico de Afiliaciones</h3>
    
    </div>

    <div class="box-body border-radius-none nuevoGraficoAfiliaciones">
    
        <div class="chart" id="line-chart-afiliaciones" style="height: 250px;"></div>
    
    </div>

    <script>
    
        var line = new Morris.Line({
            element          : 'line-chart-afiliaciones',
            resize           : true,
            data             : [

        <?php

            if($noRepetirFechas != null){

	            foreach($noRepetirFechas as $key){

	    	        echo "{ y: '".$key."', afiliaciones: ".$sumaPagosMes[$key]." },";


	            }

	            echo "{y: '".$key."', afiliaciones: ".$sumaPagosMes[$key]." }";

            }else{

                echo "{ y: '0', afiliaciones: '0' }";

            }

        ?>

        ],
        xkey             : 'y',
        ykeys            : ['afiliaciones'],
        labels           : ['afiliaciones'],
        lineColors       : ['#efefef'],
        lineWidth        : 2,
        hideHover        : 'auto',
        gridTextColor    : '#fff',
        gridStrokeWidth  : 0.4,
        pointSize        : 4,
        pointStrokeColors: ['#efefef'],
        gridLineColor    : '#efefef',
        gridTextFamily   : 'Open Sans',
        preUnits         : '$',
        gridTextSize     : 10
        });
    
    
    
    </script>

</div>