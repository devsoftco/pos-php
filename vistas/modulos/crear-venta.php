<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Crear Venta

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
    
      <li class="active">Crear Venta</li>

    </ol>
  
  </section>


  <section class="content">

    <div class="row">

      <!--===========================================
      EL FORMULARIO
      ============================================-->


      <div class="col-lg-5 col-xs-12">

        <div class="box box-success">

          <div class="box-header whit-border"></div>

          <form role="form" metohd="post">

            <div class="box-body">

              <div class="box">

                <!--===========================================
                ENTRADA DEL VENDEDOR
                ============================================-->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-user"></i></span>

                    <input type="text" class="form-control" id="nuevoVendedor" name="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                    <input type="hidden" name="idVendedor" value="<?php echo $_SESSION[id]; ?>">

                  </div>
                
                </div>

                <!--===========================================
                ENTRADA CODIGO VENTA
                ============================================-->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-key"></i></span>

                    <input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="10002343" readonly>

                  </div>

                </div>

                <!--===========================================
                ENTRADA SELECCIONAR CLIENTE
                ============================================-->

                <div class="form-group">

                  <div class="input-group">

                    <span class="input-group-addon"><i class="fa fa-users"></i></span>

                    <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>

                    <option value="">Seleccionar cliente</option>

                    <?php

                      $item = null;
                      $valor = null;

                      $afiliados = ControladorAfiliados::ctrMostrarAfiliados($item, $valor);

                      foreach ($afiliados as $key => $value){

                        echo '<option value="'.$value["id"].'">'.$value["nombres"].'</option>';


                      }

                    ?>

                    </select>

                    <span class="input-group-addon"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar Cliente</button></span>


                  </div>

                </div>

                <!--===========================================
                ENTRADA AGREGAR PRODUCTO
                ============================================-->

                <div class="form-group row nuevoProducto">

                  <!-- Descripción del Producto -->

                  <div class="col-xs-6" style="padding-right:0px">

                    <div class="input-group">

                      <span class="input-group-addon"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button></span>

                      <input type="text" class="form-control" id="agregarProducto" name="agergarProducto" placeholder="Descripción del producto" required>
                    
                    </div>
                  
                  </div>

                  <!-- Cantidad del Producto -->

                  <div class="col-xs-3">
                  
                    <input type="number" class="form-control" id="nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" placeholder="0" required>

                  </div>

                  <!-- Precio del Producto -->

                  <div class="col-xs-3" style="padding-left:0px">

                    <div class="input-group">

                      <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                      <input type="number" min="1" class="form-control" id="nuevoPrecioProducto" name="nuevoPrecioProducto" placeholder="000000" readonly required>
                        
                    </div>
                  
                  </div>
                
                </div>

                <!--===========================================
                BOTON AGREGAR PRODUCTO
                ============================================-->

                <button type="button" class="btn btn-default hidden-lg">Agregar producto</button>

                <hr>

                <div class="row">

                  <!--===========================================
                  ENTRADA IMPUESTOS Y TOTAL
                  ============================================-->

                  <div class="col-xs-8 pull-right">

                    <table class="table">

                      <thead>

                        <tr>
                          <th>Impuestos</th>
                          <th>Total</th>
                                               
                        </tr>    
                      
                      </thead>

                      <tbody>

                        <tr>

                          <td style="width:50%">

                            <div class="input-group">

                              <input type="number" class="form-control" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" required>

                              <span class="input-group-addon"><i class="fa fa-percent"></i></span>
                            
                            </div>
                          
                          </td>

                          <td>

                            <div class="input-group">

                              <span class="input-group-addon"><i class="ion ion-social-usd"></i></span>

                              <input type="number" class="form-control" id="nuevoTotalVenta" name="nuevoTotalVenta" placeholder="00000" readonly required>

                            </div>
                          
                          </td>
                        
                        </tr>
                      
                      </tbody>
                       
                    </table>    
                  
                  </div>
                 
                </div>

                <hr>

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

                <br>

              </div>

            </div> 

            <div class="box-footer">
        
              <button type="submit" class="btn btn-primary pull-right">Guardar venta</button>
          
            </div>

          </form>
        
        </div>
      
      </div>

      <!--===========================================
      LA TABLA DE PRODUCTOS
      ============================================-->

      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">

        <div class="box box-warning">

          <div class="box-header with-border"></div>

          <div class="box-body">

            <table class="table table-bordered table-striped dt-responsive tablas">

              <thead>

                <tr>

                  <th style="width: 10px">#</th>
                  <th>Imagen</th>
                  <th>Código</th>
                  <th>Descripción</th>
                  <th>Stock</th>
                  <th>Acciones</th>
                
                </tr>
                           
              </thead>

              <tbody>

                <tr>

                  <td>1.</td>
                  <td><img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                  <td>00123</td>
                  <td>lllllll</td>
                  <td>20</td>
                  <td>

                    <div class="btn-group">

                      <button type="button" class="btn btn-primary">Agregar</button>
                    
                    </div>
                  
                  </td>
                       
                </tr>
              
              </tbody>
                        
            </table>
          
          </div>

        </div> 
      
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

    <form role="form" method="post">

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

                <option value="Pasaporte">PASAPORTE</option>

              </select>

            </div>

          </div>

          <!-- ENTRADA PARA EL DOCUMENTO ID -->

          <div class="form-group">

            <div class="input-group">

              <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="number" min="0" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Ingresar número documento" required>

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

                <option value="Quindio">QUINDIO</option>

                <option value="Calarca">CALARCA</option>

                <option value="Circasia">CIRCASIA</option>

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

      $crearCliente = new ControladorClientes();
      $crearCliente -> ctrCrearCliente();


    ?>

  </div>

</div>

</div>
