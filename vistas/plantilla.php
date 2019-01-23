<?php

ini_set("session.cookie_lifetime", "7200");

ini_set("session.gc_maxlifetime", "7200");

session_start();

?>

<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Inima System</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="vistas/img/plantilla/logo_57x57-01.png">

<!--==============================================
PLUGINS DE CSS
===============================================-->
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">

   <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <!-- Morris chart -->
  <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">

  


<!--==============================================
PLUGINS DE JAVASCRIPT
===============================================-->

<!-- jQuery 3 -->
<script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- SlimScroll -->
<script src="vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- FastClick -->
<script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>

<!-- DataTables -->
<script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

<!-- SweetAlert 2 -->
<script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
<!-- Habilitar soporte internet explorer 11 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<!-- iCheck 1.0.1 -->
<script src="vistas/plugins/iCheck/icheck.min.js"></script>

<!-- InputMask -->
<script src="vistas/plugins/input-mask/jquery.inputmask.js"></script>
<script src="vistas/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="vistas/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<!-- jQuery Number -->
<script src="vistas/plugins/jqueryNumber/jquerynumber.min.js"></script>

<!-- daterangepicker http://www.daterangepicker.com/-->
<script src="vistas/bower_components/moment/min/moment.min.js"></script>
<script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- Morris.js charts http://morrisjs.github.io/morris.js/-->
<script src="vistas/bower_components/raphael/raphael.min.js"></script>
<script src="vistas/bower_components/morris.js/morris.min.js"></script>

<!-- ChartJS http://www.chartjs.org/-->
<script src="vistas/bower_components/Chart.js/Chart.js"></script>

</head>

<!--==============================================
CUERPO DOCUMENTO
===============================================-->


<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">


  <?php


  if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

  

  echo '<div class="wrapper">';

    /*====================================
    Cabezote
    ===================================*/
  include "modulos/cabezote.php";

  /*====================================
    Menu
    ===================================*/
  include "modulos/menu.php";

  /*====================================
    Contenido
    ===================================*/

    if(isset($_GET["ruta"])){

      if($_GET["ruta"] == "inicio" ||
         $_GET["ruta"] == "usuarios"||
         $_GET["ruta"] == "beneficiarios"||
         $_GET["ruta"] == "categorias" ||
         $_GET["ruta"] == "empresas-ap" ||
         $_GET["ruta"] == "empresas-af" ||
         $_GET["ruta"] == "eps" ||
         $_GET["ruta"] == "arl" ||
         $_GET["ruta"] == "caja-compensaciones" ||
         $_GET["ruta"] == "arl-tarifas" ||
         $_GET["ruta"] == "tarifa-afiliacion" ||
         $_GET["ruta"] == "tarifa-administracion" ||
         $_GET["ruta"] == "tipo-afiliado" ||
         $_GET["ruta"] == "aportes" ||
         $_GET["ruta"] == "aportes-pagar" ||
         $_GET["ruta"] == "aportes-pagados" ||
         $_GET["ruta"] == "aportes-afiliacion" ||
         $_GET["ruta"] == "afp" ||
         $_GET["ruta"] == "ibc" ||
         $_GET["ruta"] == "profesiones" ||
         $_GET["ruta"] == "productos" ||
         $_GET["ruta"] == "afiliados" ||
         $_GET["ruta"] == "afiliaciones" ||
         $_GET["ruta"] == "crear-afiliacion" ||
         $_GET["ruta"] == "ventas" ||
         $_GET["ruta"] == "crear-venta" || 
         $_GET["ruta"] == "reportes" ||
         $_GET["ruta"] == "salir" ){
 
         include "modulos/".$_GET["ruta"].".php";

         }else{

          include "modulos/404.php";

         }
        }else{
          include "modulos/inicio.php";
        }

    /*====================================
    Footer
    ===================================*/

    include "modulos/footer.php";

    echo '</div>';
  }else{

    include "modulos/login.php";

  }

  ?>

  

  <!-- =============================================== -->

  


<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/afiliados.js"></script>
<script src="vistas/js/categorias.js"></script>
<script src="vistas/js/eps.js"></script>
<script src="vistas/js/arl.js"></script>
<script src="vistas/js/arl-tarifas.js"></script>
<script src="vistas/js/tarifa-afiliacion.js"></script>
<script src="vistas/js/tarifa-administracion.js"></script>
<script src="vistas/js/tipo-afiliado.js"></script>
<script src="vistas/js/afp.js"></script>
<script src="vistas/js/ibc.js"></script>
<script src="vistas/js/empresas-ap.js"></script>
<script src="vistas/js/empresas-af.js"></script>
<script src="vistas/js/beneficiarios.js"></script>
<script src="vistas/js/profesiones.js"></script>
<script src="vistas/js/crear-afiliacion.js"></script>
<script src="vistas/js/afiliaciones.js"></script>
<script src="vistas/js/caja-compensaciones.js"></script>
<script src="vistas/js/aportes.js"></script>
<script src="vistas/js/reportes.js"></script>




</body>
</html>
