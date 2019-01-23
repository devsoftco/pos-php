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
          <th>EPS</th>
          <th>ARL</th>
          <th>Tipo ARL</th>
          <th>CCF</th>
          <th>AFP</th>
          <th>Estado</th>

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
            <td>'.$value["documento"].'</td>
            <td>'.$value["eps"].'</td>
            <td>'.$value["arl"].'</td>
            <td>'.$value["tipo_arl"].'</td>
            <td>'.$value["ccf"].'</td>
            <td>'.$value["afp"].'</td>
            ';
            
            

            if($value["pago_aporte"] != 0 && $value["aporte_id"] != 0){

              echo '<td><button class="btn btn-success btn-xs" disabled>Pagado</button></td>';

            }else{

              echo '<td><button class="btn btn-danger btn-xs btnPagoAporte" idAfiliadoA="'.$value["afiliacion_id"].'" data-toggle="modal" data-target="#modalAgregarPagoAporte">Pagar</button></td>';

            }

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

                <input type="hidden" name="periodo" id="periodo">
                <input type="hidden" name="dias" id="dias">
                <input type="hidden" name="arl_id" id="arl_id">
                <input type="hidden" name="arl_tarifas_id" id="arl_tarifas_id">
                <input type="hidden" name="tarifa_arl" id="tarifa_arl">
                <input type="hidden" name="tarifa_por_dia_arl" id="tarifa_por_dia_arl">
                <input type="hidden" name="eps_id" id="eps_id">
                <input type="hidden" name="tarifa_eps" id="tarifa_eps">
                <input type="hidden" name="tarifa_por_dia_eps" id="tarifa_por_dia_eps">
                <input type="hidden" name="afp_id" id="afp_id">
                <input type="hidden" name="tarifa_afp" id="tarifa_afp">
                <input type="hidden" name="tarifa_por_dia_afp" id="tarifa_por_dia_afp">
                <input type="hidden" name="caja_compensaciones_id" id="caja_compensaciones_id">
                <input type="hidden" name="tarifa_ccf" id="tarifa_ccf">
                <input type="hidden" name="tarifa_por_dia_ccf" id="tarifa_por_dia_ccf">
                <input type="hidden" name="tarifa_adm" id="tarifa_adm">
                <input type="hidden" name="tarifa_cree" id="tarifa_cree">
                <input type="hidden" name="tarifa_ibc" id="tarifa_ibc">
                
                <input type="hidden" name="afiliacion_id" id="afiliacion_id">

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

                              <input type="text" class="form-control input-lg" id="total_pagar" name="total_pagar" value="" readonly>
                              <input type="hidden" name="idUsuario" value="<?php echo $_SESSION[id]; ?>">

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
                        <option value="EFECTIVO">Efectivo</option>
                        <option value="CONSIGNACION">Consignación</option>
                        <option value="TRANSFERENCIA">Transferencia</option>

                      </select>

                    </div>
                    
                  </div>

                  <div class="col-xs-6" style="padding-left:0px">

                    <div class="input-group">

                      <input type="text" class="form-control" id="nuevoNumeroComprobante" name="nuevoNumeroComprobante" placeholder="Código transacción">

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

        <?php

            $agregarPago = new ControladorAportes();
            $agregarPago -> ctrCrearAporte();


        ?>

    </div>

  </div>

</div>