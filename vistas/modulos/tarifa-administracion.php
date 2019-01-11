<div class="content-wrapper">

<section class="content-header">

  <h1>

    Administrar Tarifas Administración

  </h1>

  <ol class="breadcrumb">

    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Administrar Tarifas Administración</li>

  </ol>
  
</section>

<section class="content">

  <div class="box">

    <div class="box-header with-border">

<button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTarifaAdm">
  Agregar Tarfifa Administración
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

          $tarAdm = ControladorTarifaAdministracion::ctrMostrarTarifasAdministracion($item, $valor);

          foreach ($tarAdm as $key => $value){
            
            echo ' <tr>

            <td>'.($key+1).'</td>
            <td>'.$value["nombre"].'</td>
            <td>'.$value["tarifa"].'</td>';

            if($value["estado"] != 0){

              echo '<td><button class="btn btn-success btn-xs btnActivarTarAdm" idTarAdm="'.$value["id"].'" estadoTarAdm="0">Activado</button></td>';

            }else{

              echo '<td><button class="btn btn-danger btn-xs btnActivarTarAdm" idTarAdm="'.$value["id"].'" estadoTarAdm="1">Desactivado</button></td>';

            }

            echo '
            <td>

              <div class="btn-group">

                <button class="btn btn-warning btnEditarTarAdm" idTarAdm="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarTarAdm"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger btnEliminarTarAdm" idTarAdm="'.$value["id"].'" ><i class="fa fa-times"></i></button>

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

<div id="modalAgregarTarifaAdm" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
      CABEZA MODAL
      ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Tarifaca Administración</h4>
        
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

                <input type="text" class="form-control input-lg" id="nuevoNombreTarAdm" name="nuevoNombreTarAdm" placeholder="Ingresar nombre" required>

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

          <button type="submit" class="btn btn-primary">Guardar Tarifa Administración</button>
        
        </div>

         <?php

            $crearTarifaAdm = new ControladorTarifaAdministracion();
            $crearTarifaAdm-> ctrCrearTarifaAdministracion();

        ?>



        </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR TARIFA ARL
======================================-->

<div id="modalEditarTarAdm" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
      CABEZA MODAL
      ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Tarifa Administración</h4>
        
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

                <input type="hidden" id="idTarAdm" name="idTarAdm">

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Tarifa Administración</button>
        
        </div>

        <?php

        $editarTarifaAdm = new ControladorTarifaAdministracion();
        $editarTarifaAdm -> ctrEditarTarifaAdministracion();

        ?>

        </form>

    </div>

  </div>

</div>

<?php

$borrarTarifaAdm = new ControladorTarifaAdministracion();
$borrarTarifaAdm -> ctrBorrarTarifaAdministracion();

?>


