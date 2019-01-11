<?php
//use Mike42\Escpos\Printer;
//use Mike42\Escpos\EscposImage;
//use Mike42\Escpos\PrintConnectors\FilePrintConnector;
//use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
 

class ControladorAportes{

    /*======================================
    CREAR PAGO AFILIACION
    ======================================*/

    static public function ctrCrearAfiliacion(){

        if(isset($_POST["verId"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["verId"])){       

                        $tabla = "afiliaciones";

                        $datos = array("afiliado_id"=>strtoupper($_POST["verId"]),
                                "profesion"=>strtoupper($_POST["nuevaProfesion"]),
                                "tipo_riesgo"=>$_POST["nuevoTipoArl"],
                                "eps_id"=>strtoupper($_POST["nuevaEps"]),
                                "arl_id"=>$_POST["nuevaArl"],
                                "afp_id"=>$_POST["nuevaAfp"],
                                "empresa_afi_id"=>strtoupper($_POST["nuevaEmpAso"]),
                                "empresa_apo_id"=>strtoupper($_POST["nuevaEmpresaAp"]),
                                "usuario_id"=>$_POST["idUsuario"]);

                                $respuesta = ModeloAfiliaciones::mdlIngresarAfiliacion($tabla, $datos);

                                if($respuesta == "ok"){

                                    echo '<script>

                                    swal({
                                        type: "success",
                                        title: "¡La afiliación ha sido guardado correctamente!",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar",
                                        closeModal: false

                                        }).then((result)=>{

                                                    if(result.value){
                                                    window.location = "afiliaciones";
                                                    }

                                            });

                                    </script>';
                                }

            }else{

                echo '<script>

                swal({
                    type: "error",
                    title: "¡El afiliado no puede estar vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeModal: false

                }).then((result)=>{

                    if(result.value){
                        window.location = "afiliados";
                    }

                });

                </script>';


            }



        }


    }

   

    /*=============================================
	MOSTRAR ESTADO PAGO AFILIACIONES
	=============================================*/

	static public function ctrMostrarEstadoAfi($item, $valor) {

		$tabla = "estado_afiliaciones";
		$respuesta = ModeloAportes::MdlMostrarEstadoAfi($tabla, $item, $valor);

		return $respuesta;

    }

    /*=============================================
	MOSTRAR ESTADO PAGO APORTES TOTAL 
	=============================================*/

	static public function ctrMostrarEstadoAportes($item, $valor) {

		$tabla = "estado_afiliaciones";
		$respuesta = ModeloAportes::MdlMostrarEstadoAportes($tabla, $item, $valor);

		return $respuesta;

    }

    /*=============================================
	MOSTRAR ESTADO APORTES POR PAGAR
	=============================================*/

	static public function ctrMostrarAportesPorPagar($item, $valor) {

		$tabla = "estado_afiliaciones";
		$respuesta = ModeloAportes::MdlMostrarEstadoAportes($tabla, $item, $valor);

		return $respuesta;

    }

    /*======================================
    CREAR PAGO APORTE
    ======================================*/

    static public function ctrCrearAporte(){

        if(isset($_POST["documento"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["documento"])){       

                        $tabla = "aportes";

                        $datos = array("afiliaciones_id"=>strtoupper($_POST["afiliacion_id"]),
                                "periodo"=>strtoupper($_POST["periodo"]),
                                "dias"=>strtoupper($_POST["dias"]),
                                "arl_tarifas_id"=>strtoupper($_POST["arl_tarifas_id"]),
                                "arl_id"=>strtoupper($_POST["arl_id"]),
                                "tarifa_arl"=>strtoupper($_POST["tarifa_arl"]),
                                "tarifa_por_dia_arl"=>strtoupper($_POST["tarifa_por_dia_arl"]),
                                "eps_id"=>strtoupper($_POST["eps_id"]),
                                "tarifa_eps"=>strtoupper($_POST["tarifa_eps"]),
                                "tarifa_por_dia_eps"=>strtoupper($_POST["tarifa_por_dia_eps"]),
                                "afp_id"=>strtoupper($_POST["afp_id"]),
                                "tarifa_afp"=>strtoupper($_POST["tarifa_afp"]),
                                "tarifa_por_dia_afp"=>strtoupper($_POST["tarifa_por_dia_afp"]),
                                "caja_compensaciones_id"=>strtoupper($_POST["caja_compensaciones_id"]),
                                "tarifa_ccf"=>strtoupper($_POST["tarifa_ccf"]),
                                "tarifa_por_dia_ccf"=>strtoupper($_POST["tarifa_por_dia_ccf"]),
                                "tarifa_administracion"=>strtoupper($_POST["tarifa_adm"]),
                                "tarifa_cree"=>strtoupper($_POST["tarifa_cree"]),
                                "tarifa_ibc"=>strtoupper($_POST["tarifa_ibc"]),
                                "total_pagado"=>strtoupper($_POST["total_pagar"]),
                                "metodo_pago"=>strtoupper($_POST["nuevoMetodoPago"]),
                                "comprobante"=>strtoupper($_POST["nuevoNumeroComprobante"]),
                                "usuarios_id"=>$_POST["idUsuario"]);

                                $respuesta = ModeloAportes::mdlIngresarAporte($tabla, $datos);

                                if($respuesta == "ok"){

                                    //$impresora = "epson";

				                    //$conector = new WindowsPrintConnector($impresora);

				                    //$imprimir = new Printer($conector);

				                    //$imprimir -> text("Hola Mundo"."\n");

				                    //$imprimir -> cut();

                                    //$imprimir -> close();
                                    
                                    //$impresora = "epson";

				                    //$conector = new WindowsPrintConnector($impresora);

				                    //$printer = new Printer($conector);

				                    //$printer -> setJustification(Printer::JUSTIFY_CENTER);

				                    //$printer -> text(date("Y-m-d H:i:s")."\n");//Fecha de la factura

                                    //$printer -> feed(1); //Alimentamos el papel 1 vez*/

                                    //$printer -> text("Asesorias y Trámites en "."\n");//Nombre de la empresa
                                    
                                    //$printer -> text("Seguridad Social "."\n");//Nombre de la empresa

                                    //$printer -> feed(2); //Alimentamos el papel 1 vez*/

                                    //$printer -> text("Elizabeth Gómez Ramirez"."\n");//Nit de la empresa

				                    //$printer -> text("NIT: 1.094.908.658"."\n");//Nit de la empresa

				                    //$printer -> text("Email: recursosinima@outlook.com"."\n");//Dirección de la empresa

				                    //$printer -> text("Teléfono: 310 371 8797"."\n");//Teléfono de la empresa

                                    //$printer -> feed(1); //Alimentamos el papel 1 vez*/
                                    
                                    //$printer -> text("--------------------------"."\n");//Nombre del cliente

                                    //$printer -> feed(1); //Alimentamos el papel 1 vez*/

				                    //$tabla = "estado_afiliaciones";
				                    //$item = "id";
				                    //$valor = $_POST["afiliacion_id"];

                                    //$traerAporte = ModeloAportes::MdlMostrarEstadoAportes($tabla, $item, $valor);
                                    
                                    //$printer -> setJustification(Printer::JUSTIFY_LEFT);

                                    //$printer -> text("Afiliado: ".$traerAporte["afiliado"]."\n");//Afiliado

                                    //$printer -> text("Documento: ".$traerAporte["documento"]."\n");//Documento

                                    //$printer -> text("N° Comprobante: ".$traerAporte["aporte_id"]."\n");//Documento

                                    //$printer -> text("Fecha Pago: ".date("d/m/Y", strtotime($traerAporte["fecha_pago"]))."\n");//Documento

                                    //$printer -> setJustification(Printer::JUSTIFY_CENTER);
                                    
                                    //$printer -> feed(1); //Alimentamos el papel 1 vez*/

                                    //$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);

                                    //$printer -> text("S E R V I C I O S"."\n");//Titulo

                                    //$printer -> text("-------------------"."\n");//Titulo

                                    //$printer -> selectPrintMode();

                                    //$printer->setJustification(Printer::JUSTIFY_LEFT);
                                    
                                    //$printer -> text("EPS: ".$traerAporte["eps"]."\n");//Eps

                                    //$printer -> text("ARL: ".$traerAporte["arl"]. " ".$traerAporte["tipo_arl"]."\n");//Placa

                                    //$printer -> text("AFP: ".$traerAporte["afp"]."\n");//Afp

                                    //$printer -> text("CCF: ".$traerAporte["ccf"]."\n");//CCF

                                    //$printer->setJustification(Printer::JUSTIFY_RIGHT);

                                    //$printer -> setEmphasis(true);

                                    //$printer->text("--------\n");

                                    //$printer->text("TOTAL: $ ".$traerAporte["total_pagado"]."\n"); //ahora va el total
                                    
                                    //$printer -> setEmphasis(false);

                                    //$printer -> feed(1); //Alimentamos el papel 1 vez*/	
                                    
                                    //$printer->setJustification(Printer::JUSTIFY_CENTER);
                                    
                                    //$printer -> text("Periodo Cancelado: ".$_POST["periodo"]."\n");//CCF
                                    //$printer -> text("Forma de Pago: ".$traerAporte["metodo_pago"]."\n");//CCF

                                    //$printer -> feed(1); //Alimentamos el papel 1 vez*/	
                                    
                                    //$printer->setJustification(Printer::JUSTIFY_CENTER);

                                    //$printer -> setEmphasis(true);

                                    //$printer -> text("Estimado Afiliado:"."\n");//Titulo

                                    //$printer -> text("-------------------"."\n");//Titulo

                                    //$printer->setJustification(Printer::JUSTIFY_LEFT);

                                    //$printer->text("El pago de los aportes deberá realizarce del "."\n"); //Podemos poner también un pie de página
                                    
                                    //$printer->text(" 28 al tercer día hábil de cada mes.  De no"."\n"); //Podemos poner también un pie de página
                                   
                                    //$printer->text(" realizarse el pago, quedará sujeto al no"."\n"); //Podemos poner también un pie de página

                                    //$printer->text(" reconocimiento de incapacidades por parte de"."\n"); //Podemos poner también un pie de página

                                    //$printer->text(" las Administradoras del sistema.   "."\n"); //Podemos poner también un pie de página

                                    //$printer->setJustification(Printer::JUSTIFY_CENTER);

                                    //$printer->text("Art. 21 Decreto 1804 de 1999"."\n"); //Podemos poner también un pie de página

                                    //$printer -> setEmphasis(false);

                                    //$printer -> feed(2); //Alimentamos el papel 2 veces*/

                                    //$printer -> setEmphasis(true);

                                    //$printer->text("--Válido como comprobante de Pago-- "."\n"); //Podemos poner también un pie de página
                                    
                                    //$printer -> setEmphasis(false);

                                    //$printer -> feed(3); //Alimentamos el papel 3 veces*/

				                    //$printer -> cut(); //Cortamos el papel, si la impresora tiene la opción

				                    //$printer -> pulse(); //Por medio de la impresora mandamos un pulso, es útil cuando hay cajón moneder

				                    //$printer -> close();



                                    echo '<script>

                                    swal({
                                        type: "success",
                                        title: "¡Pago aporte guardado correctamente!",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar",
                                        closeModal: false

                                        }).then((result)=>{

                                                    if(result.value){
                                                    window.location = "aportes";
                                                    }

                                            });

                                    </script>';
                                }

            }else{

                echo '<script>

                swal({
                    type: "error",
                    title: "¡El aporte no puede estar vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeModal: false

                }).then((result)=>{

                    if(result.value){
                        window.location = "aportes";
                    }

                });

                </script>';


            }



        }


    }

    
    /*=============================================
	EDITAR AFILIADOS
    =============================================*/
    
    static public function ctrEditarAfiliado(){

        if(isset($_POST["editarNombres"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombres"]) &&
                //preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["editarApellidoP"]) &&
                //preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["editarApellidoM"]) &&
                //preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarDocumentoId"]) &&
                //preg_match('/^[0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4} $/', $_POST["editarEmail"]) &&
                //preg_match('/^[()\-0-9 ]+$/', $_POST["editarCelular"]) &&
                //preg_match('/^[-0-9 ]+$/', $_POST["editarFijo"]) &&
                //preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaDireccion"]) &&
                preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["editarBarrio"])){


                    $tabla = "afiliados";

                    $datos = array("nombres"=>strtoupper($_POST["editarNombres"]),
                    "apellido_paterno"=>strtoupper($_POST["editarApellidoP"]),
                    "apellido_materno"=>strtoupper($_POST["editarApellidoM"]),
                    "tipo_documento"=>$_POST["editarTipoDocumento"],
                    "numero_documento"=>$_POST["editarDocumentoId"],
                    "email"=>strtoupper($_POST["editarEmail"]),
                    "celular"=>$_POST["editarCelular"],
                    "telefono"=>$_POST["editarFijo"],
                    "direccion"=>strtoupper($_POST["editarDireccion"]),
                    "barrio"=>strtoupper($_POST["editarBarrio"]),
                    "departamento"=>$_POST["editarDepartamento"],
                    "fecha_nacimiento"=>$_POST["editarFechaNacimiento"],
                    "cedula"=>$ruta);

                    $respuesta = ModeloAfiliados::mdlEditarAfiliado($tabla, $datos);

                    if($respuesta == "ok"){

                        echo'<script>
    
                        swal({
                              type: "success",
                              title: "El usuario ha sido editado correctamente",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result){
                                        if (result.value) {
    
                                        window.location = "afiliados";
    
                                        }
                                    })
    
                        </script>';
    
                    }


                }else{

                    echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "afiliados";

							}
						})

			  	</script>';

                }

            
        }
    }



    /*=============================================
	BORRAR AFILIADO
	=============================================*/

	static public function ctrBorrarAfiliado(){

		if(isset($_GET["idAfiliado"])){

			$tabla ="afiliados";
			$datos = $_GET["idAfiliado"];

			if($_GET["cedula"] != ""){

				unlink($_GET["cedula"]);
				rmdir('vistas/img/afiliados/'.$_GET["numero_documento"]);

			}

			$respuesta = ModeloAfiliados::mdlBorrarAfiliado($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El afiliado ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then(function(result){
									if (result.value) {

									window.location = "afiliados";

									}
								})

					</script>';

				}

		}

    }
    
    /*=============================================
	CANTIDAD TOTAL DE AFILIACIONES ACTIVAS
	=============================================*/

	static public function ctrMostrarCantidadAfiliacionesMes() {

		$tabla = "afiliaciones";
		$respuesta = ModeloAportes::MdlCantidadAfiliacionesMes($tabla);

		return $respuesta;

    }

    /*=============================================
	CANTIDAD AFILIADOS POR PAGAR MES ACTUAL
	=============================================*/

	static public function ctrMostrarCantidadAportesPorPagar() {

		$tabla = "afiliaciones";
		$respuesta = ModeloAportes::MdlCantidadAportesPorPagar($tabla);

		return $respuesta;

    }


}
