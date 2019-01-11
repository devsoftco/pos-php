<?php

class ControladorCajas{

    /*===========================================
    CREAR CCF
    ===========================================*/

    static public function ctrCrearCaja(){

        if(isset($_POST["nuevoNombre"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){

                $tabla = "caja_compensaciones";

                $datos = array("nombre" => $_POST["nuevoNombre"],
						"codigo" => $_POST["nuevoCodigo"],
						"nit" => $_POST["nuevoNit"],
						"direccion" => $_POST["nuevaDireccion"]);

                $respuesta = ModeloCajas::MdlIngresarCaja($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

					swal({
						  type: "success",
						  title: "La CCF ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "caja-compensaciones";

									}
								})

					</script>';

                }


            }else{

                echo'<script>

					swal({
						  type: "error",
						  title: "¡El Nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "caja-compensaciones";

							}
						})

			  	</script>';
            }
        }

    }

    /*=============================================
	EDITAR CCF
	=============================================*/

	static public function ctrEditarCaja(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){


				$tabla = "caja_compensaciones";

                $datos = array("nombre" => $_POST["editarNombre"],
                        "codigo" => $_POST["editarCodigo"],
						"nit" => $_POST["editarNit"],
						"direccion" => $_POST["editarDireccion"]);

				$respuesta = ModeloCajas::mdlEditarCaja($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La CCF ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "caja-compensaciones";

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

							window.location = "caja-compensaciones";

							}
						})

			  	</script>';

			}

		}

	}


	/*=============================================
	MOSTRAR CCF
	=============================================*/

	static public function ctrMostrarCaja($item, $valor) {

		$tabla = "caja_compensaciones";
		$respuesta = ModeloCajas::MdlMostrarCaja($tabla, $item, $valor);

		return $respuesta;

    }
    
    /*=============================================
	BORRAR CCF
	=============================================*/

	static public function ctrBorrarCaja(){

		if(isset($_GET["idCcf"])){

			$tabla ="caja_compensaciones";
			$datos = $_GET["idCcf"];

			$respuesta = ModeloCajas::mdlBorrarCaja($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La CCF ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then(function(result){
									if (result.value) {

									window.location = "caja-compensaciones";

									}
								})

					</script>';

				}

		}

	}

}