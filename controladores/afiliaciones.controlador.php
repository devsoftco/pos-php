<?php

//use Mike42\Escpos\Printer;
//use Mike42\Escpos\EscposImage;
//use Mike42\Escpos\PrintConnectors\FilePrintConnector;
//use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class ControladorAfiliaciones{

    /*======================================
    CREAR AFILIACION
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

    /*======================================
    CREAR RETIRO
    ======================================*/

    static public function ctrCrearRetiro(){

        if(isset($_POST["idAfiliacion"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["idAfiliacion"])){       

                        $tabla = "estado_afiliaciones";

                        $datos = array("afiliaciones_id"=>strtoupper($_POST["idAfiliacion"]),
                                "fecha_retiro"=>$_POST["nuevaFechaRetiro"],
                                "motivo"=>$_POST["nuevoMotivoRetiro"],
                                "texto_adicional"=>strtoupper($_POST["nuevoTextoAdicional"]),
                                "usuarios_id"=>$_POST["idUsuario"]);

                                $respuesta = ModeloAfiliaciones::mdlIngresarRetiroAfiliacion($tabla, $datos);

                                if($respuesta == "ok"){

                                    echo '<script>

                                    swal({
                                        type: "success",
                                        title: "¡El retiro de afiliación ha sido guardado correctamente!",
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
                        window.location = "afiliaciones";
                    }

                });

                </script>';


            }



        }


    }

    /*======================================
    CREAR PAGO AFILIACIÓN
    ======================================*/

    static public function ctrCrearPagoAfiliacion(){

        if(isset($_POST["afiliacion_id"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["afiliacion_id"])){       

                        $tabla = "estado_afiliaciones";

                        $datos = array("afiliaciones_id"=>strtoupper($_POST["afiliacion_id"]),
                                "usuarios_id"=>$_POST["idUsuario"]);

                                $respuesta = ModeloAfiliaciones::mdlCrearPagoAfiliacion($tabla, $datos);

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

				                    //$printer -> text("Parqueadero G&S"."\n");//Nombre de la empresa

				                    //$printer -> text("NIT: 1.094.908.658"."\n");//Nit de la empresa

				                    //$printer -> text("Dirección: Calle 14 N° 18-14 Edificio Vulcano"."\n");//Dirección de la empresa

				                    //$printer -> text("Teléfono: 317 515 81 77 - 736 3554"."\n");//Teléfono de la empresa

                                    //$printer -> feed(1); //Alimentamos el papel 1 vez*/
                                    
                                    //$printer -> text("INGRESO"."\n");//Texto
                                    
                                    //$printer -> text("---------------------"."\n");//Nombre del cliente

                                    //$printer -> feed(1); //Alimentamos el papel 1 vez*/

				                    //$tablaVehiculo = "vehiculos";
				                    //$item = "placa";
				                    //$valor = $_POST["nuevaPlacaMoto"];

				                    //$traerPlaca = ModeloVehiculos::mdlMostrarVehiculo($tablaVehiculo, $item, $valor);

                                    //$printer -> text("Placa: ".$traerPlaca["placa"]."\n");//Placa

                                    //$printer -> text("Fecha: ".$traerPlaca["fecha"]."\n");//Placa

                                    //$printer -> text("Hora: ".$traerPlaca["hora_ingreso"]."\n");//Placa
                                    
                                    //$printer -> feed(1); //Alimentamos el papel 1 vez*/

                                    //$printer -> text("R E G L A M E N T O"."\n");//Titulo

                                    //$printer -> text("-------------------"."\n");//Titulo

                                    //$printer->setJustification(Printer::JUSTIFY_LEFT);
                                    
                                    //$printer -> text("1.- No se responderá por objetos de valor al "."\n");//1
                                    //$printer -> text(" interior del vehículo."."\n");//Titulo

                                    //$printer -> text("2.- Toda motocicleta deberá quedar sin seguro."."\n");//2

                                    //$printer -> text("3.- Efectuar cualquier reclamación antes de "."\n");//3
                                    //$printer -> text(" retirar su vehículo."."\n");//Titulo

                                    //$printer -> text("4.- El no retiro del vehículo antes de la "."\n");//4
                                    //$printer -> text(" hora del cierre, se cobrará tarifa nocturna ."."\n");//Titulo
                                    //$printer -> text(" de $15.000.-"."\n");//Titulo

                                    //$printer -> text("5.- Conserve su recibo, el vehículo será "."\n");//5
                                    //$printer -> text(" entregado al portador de este.  En caso de"."\n");//Titulo
                                    //$printer -> text(" pérdida presentar la documentación del vehículo"."\n");//Titulo
                                    //$printer -> text(" y la cancelación de $7.000.- (siete mil pesos)."."\n");//Titulo

                                    //$printer -> text("6.- A los usuarios de motocicletas no se  "."\n");//6
                                    //$printer -> text(" responderá por objetos que no sean entregados "."\n");//Titulo
                                    //$printer -> text(" en caseta. "."\n");//Titulo

                                    //$printer -> text("7.- No se responderá en caso de daños causados"."\n");//7
                                    //$printer -> text(" por terremotos, incendios, desastres naturales,"."\n");//Titulo
                                    //$printer -> text(" motin y otros de fuerza mayor."."\n");//Titulo

                                    //$printer -> text("8.- Póliza de responsabilidad civil N° 1007888"."\n");//8
                                    //$printer -> text(" La Previsora S.A. Compañía de seguros."."\n");//Titulo

                                    //$printer -> text("9.- El parqueadero cuenta con Circuito Cerrado"."\n");//9
                                    //$printer -> text(" de Televisión."."\n");//Titulo
                                    

				                    //$printer -> feed(1); //Alimentamos el papel 1 vez*/			

				                    //$printer -> feed(1); //Alimentamos el papel 1 vez*/	

				                    //$printer->text("Recuerde Cancelar antes de Retirar su Vehículo"); //Podemos poner también un pie de página

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

    /*======================================
    CREAR ACTIVACION
    ======================================*/

    static public function ctrActivacion(){

        if(isset($_POST["idAfiliacion2"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["idAfiliacion2"])){       

                        $tabla = "estado_afiliaciones";

                        $datos = array("afiliaciones_id"=>strtoupper($_POST["idAfiliacion2"]),
                                "fecha_afiliacion"=>$_POST["nuevaFechaActivacion"],
                                "tarifa"=>$_POST["seleccionarTarifa"],
                                "texto_adicional"=>strtoupper($_POST["nuevoTextoAdicional"]),
                                "usuarios_id"=>$_POST["idUsuario"]);

                                $respuesta = ModeloAfiliaciones::mdlIngresarActivacion($tabla, $datos);

                                if($respuesta == "ok"){

                                    echo '<script>

                                    swal({
                                        type: "success",
                                        title: "¡La afiliación ha sido activada correctamente!",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar",
                                        closeModal: false

                                        }).then((result)=>{

                                                    if(result.value){
                                                    window.location = "aportes-afiliacion";
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
                        window.location = "afiliaciones";
                    }

                });

                </script>';


            }



        }


    }

    /*=============================================
	MOSTRAR AFILIACIONES
	=============================================*/

	static public function ctrMostrarAfiliaciones($itemAfiliaciones, $valorAfiliaciones) {

		$tabla = "afiliaciones";
		$respuesta = ModeloAfiliaciones::MdlMostrarAfiliaciones($tabla, $itemAfiliaciones, $valorAfiliaciones);

		return $respuesta;

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

                /*=============================================
                VALIDAR PDF
                =============================================*/

                $ruta = $_POST["actualPdf"];

                if(isset($_FILES['editarPdf']['name']) && !empty($_FILES['editarPdf']['name'])){
    
                    /*=============================================
                    CREAR DIRECTORIO GUARDAR PDF AFILIADO
                    =============================================*/

                    $directorio = "vistas/img/afiliados/".$_POST["editarDocumentoId"];

                    /*=============================================
                    PRIMERO PREGUNTAMOS SI EXISTE PDF EN LA BD
                    =============================================*/

                    if(!empty($_POST["actualPdf"])){

                        unlink($_POST["actualPdf"]);

                    }else{

                        mkdir($directorio, 0755);

                    }

                    /*=============================================
                    GUARDAMOS EL ARCHIVO EN EL DIRECTORIO
                    =============================================*/

                    if($_FILES["editarPdf"]["type"] == "application/pdf"){

                        $aleatorio = mt_rand(100,999);

                        $ruta = "vistas/img/afiliados/".$_POST["editarDocumentoId"]."/".$aleatorio.".pdf";
    
                        move_uploaded_file($_FILES['editarPdf']['tmp_name'],$ruta);

                        }


                }

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

	static public function ctrMostrarCantidadAfiliaciones() {

		$tabla = "afiliaciones";
		$respuesta = ModeloAfiliaciones::MdlCantidadAfiliaciones($tabla);

		return $respuesta;

    }

    /*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function ctrRangoFechasAfiliaciones($fechaInicial, $fechaFinal){

		$tabla = "estado_afiliaciones";

		$respuesta = ModeloAfiliaciones::mdlRangoFechasAfiliaciones($tabla, $fechaInicial, $fechaFinal);

		return $respuesta;
		
    }
    
    /*=============================================
	MOSTRAR CANTIDAD DE AFILIADOS POR EPS
	=============================================*/

	static public function ctrMostrarAfiliacionesPorEps($item, $valor) {

		$tabla = "afiliaciones";
		$respuesta = ModeloAfiliaciones::MdlMostrarAfiliacionesPorEps($tabla, $item, $valor);

		return $respuesta;

    }


}
