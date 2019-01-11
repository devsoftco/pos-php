<div class="content-wrapper">

<section class="content-header">

  <h1>

    Administrar Afiliados


  </h1>

  <ol class="breadcrumb">

    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Administrar Afiliados</li>

  </ol>
  
</section>


<section class="content">

 
  <div class="box">

    <div class="box-header with-border">

        <button class="btn btn-primary"type="button" data-toggle="modal" data-target="#modalAgregarCliente">

        Agregar Afiliado

      </button>
      
    </div>

    <div class="box-body">

      <table class="table table-borderer table-striped dt-responsive tablas">

        <thead>

          <tr>

            <th style="width:10px">#</th>
            <th>Nombres</th>
            <th>A. Paterno</th>
            <th>A. Materno</th>
            <th>Tipo ID</th>
            <th>Nº ID</th>
            <th>Estado</th>
            <th>Email</th>
            <th>Celular</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Barrio</th>
            <th>Departamento</th>
            <th>Fecha nacimiento</th>
            <th>Cedula</th>
            <th>Total pagos</th>
            <th>último pago</th>
            <th>Registro al sistema</th>
            <th>Acciones</th>

          </tr>

        </thead>

        <tbody>

          <?php

          $item = null;
          $valor = null;

          $afiliados = ControladorAfiliados::ctrMostrarAfiliados($item, $valor);

          foreach ($afiliados as $key => $value){
  
            echo ' <tr>

              <td>'.($key+1).'</td>
              <td>'.$value["nombres"].'</td>
              <td>'.$value["apellido_paterno"].'</td>
              <td>'.$value["apellido_materno"].'</td>
              <td>'.$value["tipo_documento"].'</td>
              <td>'.$value["numero_documento"].'</td>';

              if($value["estado"] != 0){

                echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

              }else{

                echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

              }
              echo'
              <td>'.$value["email"].'</td>
              <td>'.$value["celular"].'</td>
              <td>'.$value["telefono"].'</td>
              <td>'.$value["direccion"].'</td>
              <td>'.$value["barrio"].'</td>
              <td>'.$value["departamento"].'</td>
              <td>'.$value["fecha_nacimiento"].'</td>';
              
              if($value["cedula"] != ""){

                echo '<td><img src="'.$value["cedula"].'" class="img-thumnail" width="40px"></td>';
  
              }else{

                echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumnail" width="40px"></td>';
  
              }
  
              echo '
              <td>'.$value["fecha"].'</td>
              <td>'.$value["fecha"].'</td>
              <td>'.$value["fecha"].'</td>
              <td>

                <div class="btn-group">

                  <button class="btn btn-warning btnEditarAfiliado" idAfiliado="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarAfiliado"><i class="fa fa-pencil"></i></button>

                  <button class="btn btn-danger btnEliminarAfiliado" idAfiliado="'.$value["id"].'" cedula="'.$value["cedula"].'" numero_documento="'.$value["numero_documento"].'"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR AFILIADO
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Afiliado</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoAfiliado" placeholder="Ingresar Nombres" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL APELLIDO PATERNO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoApellidoP" placeholder="Ingresar Apellido Paterno" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL APELLIDO MATERNO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoApellidoM" placeholder="Ingresar Apellido Materno" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TIPO DOCUMENTO ID -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-address-card"></i></span>

                <select class="form-control input-lg" name="nuevoTipoDocumento">

                  <option value="">Seleccionar Tipo Documento</option>

                  <option value="CC">CC</option>

                  <option value="CE">CE</option>

                  <option value="PASAPORTE">PASAPORTE</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA EL DOCUMENTO ID -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                  <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar número documento" id="nuevoDocumentoId" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar Email" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL CELULAR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoCelular" placeholder="Ingresar Número Celular" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TELÉFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoFijo" placeholder="Ingresar Número Fijo" data-inputmask="'mask':'999-9999'" data-mask  required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCIÓN -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar Dirección" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL BARRIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoBarrio" placeholder="Ingresar Barrio" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL DEPARTAMENTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-globe"></i></span>

                <select class="form-control input-lg" name="nuevoDepartamento">

                  <option value="">Seleccionar Departamento</option>

                  <option value="QUINDIO">QUINDIO</option>

                  <option value="CALARCA">CALARCA</option>

                  <option value="CIRCASIA">CIRCASIA</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA LA FECHA NACIMIENTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar Fecha Nacimiento" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>

            <!-- ENTRADA PARA PDF -->

            <div class="form-group">

              <div class="panel"> SUBIR PDF</div>

                <input type="file" class="nuevoPdf" name="nuevoPdf">

                <p class="help-block">Peso máximo del archivo 20 MB</p>

                <img src="vistas/img/clientes/default/anonymous.png" class="img-thumbnail previsualizar" width="100px" >

              </div>

            </div>

        </div>

        <!--=====================================
        PIE MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Afiliado</button>

        </div>


      </form>

      <?php

        $crearAfiliado = new ControladorAfiliados();
        $crearAfiliado -> ctrCrearAfiliado();


      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR AFILIADO
======================================-->

<div id="modalEditarAfiliado" class="modal fade" role="dialog">

<div class="modal-dialog">

  <div class="modal-content">

    <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
      CABEZA MODAL
      ======================================-->

      <div class="modal-header" style="background:#3c8dbc; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Editar Afiliado</h4>

      </div>

      <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

      <div class="modal-body">

        <div class="box-body">

          <!-- ENTRADA PARA EL NOMBRE -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="text" class="form-control input-lg" id="editarNombres" name="editarNombres" value="" required>

            </div>

          </div>

          <!-- ENTRADA PARA EL APELLIDO PATERNO -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="text" class="form-control input-lg" id="editarApellidoP" name="editarApellidoP" value="" required>

            </div>

          </div>

          <!-- ENTRADA PARA EL APELLIDO MATERNO -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="text" class="form-control input-lg" id="editarApellidoM" name="editarApellidoM" value="" required>

            </div>

          </div>

          <!-- ENTRADA PARA EL TIPO DOCUMENTO ID -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-address-card"></i></span>

              <select class="form-control input-lg" name="editarTipoDocumento">

                <option value="" id="editarTipoDocumento"></option>

                <option value="CC">CC</option>

                <option value="CE">CE</option>

                <option value="PASAPORTE">PASAPORTE</option>

              </select>

            </div>

          </div>

          <!-- ENTRADA PARA EL DOCUMENTO ID -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="number" min="0" class="form-control input-lg" id="editarDocumentoId" name="editarDocumentoId" value="" readonly>

            </div>

          </div>

          <!-- ENTRADA PARA EL EMAIL -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

              <input type="email" class="form-control input-lg" id="editarEmail" name="editarEmail" value="" required>

            </div>

          </div>

          <!-- ENTRADA PARA EL CELULAR -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-mobile"></i></span>

              <input type="text" class="form-control input-lg" id="editarCelular" name="editarCelular" value="" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

            </div>

          </div>

          <!-- ENTRADA PARA EL TELÉFONO -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-phone"></i></span>

              <input type="text" class="form-control input-lg" id="editarFijo" name="editarFijo" value="" data-inputmask="'mask':'999-9999'" data-mask  required>

            </div>

          </div>

          <!-- ENTRADA PARA LA DIRECCIÓN -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-map"></i></span>

              <input type="text" class="form-control input-lg" id="editarDireccion" name="editarDireccion" value="" required>

            </div>

          </div>

          <!-- ENTRADA PARA EL BARRIO -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>

              <input type="text" class="form-control input-lg" id="editarBarrio" name="editarBarrio" value="" required>

            </div>

          </div>

          <!-- ENTRADA PARA EL DEPARTAMENTO -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-globe"></i></span>

              <select class="form-control input-lg" name="editarDepartamento">

                <option value="" id="EditarDepartamento"></option>

                <option value="QUINDIO">QUINDIO</option>

                <option value="CALARCA">CALARCA</option>

                <option value="CIRCASIA">CIRCASIA</option>

              </select>

            </div>

          </div>

          <!-- ENTRADA PARA LA FECHA NACIMIENTO -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

              <input type="text" class="form-control input-lg" id="editarFechaNacimiento" name="editarFechaNacimiento" value="" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

            </div>

          </div>

          <!-- ENTRADA PARA PDF -->

          <div class="form-group">

            <div class="panel"> SUBIR PDF</div>

              <input type="file" class="nuevoPdf" name="editarPdf">

              <p class="help-block">Peso máximo del archivo 20 MB</p>

              <img src="vistas/img/clientes/default/anonymous.png" class="img-thumbnail previsualizar" width="100px" >

              <input type="hidden" name="actualPdf" id="actualPdf">
              

            </div>

          </div>

          

      </div>

      <!--=====================================
      PIE MODAL
      ======================================-->

      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Modificar Afiliado</button>

      </div>


    </form>

    <?php

      $editarAfiliado = new ControladorAfiliados();
      $editarAfiliado -> ctrEditarAfiliado();


    ?>

  </div>

</div>

</div>

<?php

$borrarAfiliado = new ControladorAfiliados();
$borrarAfiliado -> ctrBorrarAfiliado();

?>