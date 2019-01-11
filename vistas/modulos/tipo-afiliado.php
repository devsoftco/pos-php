<div class="content-wrapper">

<section class="content-header">

  <h1>

    Administrar Tipo Afiliado y Porcentajes

  </h1>

  <ol class="breadcrumb">

    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Administrar Tipo Afiliado y Porcentajes</li>

  </ol>
  
</section>

<section class="content">

  <div class="box">

    <div class="box-header with-border">

<button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTarifaArl">
  Agregar Tipo Afiliado
</button>
      
    </div>
    <div class="box-body">
      
      <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        
      <thead>

        <tr>

          <th style="width:10px">#</th>
          <th>Nombre</th>
          <th>Porcentaje EPS</th>
          <th>Porcentaje AFP</th>
          <th>Porcentaje CCF</th>
          <th>Estado</th>
          <th>Acciones</th>

        </tr>

      </thead>

        <tbody>

          <?php

          $item = null;
          $valor = null;

          $tipo = ControladorTipoAfiliados::ctrMostrarTipoAfiliados($item, $valor);

          foreach ($tipo as $key => $value){
            
            echo ' <tr>

            <td>'.($key+1).'</td>
            <td>'.$value["nombre"].'</td>
            <td>'.$value["porcentaje_eps"].'</td>
            <td>'.$value["porcentaje_afp"].'</td>
            <td>'.$value["porcentaje_ccf"].'</td>';

            if($value["estado"] != 0){

              echo '<td><button class="btn btn-success btn-xs btnActivarTipo" idTipo="'.$value["id"].'" estadoTipo="0">Activado</button></td>';

            }else{

              echo '<td><button class="btn btn-danger btn-xs btnActivarTipo" idTipo="'.$value["id"].'" estadoTipo="1">Desactivado</button></td>';

            }

            echo '
            <td>

              <div class="btn-group">

                <button class="btn btn-warning btnEditarTipo" idTipo="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarTipo"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger btnEliminarTipo" idTipo="'.$value["id"].'" ><i class="fa fa-times"></i></button>

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
MODAL AGREGAR TIPO AFILIADO
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

          <h4 class="modal-title">Agregar Tipo Afiliado</h4>
        
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

                <input type="text" class="form-control input-lg" id="nuevoNombreTipo" name="nuevoNombreTipo" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA PORCENTAJE EPS -->

            <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>

                    <input type="text" class="form-control input-lg" name="nuevoPorcentajeEps" placeholder="Ingresar Tarifa" id="nuevoPorcentajeEps" required>

                </div>

            </div>

            <!-- ENTRADA PARA PORCENTAJE AFP -->

            <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>

                    <input type="text" class="form-control input-lg" name="nuevoPorcentajeAfp" placeholder="Ingresar Tarifa" id="nuevoPorcentajeAfp" required>

                </div>

            </div>

            <!-- ENTRADA PARA PORCENTAJE CCF -->

            <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>

                    <input type="text" class="form-control input-lg" name="nuevoPorcentajeCcf" placeholder="Ingresar Tarifa" id="nuevoPorcentajeCcf" required>

                </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Tipo Afiliado</button>
        
        </div>

         <?php

            $crearTipo = new ControladorTipoAfiliados();
            $crearTipo -> ctrCrearTipoAfiliado();

        ?>



        </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR TIPO AFILIADO
======================================-->

<div id="modalEditarTipo" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
      CABEZA MODAL
      ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Tipo Afiliado</h4>
        
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

            <!-- ENTRADA PARA PORCENTAJE EPS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-barcode"></i></span>

                <input type="text" class="form-control input-lg" id="editarPorcentajeEps" name="editarPorcentajeEps" value="" required>

                <input type="hidden" id="idTipo" name="idTipo">

              </div>

            </div>

            <!-- ENTRADA PARA PORCENTAJE AFP -->

            <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>

                    <input type="text" class="form-control input-lg" id="editarPorcentajeAfp" name="editarPorcentajeAfp" value="" required>

                </div>

            </div>

            <!-- ENTRADA PARA PORCENTAJE CCF -->

            <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>

                    <input type="text" class="form-control input-lg" id="editarPorcentajeCcf" name="editarPorcentajeCcf" value="" required>

                </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Tipo Afiliado</button>
        
        </div>

        <?php

        $editarTipo = new ControladorTipoAfiliados();
        $editarTipo -> ctrEditarTipoAfiliado();

        ?>

        </form>

    </div>

  </div>

</div>

<?php

$borrarTipo = new ControladorTipoAfiliados();
$borrarTipo -> ctrBorrarTipoAfiliado();

?>


