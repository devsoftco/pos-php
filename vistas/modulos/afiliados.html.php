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
            <th>Apellido P</th>
            <th>Apellido M</th>
            <th>Tipo Documento ID</th>
            <th>Documento ID</th>
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

          <tr>

            <td>1</td>
            <td>María Julia</td>
            <td>Mercedes</td>
            <td>Soza</td>
            <td>CC</td>
            <td>1111111</td>
            <td>maria@gmail.com</td>
            <td>3179999999</td>
            <td>99999999</td>
            <td>carrera 40</td>
            <td>Villa Liliana</td>
            <td>Quindio</td>
            <td>1978-22-06</td>
            <td>imagen</td>
            <td>34</td>
            <td>2018-03-08 12:07:45</td>
            <td>2016-09-07 10:45:23</td>
            <td>
              <div class="btn-group">

                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

              </div>

            </td>

          </tr>

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

                <select class="form-control input-lg" name="nuevoPerfil">

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

                <p class="help-block">Peso máximo del archivo 2 MB</p>

                <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px" >

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

    </div>

  </div>

</div>