<div class="content-wrapper">

<section class="content-header">

  <h1>

    Empresas Aportantes

  </h1>

  <ol class="breadcrumb">

    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Administrar Aportantes</li>

  </ol>
  
</section>

<section class="content">

  <div class="box">

    <div class="box-header with-border">

<button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEmpresa">
  Agregar Empresa
</button>
      
    </div>
    <div class="box-body">
      
      <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
        
      <thead>

        <tr>

          <th style="width:10px">#</th>
          <th>Nombre</th>
          <th>Nit</th>
          <th>Estado</th>
          <th>Dirección</th>
          <th>Acciones</th>

        </tr>

      </thead>

        <tbody>

          <?php

          $item = null;
          $valor = null;

          $emp = ControladorEmpresasAp::ctrMostrarEmpresas($item, $valor);

          foreach ($emp as $key => $value){
            
            echo ' <tr>

            <td>'.($key+1).'</td>
            <td>'.$value["nombre"].'</td>
            <td>'.$value["nit"].'</td>';

            if($value["estado"] != 0){

              echo '<td><button class="btn btn-success btn-xs btnActivarEmpAp" idEmp="'.$value["id"].'" estadoEmp="0">Activado</button></td>';

            }else{

              echo '<td><button class="btn btn-danger btn-xs btnActivarEmpAp" idEmp="'.$value["id"].'" estadoEmp="1">Desactivado</button></td>';

            }

            echo '<td>'.$value["direccion"].'</td>
            <td>

              <div class="btn-group">

                <button class="btn btn-warning btnEditarEmpAp" idEmp="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarEmp"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger btnEliminarEmpAp" idEmp="'.$value["id"].'" ><i class="fa fa-times"></i></button>

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
MODAL AGREGAR EMPRESA
======================================-->

<div id="modalAgregarEmpresa" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

      <!--=====================================
      CABEZA MODAL
      ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Empresa Aportante</h4>
        
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

            <!-- ENTRADA PARA EL NIT -->

            <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>

                    <input type="text" class="form-control input-lg" id="nuevoNit" name="nuevoNit" placeholder="Ingresar NIT" required>

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

          <button type="submit" class="btn btn-primary">Guardar Empresa</button>
        
        </div>

         <?php

            $crearEmpresa = new ControladorEmpresasAp();
            $crearEmpresa -> ctrCrearEmpresa();

        ?>



        </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR EMPRESA
======================================-->

<div id="modalEditarEmp" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
      CABEZA MODAL
      ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Empresa Aportante</h4>
        
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

            <!-- ENTRADA PARA EL NIT -->

            <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>

                    <input type="text" class="form-control input-lg" id="editarNit" name="editarNit" value="" required>

                </div>

            </div>

            <!-- ENTRADA PARA DIRECCION -->

            <div class="form-group">

                <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                    <input type="text" class="form-control input-lg" id="editarDireccion" name="editarDireccion" placeholder="Escriba nueva Dirección">

                    <input type="hidden" id="idEmp" name="idEmp">

                </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Empresa</button>
        
        </div>

        <?php

            $editarEmpresa = new ControladorEmpresasAp();
            $editarEmpresa -> ctrEditarEmpresa();

        ?>

        </form>

    </div>

  </div>

</div>

<?php

$borrarEmpresa = new ControladorEmpresasAp();
$borrarEmpresa -> ctrBorrarEmpresa();

?>



