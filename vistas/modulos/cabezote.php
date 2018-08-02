<header class="main-header">

<!--==============================================
Logotipo
===============================================-->
<a href="inicio" class="logo">

    <!-- logo mini -->
    <span class="logo-mini">
        <img src="vistas/img/plantilla/logo_57x57-01.png" class="img-responsive" style="padding:10px">
    </span>
    <span class="logo-lg">
        <img src="vistas/img/plantilla/logo_318x72.png" class="img-responsive" style="padding:3px 0px">
    </span>

    <!-- logo normal -->


</a>

<!--==============================================
Barra de Navegación
===============================================-->
<nav class="navbar navbar-static-top" role="navigation">
<!-- Botón de Navegación -->
<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
    
</a>

 <!-- Perfil de Usuario -->
 <div class="navbar-custom-menu">
     <ul class="nav navbar-nav">
         <li class="dropdown user user-menu">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 <?php

                 if($_SESSION["foto"] != ""){

                    echo ' <img src="'.$_SESSION["foto"].'" class="user-image">';
                 }else{

                    echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

                 }

                 ?>
                 
                 <span class="hidden-xs"><?php echo $_SESSION["nombre"]; ?></span>
             </a>

              <!-- Dropdown-toggle -->

            <ul class="dropdown-menu">
                <li class="user-body">
                    <div class="pull-right">
                      <a href="salir" class="btn btn-default btn-flat">Salir</a>
                    </div>
                </li>
             </ul>
         </li>
     </ul>
 </div>



</nav>

</header>