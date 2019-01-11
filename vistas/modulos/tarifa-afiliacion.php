<div class="content-wrapper">

<section class="content-header">

  <h1>

    Administrar Tarifas Afiliación

  </h1>

  <ol class="breadcrumb">

    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Administrar Tarifas Afiliación</li>

  </ol>
  
</section>

<section class="content">

  <div class="box">

    <div class="box-header with-border">

<button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTarifaAfi">
  Agregar Tarifa Afiliación
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

          $tarAfi = ControladorTarifaAfiliaciones::ctrMostrarTarifasAfiliaciones($item, $valor);

          foreach ($tarAfi as $key => $value){
            
            echo ' <tr>

            <td>'.($key+1).'</td>
            <td>'.$value["nombre"].'</td>
            <td>'.$value["tarifa"].'</td>';

            if($value["estado"] != 0){

              echo '<td><button class="btn btn-success btn-xs btnActivarTarAfi" idTarAfi="'.$value["id"].'" estadoTarAfi="0">Activado</button></td>';

            }else{

              echo '<td><button class="btn btn-danger btn-xs btnActivarTarAfi" idTarAfi="'.$value["id"].'" estadoTarAfi="1">Desactivado</button></td>';

            }

            echo '
            <td>

              <div class="btn-group">

                <button class="btn btn-warning btnEditarTarAfi" idTarAfi="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarTarAfi"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger btnEliminarTarAfi" idTarAfi="'.$value["id"].'" ><i class="fa fa-times"></i></button>

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
MODAL AGREGAR TARIFA AFILIACION
======================================-->

<div id="modalAgregarTarifaAfi" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
      CABEZA MODAL
      ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Tarifa Afiliación</h4>
        
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

          <button type="submit" class="btn btn-primary">Guardar Tarifa Afiliación</button>
        
        </div>

         <?php

            $crearTarifaAfi = new ControladorTarifaAfiliaciones();
            $crearTarifaAfi-> ctrCrearTarifaAfiliacion();

        ?>



        </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR TARIFA AFILIACIÓN
======================================-->

<div id="modalEditarTarAfi" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
      CABEZA MODAL
      ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Tarifa Afiliación</h4>
        
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

                <input type="hidden" id="idTarAfi" name="idTarAfi">

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Tarifa Afiliación</button>
        
        </div>

        <?php

        $editarTarifaAfi = new ControladorTarifaAfiliaciones();
        $editarTarifaAfi -> ctrEditarTarifaAfiliacion();

        ?>

        </form>

    </div>

  </div>

</div>

<?php

$borrarTarifaAfi = new ControladorTarifaAfiliaciones();
$borrarTarifaAfi -> ctrBorrarTarifaAfiliacion();

?>


