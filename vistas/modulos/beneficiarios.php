<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Beneficiarios


    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
      <li class="active">Administrar Beneficiarios</li>

    </ol>
  
  </section>


  <section class="content">

 
    <div class="box">

      <div class="box-header with-border">


      
      </div>

      <div class="box-body">

        <table class="table table-borderer table-striped dt-responsive tablas">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Beneficiario</th>
              <th>Documento</th>
              <th>Estado</th>
              <th>Cedula</th>
              <th>Documentos</th>     
              <th>Beneficiario de</th>
              <th>Parentesco</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

              $item = null;
              $valor = null;

              $beneficiario = ControladorBeneficiarios::ctrMostrarBeneficiarios($item, $valor);

              foreach ($beneficiario as $key => $value){
  
                echo ' <tr>

                  <td>'.($key+1).'</td>
                  <td>'.$value["beneficiario"].'</td>
                  <td>'.$value["documento"].'</td>';

                  if($value["estado"] != 0){

                    echo '<td><button class="btn btn-success btn-xs btnActivarBen" idBeneficiario="'.$value["id"].'" estadoBeneficiario="0">Activado</button></td>';

                  }else{

                    echo '<td><button class="btn btn-danger btn-xs btnActivarBen" idBeneficiario="'.$value["id"].'" estadoBeneficiario="1">Desactivado</button></td>';

                  }

                  if($value["cedula"] != ""){

                    echo '<td><a href="'.$value['cedula'].'" target="_blank"><button class="btn btn-success btn-xs" <img src="'.$value["cedula"].'"><i class="fa fa-check"></i></button></a></td>';
  
                  }else{

                    echo '<td><button class="btn btn-success btn-xs"> <i class="fa fa-times-circle"></i></button></td>'; 
  
                  }            
              
                  if($value["documentos"] != ""){

                    echo '<td><a href="'.$value['documentos'].'" target="_blank"><button class="btn btn-success btn-xs" <img src="'.$value["documentos"].'"><i class="fa fa-check"></i></button></a></td>';
  
                  }else{

                    echo '<td><button class="btn btn-danger btn-xs"><i class="fa fa-times-circle"></i></td>';
  
                  }
              
                  echo'

                    <td>'.$value["numero_afiliado"].'</td>

                    <td>'.$value["parentesco"].'</td>

                    <td>

                      <div class="btn-group">

                        <button class="btn btn-warning btnEditarBeneficiario" idBeneficiario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarBeneficiario"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarBeneficiario" idBeneficiario="'.$value["id"].'" cedula="'.$value["cedula"].'" documentos="'.$value["documentos"].'" numero_documento="'.$value["numero_documento"].'"><i class="fa fa-times"></i></button>

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
MODAL EDITAR BENEFICIARIO
======================================-->

<div id="modalEditarBeneficiario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
      CABEZA MODAL
      ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Beneficiario</h4>
        
        </div>

        <!--=====================================
        CUERPO MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA NOMBRES -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarNombres" id="editarNombres" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL APELLIDO PATERNO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarApellidoP" id="editarApellidoP" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL APELLIDO MATERNO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="editarApellidoM" id="editarApellidoM" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL TIPO PARENTESCO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-address-card"></i></span>

                <select class="form-control input-lg" name="editarTipoParentesco">

                  <option value="" value="" id="editarTipoParentesco"></option>

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

                <input type="number" min="0" class="form-control input-lg" name="editarDocumentoId" id="editarDocumentoId" value="" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA CEDULA -->

            <div class="form-group">

              <div class="panel"> SUBIR PDF CÉDULA</div>

              <input type="file" class="nuevoPdf" name="editarCed">

              <p class="help-block">Peso máximo del archivo 20 MB</p>

              <img src="vistas/img/beneficiarios/default/upload.png" class="img-thumbnail previsualizar" width="50px" >

              <input type="hidden" name="cedActualPdf" id="cedActualPdf">

            </div>

            <!-- ENTRADA PARA DOCUMENTOS PDF -->

            <div class="form-group">

              <div class="panel"> SUBIR PDF DOCUMENTOS</div>

              <input type="file" class="nuevoPdf2" name="editarDoc">

              <p class="help-block">Peso máximo del archivo 20 MB</p>

              <img src="vistas/img/beneficiarios/default/upload.png" class="img-thumbnail previsualizarDoc" width="50px" >

              <input type="hidden" name="docActualPdf" id="docActualPdf">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Beneficiario</button>
        
        </div>

        <?php

          $editarBeneficiario = new ControladorBeneficiarios();
          $editarBeneficiario -> ctrEditarBeneficiario();

        ?>


      </form>

    </div>

  </div>

</div>




