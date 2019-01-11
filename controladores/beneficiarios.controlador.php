<?php

class ControladorBeneficiarios{

    /*======================================
    CREAR BENEFICIARIO
    ======================================*/

    static public function ctrCrearBeneficiario(){

        if(isset($_POST["nuevoDocumentoIdBen"])){

            if(
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoDocumentoIdBen"])
            ){

                /*=============================================
                VALIDAR PDF CEDULA BENEFICIARIO
                =============================================*/

                $rutaCed = "";

                if(isset($_FILES['cedulaPdfBen']['name'])){
                    
                    /*=============================================
					CREAR DIRECTORIO GUARDAR PDF BENEFICIARIO
					=============================================*/
 
                    $directorio = "vistas/img/beneficiarios/cedulas/".$_POST["nuevoDocumentoIdBen"];
 
                    mkdir($directorio, 0755);

                    if($_FILES["cedulaPdfBen"]["type"] == "application/pdf"){

                        /*=============================================
					    GUARDAMOS EL ARCHIVO EN EL DIRECTORIO
                        =============================================*/
    
                        $aleatorio = mt_rand(100,999);
                
                        $rutaCed = "vistas/img/beneficiarios/cedulas/".$_POST["nuevoDocumentoIdBen"]."/".$aleatorio.".pdf";
                    
	                    move_uploaded_file($_FILES['cedulaPdfBen']['tmp_name'],$rutaCed);
    
                        }
                }

                /*=============================================
                VALIDAR PDF DOCUMENTOS BENEFICIARIOS
                =============================================*/

                $rutaDoc = "";

                if(isset($_FILES['documentosPdfBen']['name'])){
    
                    /*=============================================
                    CREAR DIRECTORIO GUARDAR PDF BENEFICIARIO
                    =============================================*/

                    $directorio = "vistas/img/beneficiarios/documentos/".$_POST["nuevoDocumentoIdBen"];

                    mkdir($directorio, 0755);

                    if($_FILES["documentosPdfBen"]["type"] == "application/pdf"){

                        /*=============================================
                        GUARDAMOS EL ARCHIVO EN EL DIRECTORIO
                        =============================================*/

                        $aleatorio = mt_rand(100,999);

                        $rutaDoc = "vistas/img/beneficiarios/documentos/".$_POST["nuevoDocumentoIdBen"]."/".$aleatorio.".pdf";
    
                        move_uploaded_file($_FILES['documentosPdfBen']['tmp_name'],$rutaDoc);

                        }
                }
                
                        $tabla = "beneficiarios";

                        $datos = array("nombres"=>strtoupper($_POST["nuevoNombresBen"]),
                                "apellido_paterno"=>strtoupper($_POST["nuevoApellidoPBen"]),
                                "apellido_materno"=>strtoupper($_POST["nuevoApellidoMBen"]),
                                "parentesco"=>strtoupper($_POST["nuevoTipoParentescoBen"]),
                                "tipo_documento"=>$_POST["nuevoTipoDocumentoBen"],
                                "numero_documento"=>$_POST["nuevoDocumentoIdBen"],
                                "cedula"=>$rutaCed,
                                "documentos"=>$rutaDoc,
                                "afiliado_id"=>$_POST["id"]);

                                $respuesta = ModeloBeneficiarios::mdlIngresarBeneficiario($tabla, $datos);

                                if($respuesta == "ok"){

                                    echo '<script>

                                    swal({
                                        type: "success",
                                        title: "¡El afiliado ha sido guardado correctamente!",
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
	MOSTRAR BENEFICIARIOS
	=============================================*/

	static public function ctrMostrarBeneficiarios($item, $valor) {

		$tabla = "beneficiarios";
		$respuesta = ModeloBeneficiarios::MdlMostrarBeneficiarios($tabla, $item, $valor);

		return $respuesta;

    }

    /*=============================================
	AGREGAR ID AFILIADO
	=============================================*/

	static public function ctrMostrarIdAfiliado($item, $valor) {

		$tabla = "afiliados";
		$respuesta = ModeloBeneficiarios::MdlMostrarIdAfiliado($tabla, $item, $valor);

		return $respuesta;

    }
    
    /*=============================================
	EDITAR BENEFICIARIO
    =============================================*/
    
    static public function ctrEditarBeneficiario(){

        if(isset($_POST["editarNombres"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombres"])
                //preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["editarApellidoP"]) &&
                //preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["editarApellidoM"]) &&
                //preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarDocumentoId"]) &&
                ){

                /*=============================================
                VALIDAR PDF
                =============================================*/

                $ruta = $_POST["cedActualPdf"];

                if(isset($_FILES["editarCed"]["name"]) && !empty($_FILES["editarCed"]["name"])){
    
                    /*=============================================
                    CREAR DIRECTORIO GUARDAR PDF AFILIADO
                    =============================================*/

                    $directorio = "vistas/img/beneficiarios/cedulas/".$_POST["editarDocumentoId"];

                    /*=============================================
                    PRIMERO PREGUNTAMOS SI EXISTE PDF EN LA BD
                    =============================================*/

                    if(!empty($_POST["cedActualPdf"])){

                        unlink($_POST["cedActualPdf"]);

                    }else{

                        mkdir($directorio, 0755);

                    }

                    /*=============================================
                    GUARDAMOS EL ARCHIVO EN EL DIRECTORIO
                    =============================================*/

                    if($_FILES["editarCed"]["type"] == "application/pdf"){

                        $aleatorio = mt_rand(100,999);

                        $ruta = "vistas/img/beneficiarios/cedulas/".$_POST["editarDocumentoId"]."/".$aleatorio.".pdf";
    
                        move_uploaded_file($_FILES["editarCed"]["tmp_name"],$ruta);

                        }


                }

                /*=============================================
                VALIDAR PDF
                =============================================*/

                $rutaDoc = $_POST["docActualPdf"];

                if(isset($_FILES["editarDoc"]["name"]) && !empty($_FILES["editarDoc"]["name"])){

                    /*=============================================
                    CREAR DIRECTORIO GUARDAR PDF AFILIADO
                    =============================================*/

                    $directorio = "vistas/img/beneficiarios/cedulas/".$_POST["editarDocumentoId"];

                    /*=============================================
                    PRIMERO PREGUNTAMOS SI EXISTE PDF EN LA BD
                    =============================================*/

                    if(!empty($_POST["docActualPdf"])){

                        unlink($_POST["docActualPdf"]);

                    }else{

                        mkdir($directorio, 0755);

                    }

                    /*=============================================
                    GUARDAMOS EL ARCHIVO EN EL DIRECTORIO
                    =============================================*/

                    if($_FILES["editarDoc"]["type"] == "application/pdf"){

                        $aleatorio = mt_rand(100,999);

                        $rutaDoc = "vistas/img/beneficiarios/cedulas/".$_POST["editarDocumentoId"]."/".$aleatorio.".pdf";

                        move_uploaded_file($_FILES["editarDoc"]["tmp_name"],$rutaDoc);

                    }


                }


                    $tabla = "beneficiarios";

                    $datos = array("nombres"=>strtoupper($_POST["editarNombres"]),
                                "apellido_paterno"=>strtoupper($_POST["editarApellidoP"]),
                                "apellido_materno"=>strtoupper($_POST["editarApellidoM"]),
                                "parentesco"=>strtoupper($_POST["editarTipoParentesco"]),
                                "tipo_documento"=>$_POST["editarTipoDocumento"],
                                "numero_documento"=>$_POST["editarDocumentoId"],
                                "cedula"=>$ruta,
                                "documentos"=>$rutaDoc);

                    $respuesta = ModeloBeneficiarios::mdlEditarBeneficiario($tabla, $datos);

                    if($respuesta == "ok"){

                        echo'<script>
    
                        swal({
                              type: "success",
                              title: "El beneficiario ha sido editado correctamente",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result){
                                        if (result.value) {
    
                                        window.location = "beneficiarios";
    
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

							window.location = "beneficiarios";

							}
						})

			  	</script>';

                }

            
        }
    }

    /*=============================================
	BORRAR BENEFICIARIO
	=============================================*/

	static public function ctrBorrarBeneficiario(){

		if(isset($_GET["idBeneficiario"])){

			$tabla ="beneficiarios";
			$datos = $_GET["idBeneficiario"];

			if($_GET["cedula"] != ""){

				unlink($_GET["cedula"]);
				rmdir('vistas/img/beneficiarios/cedulas/'.$_GET["numero_documento"]);

            }
            
			if($_GET["documentos"] != ""){

				unlink($_GET["documentos"]);
				rmdir('vistas/img/beneficiarios/documentos/'.$_GET["numero_documento"]);

			}

			$respuesta = ModeloBeneficiarios::mdlBorrarBeneficiario($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El beneficiario ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then(function(result){
									if (result.value) {

									window.location = "beneficiarios";

									}
								})

					</script>';

				}

		}

	}


}
