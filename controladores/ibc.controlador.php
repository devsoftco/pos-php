<?php

class ControladorIbc{

    /*===========================================
    CREAR IBC
    ===========================================*/

    static public function ctrCrearIbc(){

        if(isset($_POST["nuevoNombre"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){

                $tabla = "ibc";

                $datos = array("nombre" => strtoupper($_POST["nuevoNombre"]),
						"tarifa" => $_POST["nuevaTarifa"]);

                $respuesta = ModeloIbc::MdlIngresarIbc($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

					swal({
						  type: "success",
						  title: "El IBC ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "ibc";

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

							window.location = "ibc";

							}
						})

			  	</script>';
            }
        }

    }

    /*=============================================
	EDITAR IBC
	=============================================*/

	static public function ctrEditarIbc(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){


				$tabla = "ibc";

                $datos = array("nombre" => strtoupper($_POST["editarNombre"]),
                        "tarifa" => $_POST["editarTarifa"],
                        "id" => $_POST["idIbc"]);

				$respuesta = ModeloIbc::mdlEditarIbc($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El IBC ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "ibc";

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

							window.location = "ibc";

							}
						})

			  	</script>';

			}

		}

	}


	/*=============================================
	MOSTRAR IBC
	=============================================*/

	static public function ctrMostrarIbc($item, $valor) {

		$tabla = "ibc";
		$respuesta = ModeloIbc::MdlMostrarIbc($tabla, $item, $valor);

		return $respuesta;

    }
    
    /*=============================================
	BORRAR IBC
	=============================================*/

	static public function ctrBorrarIbc(){

		if(isset($_GET["idIbc"])){

			$tabla ="ibc";
			$datos = $_GET["idIbc"];

			$respuesta = ModeloIbc::mdlBorrarIbc($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El IBC ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then(function(result){
									if (result.value) {

									window.location = "ibc";

									}
								})

					</script>';

				}

		}

	}

}