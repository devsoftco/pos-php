<?php

class ControladorAfp{

    /*===========================================
    CREAR AFP
    ===========================================*/

    static public function ctrCrearAfp(){

        if(isset($_POST["nuevoNombre"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){

                $tabla = "afp";

                $datos = array("nombre" => strtoupper($_POST["nuevoNombre"]),
						"codigo" => ($_POST["nuevoCodigo"]),
						"nit" => $_POST["nuevoNit"],
						"direccion" => strtoupper($_POST["nuevaDireccion"]));

                $respuesta = ModeloAfp::MdlIngresarAfp($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

					swal({
						  type: "success",
						  title: "La AFP ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "afp";

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

							window.location = "afp";

							}
						})

			  	</script>';
            }
        }

    }

    /*=============================================
	EDITAR AFP
	=============================================*/

	static public function ctrEditarAfp(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){


				$tabla = "afp";

                $datos = array("nombre" => strtoupper($_POST["editarNombre"]),
                        "codigo" => strtoupper($_POST["editarCodigo"]),
						"nit" => $_POST["editarNit"],
						"direccion" => strtoupper($_POST["editarDireccion"]));

				$respuesta = ModeloAfp::mdlEditarAfp($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La AFP ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "afp";

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

							window.location = "afp";

							}
						})

			  	</script>';

			}

		}

	}


	/*=============================================
	MOSTRAR AFP
	=============================================*/

	static public function ctrMostrarAfp($item, $valor) {

		$tabla = "afp";
		$respuesta = ModeloAfp::MdlMostrarAfp($tabla, $item, $valor);

		return $respuesta;

    }
    
    /*=============================================
	BORRAR AFP
	=============================================*/

	static public function ctrBorrarAfp(){

		if(isset($_GET["idAfp"])){

			$tabla ="afp";
			$datos = $_GET["idAfp"];

			$respuesta = ModeloAfp::mdlBorrarAfp($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La AFP ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then(function(result){
									if (result.value) {

									window.location = "afp";

									}
								})

					</script>';

				}

		}

	}

}