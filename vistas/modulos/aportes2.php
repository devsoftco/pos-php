<div class="content-wrapper">

<section class="content-header">

  <h1>

    Administrar Aportes

  </h1>

  <ol class="breadcrumb">

    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Administrar Aportes</li>

  </ol>
  
</section>

<section class="content">

  <div class="box">

    <div class="box-header with-border">
      
    </div>
    <div class="box-body">
      
      <table class="table table-bordered table-striped dt-responsive tablas">
        
      <thead>

        <tr>

          <th style="width:10px">#</th>
          <th>Afiliado</th>
          <th>Documento</th>
          <th>Total Facturado</th>
          <th>Estado</th>
          <th>Acciones</th>

        </tr>

      </thead>

        <tbody>

          <?php

          $item = null;
          $valor = null;

          $apo = ControladorAportes::ctrMostrarEstadoAportes($item, $valor);

          foreach ($apo as $key => $value){
            
            echo ' <tr>

            <td>'.($key+1).'</td>
            <td>'.$value["afiliado"].'</td>
            <td>'.$value["documento"].'</td>';

            
            echo '<td>'.$value["tarifa_ibc"].'</td>';

            if($value["estado_pago"] != 0){

              echo '<td><button class="btn btn-success btn-xs btnPagoAporte" idAfiliadoA="'.$value["afiliacion_id"].'" data-toggle="modal" data-target="#modalAgregarPagoAporte" >Pagar</button></td>';

            }else{

              echo '<td><button class="btn btn-danger btn-xs btnPagoAporte" idAfiliadoA="'.$value["afiliacion_id"].'" data-toggle="modal" data-target="#modalAgregarPagoAporte">Desactivado</button></td>';

            }
          
            echo '
            <td>

              <div class="btn-group">';

              if($value["estado_pago"] != 0){

                echo '<button class="btn btn-info btnEditarUsuario" idUsuario="'.$value["id"].'" ><i class="fa fa-print"></i></button>';

              }else{

                echo '<button class="btn btn-info btnEditarUsuario" idUsuario="'.$value["id"].'" disabled><i class="fa fa-print"></i></button>';

              }

                echo '<button class="btn btn-success btnEliminarUsuario" idUsuario="'.$value["id"].'"><i class="fa fa-search"></i></button>

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
MODAL AGREGAR PAGO APORTE
======================================-->

<div id="modalAgregarPagoAporte" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
      CABEZA MODAL
      ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Pago Aporte</h4>
        
        </div>

        <!--=====================================
        CUERPO MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL AFILIADO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" id="afiliado" name="afiliado" value="" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA DOCUMENTO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg" id="documento" name="documento" value="" readonly>

              </div>

            </div>

            <!-- ENTRADA TARIFA IBC -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control input-xs" id="tarifa_ibc" name="tarifa_ibc" value="" readonly>

              </div>

            </div>

            <!-- ENTRADA EPS -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control input-xs" id="tarifa_eps" name="tarifa_eps" value="" readonly>

              </div>

            </div>

            <!-- ENTRADA ARL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control input-xs" id="tarifa_arl" name="tarifa_arl" value="" readonly>

              </div>

            </div>

            <!-- ENTRADA AFP -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control input-xs" id="tarifa_afp" name="tarifa_afp" value="" readonly>

              </div>

            </div>

            <!-- ENTRADA CCF -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control input-xs" id="tarifa_ccf" name="tarifa_ccf" value="" readonly>

              </div>

            </div>

            <!-- ENTRADA TARIFA ADM -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control input-xs" id="tarifa_adm" name="tarifa_adm" value="" readonly>

              </div>

            </div>

            <!-- ENTRADA TARIFA CREE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                <input type="text" class="form-control input-xs" id="tarifa_cree" name="tarifa_cree" value="" readonly>

              </div>

            </div>

          </div>

                <!--===========================================
                  ENTRADA IMPUESTOS Y TOTAL
                  ============================================-->

                  <div class="col-xs-8 pull-right">

                    <table class="table">

                      <thead>

                        <tr>
                          <th>Total</th>
                                               
                        </tr>    
                      
                      </thead>

                      <tbody>

                        <tr>

                          <td>

                            <div class="input-group">

                              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                              <input type="text" class="form-control" id="total_pagar" name="total_pagar" value="" readonly>

                            </div>
                          
                          </td>
                        
                        </tr>
                      
                      </tbody>
                       
                    </table>    
                  
                </div>
        
                <!--===========================================
                ENTRADA METODO DE PAGO
                ============================================-->

                <div class="form-group row">

                  <div class="col-xs-6" style="padding-right:0px">

                    <div class="input-group">

                      <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                        
                        <option value="">Seleccione forma de pago</option>
                        <option value="efectivo">Efectivo</option>
                        <option value="tarjetaCredito">Tarjeta Crédito</option>
                        <option value="tarjetaDebito">Tarjeta Débito</option>

                      </select>

                    </div>
                    
                  </div>

                  <div class="col-xs-6" style="padding-left:0px">

                    <div class="input-group">

                      <input type="text" class="form-control" id="nuevoCodigoTransaccion" name="nuevoCodigoTransaccion" placeholder="Código transacción" required>

                      <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                    </div>

                  </div>



                </div>

        </div>

        <!--=====================================
        PIE MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar usuario</button>
        
        </div>

        </form>

    </div>

  </div>

</div>