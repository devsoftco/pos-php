<div class="content-wrapper">

<section class="content-header">

  <h1>

    Administrar Caja de Compensaciones Familiar

  </h1>

  <ol class="breadcrumb">

    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Administrar CCF</li>

  </ol>
  
</section>

<section class="content">

  <div class="box">

    <div class="box-header with-border">

<button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCcf">
  Agregar CCF
</button>
      
    </div>
    <div class="box-body">
      
      <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        
      <thead>

        <tr>

          <th style="width:10px">#</th>
          <th>Nombre</th>
          <th>Código</th>
          <th>NIT</th>
          <th>Estado</th>
          <th>Dirección</th>
          <th>Acciones</th>

        </tr>

      </thead>

        <tbody>

          <?php

          $item = null;
          $valor = null;

          $caja = ControladorCajas::ctrMostrarCaja($item, $valor);

          foreach ($caja as $key => $value){
            
            echo ' <tr>

            <td>'.($key+1).'</td>
            <td>'.$value["nombre"].'</td>
            <td>'.$value["codigo"].'</td>';

            echo '<td>'.$value["nit"].'</td>';

            if($value["estado"] != 0){

              echo '<td><button class="btn btn-success btn-xs btnActivarCcf" idCcf="'.$value["id"].'" estadoCcf="0">Activado</button></td>';

            }else{

              echo '<td><button class="btn btn-danger btn-xs btnActivarCcf" idCcf="'.$value["id"].'" estadoCcf="1">Desactivado</button></td>';

            }

            echo '<td>'.$value["direccion"].'</td>
            <td>

              <div class="btn-group">

                <button class="btn btn-warning btnEditarCcf" idCcf="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCcf"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger btnEliminarCcf" idCcf="'.$value["id"].'" codigo="'.$value["codigo"].'"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR CCF
======================================-->

<div id="modalAgregarCcf" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
      CABEZA MODAL
      ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar CCF</h4>
        
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

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL CODIGO -->

            <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>

                    <input type="text" class="form-control input-lg" name="nuevoCodigo" placeholder="Ingresar Codigo" id="nuevoCodigo" required>

                </div>

            </div>

            <!-- ENTRADA PARA EL NIT -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoNit" placeholder="Ingresar NIT" id="nuevoNit" required>

              </div>

            </div>


             <!-- ENTRADA PARA DIRECCION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar Dirección" required>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar CCF</button>
        
        </div>

         <?php

            $crearCaja = new ControladorCajas();
            $crearCaja -> ctrCrearCaja();

        ?>



        </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CCF
======================================-->

<div id="modalEditarCcf" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
      CABEZA MODAL
      ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar CCF</h4>
        
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

            <!-- ENTRADA PARA EL CODIGO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-barcode"></i></span>

                <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" value="" readonly>

              </div>

            </div>

             <!-- ENTRADA PARA NIT -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>

                <input type="text" class="form-control input-lg" id="editarNit" name="editarNit" placeholder="Escriba nuevo Nit">

              </div>

            </div>

            <!-- ENTRADA PARA DIRECCION -->

            <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-address-book-o"></i></span>

                    <input type="text" class="form-control input-lg" id="editarDireccion" name="editarDireccion" placeholder="Escriba nueva Dirección">

                </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar CCF</button>
        
        </div>

        <?php

        $editarCaja = new ControladorCajas();
        $editarCaja -> ctrEditarCaja();

        ?>

        </form>

    </div>

  </div>

</div>

<?php

$borrarCaja = new ControladorCajas();
$borrarCaja -> ctrBorrarCaja();

?>


