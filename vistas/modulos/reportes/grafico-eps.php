<?php

$item = null;
$valor = null;

$AfiliadosPorEps = ControladorAfiliaciones::ctrMostrarAfiliacionesPorEps($item, $valor);

//var_dump($AfiliadosPorEps);

?>

<!--=====================================
AFILIADOS POR EPS 
======================================-->

<div class="box box-default">
	
	<div class="box-header with-border">
  
      <h3 class="box-title">Afiliados por EPS </h3>

    </div>

	<div class="box-body">
    
      	<div class="row">

	        <div class="col-md-7">

	 			<div class="chart-responsive">
	            
	            	<canvas id="pieChart" height="150"></canvas>
	          
	          	</div>

	        </div>

		    <div class="col-md-5">
		      	
		  	 	<ul class="chart-legend clearfix">

                   <?php

                    foreach ($AfiliadosPorEps as $key => $value){
                    

                        echo '<li><i class="fa fa-circle-o text-red"></i> '.$value["nombre"].'</li>';

                    }

                   ?>



		  	 	</ul>

		    </div>

		</div>

    </div>

    <div class="box-footer no-padding">
    	
		<ul class="nav nav-pills nav-stacked">
			



		</ul>

    </div>

</div>

<script>
	

 // -------------
  // - PIE CHART -
  // -------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
  var pieChart       = new Chart(pieChartCanvas);
  var PieData        = [
    {
      value    : 700,
      color    : '#f56954',
      highlight: '#f56954',
      label    : 'SOS'
    },
    {
      value    : 500,
      color    : '#00a65a',
      highlight: '#00a65a',
      label    : 'SURA'
    },
    {
      value    : 400,
      color    : '#f39c12',
      highlight: '#f39c12',
      label    : 'MEDIMAS'
    },
    {
      value    : 600,
      color    : '#00c0ef',
      highlight: '#00c0ef',
      label    : 'COOMEVA'
    },
    {
      value    : 300,
      color    : '#3c8dbc',
      highlight: '#3c8dbc',
      label    : 'SANITAS'
    },
    {
      value    : 100,
      color    : '#d2d6de',
      highlight: '#d2d6de',
      label    : 'NUEVA EPS'
    }
  ];
  var pieOptions     = {
    // Boolean - Whether we should show a stroke on each segment
    segmentShowStroke    : true,
    // String - The colour of each segment stroke
    segmentStrokeColor   : '#fff',
    // Number - The width of each segment stroke
    segmentStrokeWidth   : 1,
    // Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    // Number - Amount of animation steps
    animationSteps       : 100,
    // String - Animation easing effect
    animationEasing      : 'easeOutBounce',
    // Boolean - Whether we animate the rotation of the Doughnut
    animateRotate        : true,
    // Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale         : false,
    // Boolean - whether to make the chart responsive to window resizing
    responsive           : true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio  : false,
    // String - A legend template
    legendTemplate       : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<segments.length; i++){%><li><span style=\'background-color:<%=segments[i].fillColor%>\'></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>',
    // String - A tooltip template
    tooltipTemplate      : '<%=value %> <%=label%> users'
  };
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart.Doughnut(PieData, pieOptions);
  // -----------------
  // - END PIE CHART -
  // -----------------


</script>