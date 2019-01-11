<?php

class ControladorArl{

    /*===========================================
    CREAR ARL
    ===========================================*/

    static public function ctrCrearArl(){

        if(isset($_POST["nuevoNombre"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){

                $tabla = "arl";

                $datos = array("nombre" => $_POST["nuevoNombre"],
						"codigo" => $_POST["nuevoCodigo"],
						"nit" => $_POST["nuevoNit"],
						"direccion" => $_POST["nuevaDireccion"]);

                $respuesta = ModeloArl::MdlIngresarArl($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

					swal({
						  type: "success",
						  title: "La ARL ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "arl";

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

							window.location = "arl";

							}
						})

			  	</script>';
            }
        }

    }

    /*=============================================
	EDITAR ARL
	=============================================*/

	static public function ctrEditarArl(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){


				$tabla = "arl";

                $datos = array("nombre" => $_POST["editarNombre"],
                        "codigo" => $_POST["editarCodigo"],
						"nit" => $_POST["editarNit"],
						"direccion" => $_POST["editarDireccion"]);

				$respuesta = ModeloEps::mdlEditarEps($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La ARL ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "arl";

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

							window.location = "arl";

							}
						})

			  	</script>';

			}

		}

	}


	/*=============================================
	MOSTRAR ARL
	=============================================*/

	static public function ctrMostrarArl($item, $valor) {

		$tabla = "arl";
		$respuesta = ModeloArl::MdlMostrarArl($tabla, $item, $valor);

		return $respuesta;

    }
    
    /*=============================================
	BORRAR ARL
	=============================================*/

	static public function ctrBorrarArl(){

		if(isset($_GET["idArl"])){

			$tabla ="arl";
			$datos = $_GET["idArl"];

			$respuesta = ModeloArl::mdlBorrarArl($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La ARL ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then(function(result){
									if (result.value) {

									window.location = "arl";

									}
								})

					</script>';

				}

		}

	}

}