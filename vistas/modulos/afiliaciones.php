<div class="content-wrapper">

<section class="content-header">

  <h1>

    Administrar Afiliaciones

  </h1>

  <ol class="breadcrumb">

    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Administrar Afiliaciones</li>

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
            <th>Afiliado</th>
            <th>Documento</th>
            <th>Estado</th> 
            <th>EPS</th>
            <th>ARL</th>  
            <th>TIPO ARL</th>
            <th>AFP</th>
            <th>CCF</th>          
            <th>Beneficiarios</th>
            <th>Acciones</th>

          </tr>

        </thead>

        <tbody>

          <?php

          $itemAfiliaciones = null;
          $valorAfiliaciones = null;

          

          $afiliaciones = ControladorAfiliaciones::ctrMostrarAfiliaciones($itemAfiliaciones, $valorAfiliaciones);

          foreach ($afiliaciones as $key => $value){

            $productos = $value["id"];
            echo ' <tr>

              <td>'.($key+1).'</td>
              <td>'.$value["afiliado"].'</td>
              <td>'.$value["documento"].'</td>';

              if($value["estado"] != 0){

                echo '<td><button class="btn btn-success btn-xs btnActivarAfiliacion" idAfiliacion="'.$value["afiliacion_id"].'" estadoAfiliacion="0">Activado</button></td>';

              }else{

                echo '<td><button class="btn btn-warning btn-xs btnActivarAfiliacion" idAfiliacion="'.$value["afiliacion_id"].'" estadoAfiliacion="1">Desactivado</button></td>';

              }

              echo '
                
                <td>'.strtoupper($value["eps"]).'</td>
                <td>'.$value["arl"].'</td>
                <td>'.$value["tipo_arl"].'</td>
                <td>'.$value["afp"].'</td>
                <td>'.$value["ccf"].'</td>';





              if($value["beneficiario_id"] != 'NO TIENE'){

                echo '<td><button class="btn btn-success btn-xs btnAgregarBen" idAfiliado="'.$value["id"].'"  >Con Beneficiarios</button></td>';

              }else{

                echo '<td><button class="btn btn-danger btn-xs btnAgregarBen" idAfiliado="'.$value["id"].'" data-toggle="modal" data-target="#modalAgregarBeneficiario" >Sin Beneficiarios</button></td>';

              }
              echo'

              <td>

                <div class="btn-group">


                  <button class="btn btn-info btnEditarAfiliado" idAfiliado="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarAfiliado"><i class="fa fa-print"></i></button>

                  <button class="btn btn-warning btnEditarAfiliado" idAfiliado="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarAfiliado"><i class="fa fa-pencil"></i></button>
                ';
                if($value["estado"] == '1'){

                  echo '<button class="btn btn-danger btnAgregarRetiro" idAfiliacion="'.$value["afiliacion_id"].'" numero_documento="'.$value["numero_documento"].'" data-toggle="modal" data-target="#modalAgregarRetiro"><i class="fa fa-times"></i></button>';

                } elseif ($value["estado"] == '0'){

                  echo '<button class="btn btn-info btnAgregarActivacion" idAfiliacion="'.$value["afiliacion_id"].'" numero_documento="'.$value["numero_documento"].'" data-toggle="modal" data-target="#modalActivarAfiliacion"><i class="fa fa-plus"></i></button>';

                }else{

                  echo '<button class="btn btn-info btnAgregarActivacion" idAfiliacion="'.$value["afiliacion_id"].'" numero_documento="'.$value["numero_documento"].'" data-toggle="modal" data-target="#modalActivarAfiliacion"><i class="fa fa-plus"></i></button>';

                }

                echo'
                
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
MODAL AGREGAR RETIRO
======================================-->

<div id="modalAgregarRetiro" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
      CABEZA MODAL
      ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Retiro</h4>
        
        </div>

        <!--=====================================
        CUERPO MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NUMERO DOCUMENTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-address-card"></i></span>

                <input type="text" class="form-control input-lg" id="numero_documento" name="numero_documento" value="" readonly>

                

              </div>

            </div>

            <!-- ENTRADA PARA FECHA RETIRO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaFechaRetiro" placeholder="Ingresar Fecha" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

                <input type="hidden" id="idAfiliacion" name="idAfiliacion" value="idAfiliacion">

              </div>

            </div>

            <!-- ENTRADA PARA MOTIVO RETIRO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select class="form-control input-lg" name="nuevoMotivoRetiro">

                  <option value="">Seleccionar Motivo</option>

                  <option value="DESVINCULACION">DESVINCULACION</option>

                  <option value="MORA EN APORTE">MORA EN APORTE</option>

                  <option value="RETIRO ESPECIAL">RETIRO ESPECIAL</option>

                  <option value="RETIRO AGREMIACION">RETIRO AGREMIACION</option>

                  <option value="DESVINCULACION">DESVINCULACION</option>

                  <option value="RETIRO ESPECIAL">RETIRO ESPECIAL</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA TEXTO ADICIONAL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-edit"></i></span>

                <textarea class="form-control input-lg" rows="5" name="nuevoTextoAdicional" placeholder="Ingresar texto adicional" id="nuevoTextoAdicional" required></textarea>

                <input type="hidden" name="idUsuario" value="<?php echo $_SESSION["id"]; ?>">


              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar retiro</button>
        
        </div>

        <?php

        $crearRetiro = new ControladorAfiliaciones();
        $crearRetiro -> ctrCrearRetiro();

        ?>

        </form>

    </div>

  </div>

</div>


<!--=====================================
MODAL ACTIVAR AFILIACION
======================================-->

<div id="modalActivarAfiliacion" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
      CABEZA MODAL
      ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Activar Afiliación</h4>
        
        </div>

        <!--=====================================
        CUERPO MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NUMERO DOCUMENTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-address-card"></i></span>

                <input type="text" class="form-control input-lg" id="numero_documento2" name="numero_documento2" value="" readonly>

                

              </div>

            </div>

            <!-- ENTRADA PARA FECHA ACTIVACION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaFechaActivacion" placeholder="Ingresar Fecha" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

                <input type="hidden" id="idAfiliacion2" name="idAfiliacion2" value="idAfiliacion2">

              </div>

            </div>

            <!-- ENTRADA PARA TARIFA -->

            <div class="form-group">

              <div class="input-group">

                      <span class="input-group-addon"><i class="fa fa-users"></i></span>

                      <select class="form-control" id="seleccionarTarifa" name="seleccionarTarifa" required>

                        <option value=""> Tarifa Afiliación</option>

                        <?php

                          $item = null;
                          $valor = null;

                          $tarifa = ControladorTarifaAfiliaciones::ctrMostrarTarifasAfiliaciones($item, $valor);

                          foreach ($tarifa as $key => $value){

                            echo '<option value="'.$value["tarifa"].'">'.$value["nombre"].'</option>';


                          }

                        ?>

                      </select>

                    </div>

            </div>

            <!-- ENTRADA PARA TEXTO ADICIONAL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-edit"></i></span>

                <textarea class="form-control input-lg" rows="5" name="nuevoTextoAdicional" placeholder="Ingresar texto adicional" id="nuevoTextoAdicional"></textarea>

                <input type="hidden" name="idUsuario" value="<?php echo $_SESSION["id"]; ?>">


              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Activar Afiliacion</button>
        
        </div>

        <?php

        $Activar = new ControladorAfiliaciones();
        $Activar -> ctrActivacion();

        ?>

        </form>

    </div>

  </div>

</div>

