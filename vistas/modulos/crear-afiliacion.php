<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Crear Afiliación

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
      <li class="active">Crear Afiliación</li>

    </ol>
  
  </section>


  <section class="content">

    <div class="row">

          <!--===========================================
      LA TABLA DE PRODUCTOS
      ============================================-->

      <div class="col-lg-2 hidden-md hidden-sm hidden-xs">


      </div>

      <!--===========================================
      EL FORMULARIO
      ============================================-->


      <div class="col-lg-8 col-xs-12">

        <div class="box box-success">

          <div class="box-header whit-border"></div>

          <form role="form" method="post">

            <div class="box-body">

              <div class="box">

                <?php

                  $item = "id";
                  $valor = $_GET["idAfiliado"];

                  $afiliados = ControladorAfiliados::ctrMostrarAfiliados($item, $valor);

                  //var_dump($afiliados);

                ?>

                <!--===========================================
                ENTRADA NOMBRES Y APELLIDOS AFILIADO
                ============================================-->

                <div class="form-group row">

                  <!-- NOMBRE -->

                  <div class="col-xs-4" style="padding-right:0px">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user"></i></span>

                      <input type="text" class="form-control" id="nuevoNombres" name="nuevoNombres" value="<?php echo $afiliados["nombres"]; ?>" readonly>

                      <input type="hidden" name="idUsuario" value="<?php echo $_SESSION["id"]; ?>">

                      <input type="hidden" id="id" name="id" value="<?php echo $_GET["idAfiliado"]; ?>">

                    </div>

                  </div>

                  <!-- APELLIDO PATERNO -->

                  <div class="col-xs-4">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user"></i></span>

                      <input type="text" class="form-control" id="nuevoApellidoP" name="nuevoApellidoP" value="<?php echo $afiliados["apellido_paterno"]; ?>" readonly>

                    </div>

                  </div>

                  <!-- APELLIDO MATERNO -->


                  <div class="col-xs-4" style="padding-left:0px">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user"></i></span>

                        <input type="text" class="form-control" id="nuevoApellidoM" name="nuevoApellidoM" value="<?php echo $afiliados["apellido_materno"]; ?>" readonly>

                    </div>

                  </div>

                </div>

                <!--===========================================
                ENTRADA ID AFILIADO
                ============================================-->

                <div class="form-group row">

                  <div class="col-xs-5" style="padding-right:0px">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-user"></i></span>

                      <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="<?php echo $afiliados["tipo_documento"]; ?> <?php echo $afiliados["numero_documento"]; ?>" readonly>

                    </div>

                  </div>

                <!--===========================================
                ENTRADA IBC
                ============================================-->

                  <?php

                    $item = null;
                    $valor = null;

                    $ibc = ControladorIbc::ctrMostrarIbc($item, $valor);

                    foreach ($ibc as $key => $value){

                    }

                  ?>


                  <div class="col-xs-5 pull-right" style="padding-left:0px">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                      <input type="number" class="form-control" id="nuevoIbc" name="nuevoIbc" value="<?php echo $value["tarifa"]; ?>" >

                    </div>

                  </div>

                </div>

                <!--===========================================
                ENTRADA AGREGAR SERVICIOS
                ============================================-->

                <div class="form-group row nuevoServicio">

                  <!-- AFP -->

                  <div class="col-xs-4" style="padding-right:0px">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                      <select class="form-control" id="seleccionarAfp" name="seleccionarAfp">

                        <option value="">Seleccionar AFP</option>

                        <?php

                          $item = null;
                          $valor = null;

                          $afp = ControladorAfp::ctrMostrarAfp($item, $valor);

                          foreach ($afp as $key => $value){

                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';


                          }

                        ?>

                      </select>

                    </div>
                  
                  </div>

                  <!-- EPS -->

                  <div class="col-xs-4">
                  
                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                      <select class="form-control" id="seleccionarEps" name="seleccionarEps" required>

                        <option value="">Seleccionar EPS</option>

                        <?php

                          $item = null;
                          $valor = null;

                          $eps = ControladorEps::ctrMostrarEps($item, $valor);

                          foreach ($eps as $key => $value){

                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';


                          }

                        ?>

                      </select>

                    </div>

                  </div>

                  <!-- ARL -->

                  <div class="col-xs-4" style="padding-left:0px">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                      <select class="form-control" id="seleccionarArl" name="seleccionarArl" >

                        <option value="">Seleccionar ARL</option>

                        <?php

                          $item = null;
                          $valor = null;

                          $arl = ControladorArl::ctrMostrarArl($item, $valor);

                          foreach ($arl as $key => $value){

                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';


                          }

                        ?>

                      </select>

                    </div>
                  
                  </div>

                  <!-- FIN ARL -->
                
                </div>

                <!-- FIN SERVICIOS AFP-EPS-ARL -->

                <div class="form-group row nuevoServicio">

                  <!-- TIPO AFILIADO -->

                  <div class="col-xs-4" style="padding-right:0px">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                      <select class="form-control" id="seleccionarTipoAfi" name="seleccionarTipoAfi" required>

                        <option value=""> Tipo Afiliado</option>

                        <?php

                          $item = null;
                          $valor = null;

                          $eps = ControladorTipoAfiliados::ctrMostrarTipoAfiliados($item, $valor);

                          foreach ($eps as $key => $value){

                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';


                          }

                        ?>

                      </select>

                    </div>

                  </div>

                  <!-- EMPRESA APORTANTE -->

                  <div class="col-xs-4">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                      <select class="form-control" id="seleccionarEmpApo" name="seleccionarEmpApo" >

                        <option value=""> Empresa Aportante</option>

                        <?php

                          $item = null;
                          $valor = null;

                          $empAp = ControladorEmpresasAp::ctrMostrarEmpresas($item, $valor);

                          foreach ($empAp as $key => $value){

                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';


                          }

                        ?>

                      </select>

                    </div>

                  </div>

                  <!-- TIPO ARL -->

                  <div class="col-xs-4" style="padding-left:0px">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                      <select class="form-control" id="seleccionarTipoArl" name="seleccionarTipoArl">

                        <option value=""> Tipo ARL</option>

                        <?php

                          $item = null;
                          $valor = null;

                          $tipoArl = ControladorTarifasArl::ctrMostrarTarifasArl($item, $valor);

                          foreach ($tipoArl as $key => $value){

                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';


                          }

                        ?>

                      </select>

                    </div>

                  </div>

                  <!-- FIN AFP -->

                </div>

                <!--===========================================
                ENTRADA SELECCIONAR PROFESIÓN
                ============================================-->

                <div class="form-group row profesion">

                  <div class="col-xs-8" style="padding-rigth:0px">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                      <select class="form-control" id="seleccionarProfesion" name="seleccionarProfesion" required>

                        <option value=""> Profesión</option>

                        <?php

                          $item = null;
                          $valor = null;

                          $profesiones = ControladorProfesiones::ctrMostrarProfesiones($item, $valor);

                          foreach ($profesiones as $key => $value){

                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';


                          }

                        ?>

                      </select>

                      <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarProfesion" data-dismiss="modal">Agregar Profesión</button></span>

                    </div>

                  </div>

                  <div class="col-xs-4">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                      <select class="form-control" id="seleccionarEmpAfi" name="seleccionarEmpAfi">

                        <option value=""> Empresa Afiliada</option>

                        <?php

                          $item = null;
                          $valor = null;

                          $empAf = ControladorEmpresasAf::ctrMostrarEmpresas($item, $valor);

                          foreach ($empAf as $key => $value){

                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';


                          }

                        ?>

                      </select>

                    </div>

                  </div>

                </div>

                <!-- FIN ENTRADA PROFESIÓN -->

                <div class="form-group row tarifa afiliacion">

                  <div class="col-xs-6 pull-left">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                      <select class="form-control" id="seleccionarCcf" name="seleccionarCcf">

                        <option value=""> CCF</option>

                        <?php

                          $item = null;
                          $valor = null;

                          $ccf = ControladorCajas::ctrMostrarCaja($item, $valor);

                          foreach ($ccf as $key => $value){

                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';


                          }

                        ?>

                      </select>

                    </div>

                  </div>

                  <div class="col-xs-4">

                    <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                      <select class="form-control" id="seleccionarTarifaAdm" name="seleccionarTarifaAdm" required>

                        <option value=""> Administración</option>

                        <?php

                          $item = null;
                          $valor = null;

                          $tarAdm = ControladorTarifaAdministracion::ctrMostrarTarifasAdministracion($item, $valor);

                          foreach ($tarAdm as $key => $value){

                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';


                          }

                        ?>

                      </select>

                      



                    </div>

                  </div>

                </div>

                <hr>

                <!--===========================================
                ENTRADA METODO DE PAGO
                ============================================-->

                <div class="form-group row">

                  <div class="col-xs-6" style="padding-right:0px">
                    
                  </div>

                  <div class="col-xs-6" style="padding-left:0px">

                    <div class="input-group">

                      <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                      <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                    </div>

                  </div>

                </div>

                <br>

              </div>

            </div> 

            <div class="box-footer">
        
              <button type="submit" class="btn btn-primary pull-right">Guardar Afiliación</button>
          
            </div>

            <?php

              $crearAfiliacion = new ControladorCrearAfiliaciones();
              $crearAfiliacion -> ctrCrearAfiliacion();

            ?>

          </form>




        
        </div>
      
      </div>

      <!--===========================================
      LA TABLA DE PRODUCTOS
      ============================================-->

      <div class="col-lg-2 hidden-md hidden-sm hidden-xs"> 
      
      </div>

    </div>

  </section>

</div>


<!--=====================================
MODAL AGREGAR PROFESION
======================================-->

<div id="modalAgregarProfesion" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

      <!--=====================================
      CABEZA MODAL
      ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Profesión</h4>
        
        </div>

        <!--=====================================
        CUERPO MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoNombre" id="nuevoNombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Profesión</button>
        
        </div>

         <?php

            $crearProfesion = new ControladorProfesiones();
            $crearProfesion -> ctrCrearProfesion();

        ?>



        </form>

    </div>

  </div>

</div>
