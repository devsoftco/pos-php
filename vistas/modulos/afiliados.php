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
            <th>Afiliado</th>
            <th>Documento</th>           
            <th>Cedula</th>
            <th>Documentos</th>
            <th>Afiliado</th>
            <th>Beneficiarios</th>
            <th>Acciones</th>

          </tr>

        </thead>

        <tbody>

          <?php

          $item = null;
          $valor = null;

          

          $afiliados = ControladorAfiliados::ctrMostrarAfiliados($item, $valor);

          foreach ($afiliados as $key => $value){

            $productos = $value["id"];
            echo ' <tr>

              <td>'.($key+1).'</td>
              <td>'.$value["afiliado"].'</td>
              <td>'.$value["documento"].'</td>';
              
              if($value["cedula"] != ""){

                echo '<td><a href="'.$value['cedula'].'" target="_blank"><button class="btn btn-success btn-xs" <img src="'.$value["cedula"].'"><i class="fa fa-check"></i></button></a></td>';
  
              }else{

                echo '<td><button class="btn btn-success btn-xs" <img src="'.$value["cedula"].'"><i class="fa fa-times-circle"></i></button></td>';
  
              }

              if($value["antecedentes"] == 0 && $value["afiliacion_id"] == 0){

                echo '<td><button class="btn btn-danger btn-xs" disabled>No Afiliado</button></td>';
  
              }elseif($value["antecedentes"] != 0){

                echo '<td><button class="btn btn-success btn-xs btnAgregarAnt" idAfiliado="'.$value["id"].'" data-toggle="modal" data-target="#modalAgregarAntecedente" >Con Documentación</button></td>';
  
              }else{

                echo '<td><button class="btn btn-danger btn-xs btnAgregarAnt" idAfiliado="'.$value["id"].'" data-toggle="modal" data-target="#modalAgregarAntecedente" >Sin Documentación</button></td>';
  
              }

              if($value["afiliacion_id"] != 0 && $value["estado"] != 0){

                echo '<td><button class="btn btn-success btn-xs" idAfiliado="'.$value["id"].'"  >Afiliado</button></td>';

              }elseif ($value["afiliacion_id"] != 0 && $value["estado"] == 0){

                echo '<td><button class="btn btn-warning btn-xs" idAfiliado="'.$value["id"].'">Desactivado</button></td></a>';

              }else{

                echo '<td><button class="btn btn-danger btn-xs btnAfiliar" idAfiliado="'.$value["id"].'">No Afiliado</button></td></a>';

              }


              if($value["estado"] == 0 && $value["afiliacion_id"] == 0){

                echo '<td><button class="btn btn-danger btn-xs" disabled >Sin Beneficiarios</button></td>';

              }elseif ($value["afiliado_id"] != 0) {

                echo '<td><button class="btn btn-success btn-xs btnAgregarBen" idAfiliado="'.$value["id"].'" data-toggle="modal" data-target="#modalAgregarBeneficiario" >Con Beneficiarios</button></td>';

              }else{

                echo '<td><button class="btn btn-danger btn-xs btnAgregarBen" idAfiliado="'.$value["id"].'" data-toggle="modal" data-target="#modalAgregarBeneficiario" >Sin Beneficiarios</button></td>';

              }
              echo'

              <td>

                <div class="btn-group">

                  <button class="btn btn-warning btnEditarAfiliado" idAfiliado="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarAfiliado"><i class="fa fa-pencil"></i></button>';

                  if($value["afiliacion_id"] != 0){

                    echo '<button class="btn btn-danger" disabled><i class="fa fa-times"></i></button>';

                  }else{

                    echo '<button class="btn btn-danger btnEliminarAfiliado" idAfiliado="'.$value["id"].'" cedula="'.$value["cedula"].'" numero_documento="'.$value["numero_documento"].'"><i class="fa fa-times"></i></button>';

                  }

                  echo'
                  
                  <button class="btn btn-info btnVerAfiliado" idAfiliado="'.$value["id"].'" data-toggle="modal" data-target="#modalVerAfiliado"><i class="fa fa-search"></i></button>

                  

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
MODAL AGREGAR AFILIACION
======================================-->

<div id="modalAgregarCliente" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">

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

            <div class="row">

              <div class="col-md-6">

                <label>Apellido Paterno:</label>

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <input type="text" class="form-control input-lg" name="nuevoApellidoP" placeholder="Ingresar Apellido Paterno" required>

                  </div>

                </div>

              </div>

            <!-- ENTRADA PARA EL APELLIDO MATERNO -->

            <div class="col-md-6 ml-auto">

              <label>Apellido Materno:</label>

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control input-lg" name="nuevoApellidoM" placeholder="Ingresar Apellido Materno" required>

                </div>

              </div>

            </div>

          </div>

            <!-- ENTRADA PARA EL TIPO DOCUMENTO ID -->

            <div class="row">

              <div class="col-md-4">

                <label>Tipo Documento:</label>

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-address-card"></i></span>

                    <select class="form-control input-lg" name="nuevoTipoDocumento">

                      <option value="">Seleccionar Tipo</option>

                      <option value="CC">CC</option>

                      <option value="CE">CE</option>

                      <option value="PASAPORTE">PASAPORTE</option>

                    </select>

                  </div>

                </div>

              </div>


            <!-- ENTRADA PARA EL NÚMERO DOCUMENTO ID -->

              <div class="col-md-5">

                <label>Número:</label>

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar número documento" id="nuevoDocumentoId" required>

                  </div>

                </div>

              </div>



            <!-- ENTRADA PARA LA FECHA NACIMIENTO -->

            <div class="col-md-3 ml-auto">

              <label>Fecha Nacimiento:</label>

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                  <input type="text" class="form-control input-lg" name="nuevaFechaNacimiento" placeholder="Ingresar Fecha" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

                </div>

              </div>

            </div>

          </div>

          <!--  -->



            

            <div class="row">

              <!-- ENTRADA PARA EL EMAIL -->

              <div class="col-md-8">

                <div class="form-group">

                  <label>Email:</label>

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                    <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar Email" >

                  </div>

                </div>

              </div>

            </div>

            <!--  -->


            

            <!-- ENTRADA PARA EL CELULAR -->

            <div class="row">

              <div class="col-md-6">

                <label>Celular:</label>

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-mobile"></i></span>

                    <input type="text" class="form-control input-lg" name="nuevoCelular" placeholder="Ingresar Número Celular" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

                  </div>

                </div>

              </div>

            <!-- ENTRADA PARA EL TELÉFONO -->

            <div class="col-md-6 ml-auto">

              <label>Fijo:</label>

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                  <input type="text" class="form-control input-lg" name="nuevoFijo" placeholder="Ingresar Número Fijo" data-inputmask="'mask':'999-9999'" data-mask  >

                </div>

              </div>

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

            <div class="row">

              <div class="col-md-6">

                <label>Barrio:</label>

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>

                    <input type="text" class="form-control input-lg" name="nuevoBarrio" placeholder="Ingresar Barrio" >

                  </div>

                </div>

              </div>

            <!-- ENTRADA PARA EL DEPARTAMENTO -->

            <div class="col-md-6 ml-auto">

              <label>Fijo:</label>

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-globe"></i></span>

                  <select class="form-control input-lg" name="nuevoDepartamento">

                    <option value="">Seleccionar Departamento</option>

                    <option value="QUINDIO">QUINDIO</option>

                    <option value="CALARCA">CALARCA</option>

                    <option value="CIRCASIA">CIRCASIA</option>

                    <option value="SANTA MARTA">SANTA MARTA</option>

                  </select>

                </div>

              </div>

            </div>

          </div>



            <!-- ENTRADA PARA PDF -->

            <div class="form-group">

              <div class="panel"> SUBIR PDF</div>

                <input type="file" class="nuevoPdf" name="nuevoPdf">

                <p class="help-block">Peso máximo del archivo 20 MB</p>

                <img src="vistas/img/afiliados/default/anonymous.png" class="img-thumbnail previsualizar" width="50px" >

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

          <div class="row">

            <div class="col-md-6">

              <label>Apellido Paterno:</label>

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control input-lg" id="editarApellidoP" name="editarApellidoP" value="" required>

                </div>

              </div>

            </div>

          <!-- ENTRADA PARA EL APELLIDO MATERNO -->

            <div class="col-md-6">

              <label>Apellido Paterno:</label>

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control input-lg" id="editarApellidoM" name="editarApellidoM" value="" required>

                </div>

              </div>

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

              <input type="email" class="form-control input-lg" id="editarEmail" name="editarEmail" value="" >

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

              <input type="text" class="form-control input-lg" id="editarFijo" name="editarFijo" value="" data-inputmask="'mask':'999-9999'" data-mask  >

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

                <option value="" id="editarDepartamento"></option>

                <option value="QUINDIO">QUINDIO</option>

                <option value="CALARCA">CALARCA</option>

                <option value="CIRCASIA">CIRCASIA</option>

                <option value="SANTA MARTA">SANTA MARTA</option>

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

              <img src="vistas/img/afiliados/default/anonymous.png" class="img-thumbnail previsualizar" width="50px" >

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

<!--=====================================
MODAL VER AFILIADO
======================================-->

<div id="modalVerAfiliado" class="modal fade" role="dialog">

<div class="modal-dialog">

  <div class="modal-content">

    <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
      CABEZA MODAL
      ======================================-->

      <div class="modal-header" style="background:#3c8dbc; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Ver Afiliado</h4>

      </div>

      <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

      <div class="modal-body">

        <div class="container-fluid">

          <!-- ENTRADA PARA LOS NOMBRES -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="text" class="form-control input-lg" id="verNombres" name="verNombres" value="" readonly>

            </div>

          </div>

          <!-- ENTRADA PARA EL APELLIDO PATERNO -->

          <div class="row">

            <div class="col-md-6">

              <label>Apellido Paterno:</label>

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control input-lg" id="verApellidoP" name="verApellidoP" value="" readonly>

                </div>

              </div>
            
            </div>

            <!-- ENTRADA PARA EL APELLIDO MATERNO -->

            <div class="col-md-6 ml-auto">

              <label>Apellido Materno:</label>

              <div class="form-group">

                <div class="input-group">

                  <span class="input-group-addon"><i class="fa fa-user"></i></span>

                  <input type="text" class="form-control input-lg" id="verApellidoM" name="verApellidoM" value="" readonly>

                </div>

              </div>
            
            </div>

          </div>

          <!-- ENTRADA PARA EL TIPO DOCUMENTO ID -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-address-card"></i></span>

              <select class="form-control input-lg" name="verTipoDocumento" readonly>

                <option value="" id="verTipoDocumento"></option>

              </select>

            </div>

          </div>

          <!-- ENTRADA PARA EL DOCUMENTO ID -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="number" min="0" class="form-control input-lg" id="verDocumentoId" name="verDocumentoId" value="" readonly>

            </div>

          </div>

          <!-- ENTRADA PARA EL EMAIL -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

              <input type="email" class="form-control input-lg" id="verEmail" name="verEmail" value="" readonly>

            </div>

          </div>

          <!-- ENTRADA PARA EL CELULAR -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-mobile"></i></span>

              <input type="text" class="form-control input-lg" id="verCelular" name="verCelular" value="" data-inputmask="'mask':'(999) 999-9999'" data-mask readonly>

            </div>

          </div>

          <!-- ENTRADA PARA EL TELÉFONO -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-phone"></i></span>

              <input type="text" class="form-control input-lg" id="verFijo" name="verFijo" value="" data-inputmask="'mask':'999-9999'" data-mask  readonly>

            </div>

          </div>

          <!-- ENTRADA PARA LA DIRECCIÓN -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-map"></i></span>

              <input type="text" class="form-control input-lg" id="verDireccion" name="verDireccion" value="" readonly>

            </div>

          </div>

          <!-- ENTRADA PARA EL BARRIO -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-map-signs"></i></span>

              <input type="text" class="form-control input-lg" id="verBarrio" name="verBarrio" value="" readonly>

            </div>

          </div>

          <!-- ENTRADA PARA EL DEPARTAMENTO -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-globe"></i></span>

              <select class="form-control input-lg" name="verDepartamento" readonly>

                <option value="" id="verDepartamento" ></option>

              </select>

            </div>

          </div>

          <!-- ENTRADA PARA LA FECHA NACIMIENTO -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

              <input type="text" class="form-control input-lg" id="verFechaNacimiento" name="verFechaNacimiento" value="" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask readonly>

            </div>

          </div>

          <!-- ENTRADA PARA PDF -->

          <div class="form-group">

            <div class="panel"> SUBIR PDF</div>

              <p class="help-block">Peso máximo del archivo 20 MB</p>

              <img src="vistas/img/afiliados/default/anonymous.png" class="img-thumbnail previsualizar" width="100px" >

              <input type="hidden" name="actualPdf" id="actualPdf">
              

            </div>

          </div>

      </div>

      <!--=====================================
      PIE MODAL
      ======================================-->

      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>


      </div>


    </form>


  </div>

</div>

</div>

<!--=====================================
MODAL AGREGAR BENEFICIARIO
======================================-->

<div id="modalAgregarBeneficiario" class="modal fade" role="dialog">

<div class="modal-dialog">

  <div class="modal-content">

    <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
      CABEZA MODAL
      ======================================-->

      <div class="modal-header" style="background:#3c8dbc; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar Beneficiario</h4>

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

              <input type="text" class="form-control input-lg" name="nuevoNombresBen" placeholder="Ingresar Nombres" required>

              <input type="hidden" id="id" name="id" value="id">

            </div>

          </div>

          <!-- ENTRADA PARA EL APELLIDO PATERNO -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="text" class="form-control input-lg" name="nuevoApellidoPBen" placeholder="Ingresar Apellido Paterno" required>

            </div>

          </div>

          <!-- ENTRADA PARA EL APELLIDO MATERNO -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-user"></i></span>

              <input type="text" class="form-control input-lg" name="nuevoApellidoMBen" placeholder="Ingresar Apellido Materno" required>

            </div>

          </div>

          <!-- ENTRADA PARA EL TIPO PARENTESCO -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-address-card"></i></span>

              <select class="form-control input-lg" name="nuevoTipoParentescoBen">

                <option value="">Seleccionar Parentesco</option>

                <option value="ESPOSO">ESPOSO (A)</option>

                <option value="HIJO">HIJO (A)</option>

                <option value="PADRE">PADRE</option>

                <option value="MADRE">MADRE</option>

              </select>

              </div>

            </div>

          <!-- ENTRADA PARA EL TIPO DOCUMENTO ID -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-address-card"></i></span>

              <select class="form-control input-lg" name="nuevoTipoDocumentoBen">

                <option value="">Seleccionar Tipo Documento</option>

                <option value="CC">CC</option>

                <option value="CE">CE</option>

                <option value="TI">TI</option>

                <option value="RC">RC</option>

                <option value="PASAPORTE">PASAPORTE</option>

              </select>

            </div>

          </div>

          <!-- ENTRADA PARA EL DOCUMENTO ID -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoIdBen" placeholder="Ingresar número documento" id="nuevoDocumentoIdBen" required>

            </div>

          </div>

          <!-- ENTRADA PARA CEDULA -->

          <div class="form-group">

            <div class="panel"> SUBIR PDF CÉDULA</div>

              <input type="file" class="cedulaPdfBen" name="cedulaPdfBen">

              <p class="help-block">Peso máximo del archivo 20 MB</p>

              <img src="vistas/img/beneficiarios/default/upload.png" class="img-thumbnail previsualizar" width="50px" >

          </div>

          <!-- ENTRADA PARA DOCUMENTOS PDF -->

          <div class="form-group">

            <div class="panel"> SUBIR PDF DOCUMENTOS</div>

              <input type="file" class="documentosPdfBen" name="documentosPdfBen">

              <p class="help-block">Peso máximo del archivo 20 MB</p>

              <img src="vistas/img/beneficiarios/default/upload.png" class="img-thumbnail previsualizar2" width="50px" >

          </div>

          </div>

      </div>

      <!--=====================================
      PIE MODAL
      ======================================-->

      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar Beneficiario</button>

      </div>


    </form>

    <?php

      $crearBeneficiario = new ControladorBeneficiarios();
      $crearBeneficiario -> ctrCrearBeneficiario();


    ?>

  </div>

</div>

</div>

<!--=====================================
MODAL AGREGAR ANTECEDENTE
======================================-->

<div id="modalAgregarAntecedente" class="modal fade" role="dialog">

<div class="modal-dialog">

  <div class="modal-content">

    <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
      CABEZA MODAL
      ======================================-->

      <div class="modal-header" style="background:#3c8dbc; color:white">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Agregar Documento</h4>

      </div>

      <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

      <div class="modal-body">

        <div class="box-body">

          <!-- ENTRADA PARA EL TIPO ANTECEDENTE -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-address-card"></i></span>

              <select class="form-control input-lg" name="nuevoTipoAntecedente">

                <option value="">Seleccionar Tipo</option>

                <option value="RADICADO EPS">RADICADO EPS</option>

                <option value="RADICADO ARL">RADICADO ARL</option>

                <option value="RADICADO CCF">RADICADO CCF</option>

                <option value="TUTELA">TUTELA</option>

                <option value="TRASLADO">TRASLADO</option>

                <option value="OTRO">OTRO</option>

              </select>

              </div>

            </div>


          <!-- ENTRADA PARA DOCUMENTO -->

          <div class="form-group">

            <div class="panel"> SUBIR ARCHIVO PDF</div>

              <input type="file" class="nuevoAntecedente" name="nuevoAntecedente">

              <p class="help-block">Peso máximo del archivo 20 MB</p>

              <img src="vistas/img/afiliados/antecedentes/default/upload.png" class="img-thumbnail previsualizar" width="50px" >

              <input type="hidden" id="idAnt" name="idAnt" value="idAnt">
              <input type="hidden" id="numero_documento" name="numero_documento" value="numero_documento">

          </div>

          </div>

      </div>

      <!--=====================================
      PIE MODAL
      ======================================-->

      <div class="modal-footer">

        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

        <button type="submit" class="btn btn-primary">Guardar Documento</button>

      </div>


    </form>

    <?php

      $crearAntecedente = new ControladorAfiliados();
      $crearAntecedente -> ctrCrearAntecedente();


    ?>

  </div>

</div>

</div>