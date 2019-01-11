<div class="content-wrapper">

<section class="content-header">

  <h1>

    Administrar Tarfifas Aseguradora de Riesgos Laborales

  </h1>

  <ol class="breadcrumb">

    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Administrar Tarifas ARL</li>

  </ol>
  
</section>

<section class="content">

  <div class="box">

    <div class="box-header with-border">

<button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTarifaArl">
  Agregar Tarfifa ARL
</button>
      
    </div>
    <div class="box-body">
      
      <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        
      <thead>

        <tr>

          <th style="width:10px">#</th>
          <th>Nombre</th>
          <th>Tarifa</th>
          <th>Estado</th>
          <th>Acciones</th>

        </tr>

      </thead>

        <tbody>

          <?php

          $item = null;
          $valor = null;

          $arl = ControladorTarifasArl::ctrMostrarTarifasArl($item, $valor);

          foreach ($arl as $key => $value){
            
            echo ' <tr>

            <td>'.($key+1).'</td>
            <td>'.$value["nombre"].'</td>
            <td>'.$value["tarifa"].'</td>';

            if($value["estado"] != 0){

              echo '<td><button class="btn btn-success btn-xs btnActivarTarArl" idTarArl="'.$value["id"].'" estadoTarArl="0">Activado</button></td>';

            }else{

              echo '<td><button class="btn btn-danger btn-xs btnActivarTarArl" idTarArl="'.$value["id"].'" estadoTarArl="1">Desactivado</button></td>';

            }

            echo '
            <td>

              <div class="btn-group">

                <button class="btn btn-warning btnEditarTarArl" idTarArl="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarTarArl"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger btnEliminarTarArl" idTarArl="'.$value["id"].'" ><i class="fa fa-times"></i></button>

              </div>


            </td>
            
          </tr>';
          }

          ?>

         

        </tbody>
      </table>

    </div>

  </div>

</section>

</div>

<!--=====================================
MODAL AGREGAR ARL
======================================-->

<div id="modalAgregarTarifaArl" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
      CABEZA MODAL
      ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar ARL</h4>
        
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

                <input type="text" class="form-control input-lg" id="nuevoNombre" name="nuevoNombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA TARIFA -->

            <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>

                    <input type="text" class="form-control input-lg" name="nuevaTarifa" placeholder="Ingresar Tarifa" id="nuevaTarifa" required>

                </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Tarifa ARL</button>
        
        </div>

         <?php

            $crearTarifaArl = new ControladorTarifasArl();
            $crearTarifaArl -> ctrCrearTarifaArl();

        ?>



        </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR TARIFA ARL
======================================-->

<div id="modalEditarTarArl" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
      CABEZA MODAL
      ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Tarifa ARL</h4>
        
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

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA TARIFA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-barcode"></i></span>

                <input type="text" class="form-control input-lg" id="editarTarifa" name="editarTarifa" value="" required>

                <input type="hidden" id="idTarArl" name="idTarArl">

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Tarifa ARL</button>
        
        </div>

        <?php

        $editarArl = new ControladorTarifasArl();
        $editarArl -> ctrEditarTarifaArl();

        ?>

        </form>

    </div>

  </div>

</div>

<?php

$borrarArl = new ControladorTarifasArl();
$borrarArl -> ctrBorrarTarifaArl();

?>


