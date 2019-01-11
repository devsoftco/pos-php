<?php

class ControladorAfiliados{

    /*======================================
    CREAR Afiliado
    ======================================*/

    static public function ctrCrearAfiliado(){

        if(isset($_POST["nuevoDocumentoId"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoAfiliado"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["nuevoApellidoP"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["nuevoApellidoM"]) &&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoDocumentoId"]) &&
            //preg_match('/^[0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4} $/', $_POST["nuevoEmail"]) &&
            preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoCelular"]) &&
            preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaDireccion"])
            ){

                /*=============================================
                VALIDAR PDF
                =============================================*/

                $ruta = "";

                if(isset($_FILES['nuevoPdf']['name'])){
                    
                    /*=============================================
					CREAR DIRECTORIO GUARDAR PDF AFILIADO
					=============================================*/
 
                    $directorio = "vistas/img/afiliados/".$_POST["nuevoDocumentoId"];
 
                    mkdir($directorio, 0755);

                    if($_FILES["nuevoPdf"]["type"] == "application/pdf"){

                        /*=============================================
					    GUARDAMOS EL ARCHIVO EN EL DIRECTORIO
                        =============================================*/
    
                        $aleatorio = mt_rand(100,999);
                
                        $ruta = "vistas/img/afiliados/".$_POST["nuevoDocumentoId"]."/".$aleatorio.".pdf";
                    
	                    move_uploaded_file($_FILES['nuevoPdf']['tmp_name'],$ruta);
    
                        }
                }
            
                        $tabla = "afiliados";

                        $datos = array("nombres"=>strtoupper($_POST["nuevoAfiliado"]),
                                "apellido_paterno"=>strtoupper($_POST["nuevoApellidoP"]),
                                "apellido_materno"=>strtoupper($_POST["nuevoApellidoM"]),
                                "tipo_documento"=>$_POST["nuevoTipoDocumento"],
                                "numero_documento"=>$_POST["nuevoDocumentoId"],
                                "email"=>strtoupper($_POST["nuevoEmail"]),
                                "celular"=>$_POST["nuevoCelular"],
                                "telefono"=>$_POST["nuevoFijo"],
                                "direccion"=>strtoupper($_POST["nuevaDireccion"]),
                                "barrio"=>strtoupper($_POST["nuevoBarrio"]),
                                "departamento"=>$_POST["nuevoDepartamento"],
                                "fecha_nacimiento"=>$_POST["nuevaFechaNacimiento"],
                                "cedula"=>$ruta);

                                $respuesta = ModeloAfiliados::mdlIngresarAfiliado($tabla, $datos);

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
	MOSTRAR AFILIADOS
	=============================================*/

	static public function ctrMostrarAfiliados($item, $valor) {

		$tabla = "afiliados";
		$respuesta = ModeloAfiliados::MdlMostrarAfiliados($tabla, $item, $valor);

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
                preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["editarBarrio"])
                ){

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
    
    /*======================================
    CREAR ANTECEDENTE
    ======================================*/

    static public function ctrCrearAntecedente(){

        if(isset($_POST["idAnt"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["idAnt"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["numero_documento"])){

                /*=============================================
                VALIDAR PDF
                =============================================*/

                $ruta = "";

                if(isset($_FILES['nuevoAntecedente']['name'])){
                    
                    /*=============================================
					CREAR DIRECTORIO GUARDAR ANTECEDENTE AFILIADO
					=============================================*/
 
                    $directorio = "vistas/img/afiliados/antecedentes/".$_POST["numero_documento"];
 
                    mkdir($directorio, 0755);

                    if($_FILES["nuevoAntecedente"]["type"] == "application/pdf"){

                        /*=============================================
					    GUARDAMOS EL ARCHIVO EN EL DIRECTORIO
                        =============================================*/
    
                        $aleatorio = mt_rand(100,999);
                
                        $ruta = "vistas/img/afiliados/antecedentes/".$_POST["numero_documento"]."/".$aleatorio.".pdf";
                    
	                    move_uploaded_file($_FILES['nuevoAntecedente']['tmp_name'],$ruta);
    
                        }
                }
            
                        $tabla = "antecedentes";

                        $datos = array("nombre"=>strtoupper($_POST["nuevoTipoAntecedente"]),
                                "archivo"=>$ruta,
                                "afiliados_id"=>$_POST["idAnt"]);

                                $respuesta = ModeloAfiliados::mdlIngresarAntecedente($tabla, $datos);

                                if($respuesta == "ok"){

                                    echo '<script>

                                    swal({
                                        type: "success",
                                        title: "¡El documento ha sido guardado correctamente!",
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


}
