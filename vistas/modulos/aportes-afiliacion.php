<div class="content-wrapper">

<section class="content-header">

  <h1>

    Administrar Pago Aportes Afiliación

  </h1>

  <ol class="breadcrumb">

    <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
    <li class="active">Administrar Pago Aportes Afiliación</li>

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
          <th>Fecha Afiliación</th>
          <th>Tarifa</th>
          <th>Estado</th>
          <th>Acciones</th>

        </tr>

      </thead>

        <tbody>

          <?php

          $item = null;
          $valor = null;

          $afi = ControladorAportes::ctrMostrarEstadoAfi($item, $valor);

          foreach ($afi as $key => $value){
            
            echo ' <tr>

            <td>'.($key+1).'</td>
            <td>'.$value["afiliado"].'</td>
            <td>'.$value["documento"].'</td>
            <td>'.$value["fecha_afiliacion"].'</td>
            <td>$'.$english_format_number = number_format($value["tarifa"],0,".",".").'</td>';

            if($value["estado_pago"] != 0){

              echo '<td><button class="btn btn-success btn-xs btnActivarPagoAfi" idAfiliacion="'.$value["id"].'" >Pagado</button></td>';

            }else{

              echo '<td><button class="btn btn-danger btn-xs btnActivarPagoAfi" idAfiliacion="'.$value["id"].'" data-toggle="modal" data-target="#modalPagoAfiliacion">Pagar</button></td>';

            }

            echo '
            <td>

              <div class="btn-group">';

              if($value["estado_pago"] != 0){

                echo '<button class="btn btn-info btnImprimirFacturaAfi" idPagoAfi="'.$value["id"].'" ><i class="fa fa-print"></i></button>';

              }else{

                echo '<button class="btn btn-info btnImprimirFacturaAfi" idPagoAfi="'.$value["id"].'" disabled><i class="fa fa-print"></i></button>';

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
MODAL AGREGAR PAGO AFILIACION
======================================-->

<div id="modalPagoAfiliacion" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

      <!--=====================================
      CABEZA MODAL
      ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Pago Afiliación</h4>
        
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



                    </div>
                    
                  </div>

                  <div class="col-xs-6" style="padding-left:0px">

                    <div class="input-group">


                    </div>

                  </div>



                </div>

        </div>

        <!--=====================================
        PIE MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Pago</button>
        
        </div>

        </form>

        <?php

            $agregarPago = new ControladorAfiliaciones();
            $agregarPago -> ctrCrearPagoAfiliacion();


        ?>

    </div>

  </div>

</div>