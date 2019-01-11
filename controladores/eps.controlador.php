<?php

class ControladorEps{

    /*===========================================
    CREAR EPS
    ===========================================*/

    static public function ctrCrearEps(){

        if(isset($_POST["nuevoNombre"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){

                $tabla = "eps";

                $datos = array("nombre" => strtoupper($_POST["nuevoNombre"]),
						"codigo" => strtoupper($_POST["nuevoCodigo"]),
						"nit" => $_POST["nuevoNit"],
						"direccion" => strtoupper($_POST["nuevaDireccion"]));

                $respuesta = ModeloEps::MdlIngresarEps($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

					swal({
						  type: "success",
						  title: "La EPS ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "eps";

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

							window.location = "eps";

							}
						})

			  	</script>';
            }
        }

    }

    /*=============================================
	EDITAR EPS
	=============================================*/

	static public function ctrEditarEps(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){


				$tabla = "eps";

                $datos = array("nombre" => strtoupper($_POST["editarNombre"]),
                        "codigo" => strtoupper($_POST["editarCodigo"]),
						"nit" => $_POST["editarNit"],
						"direccion" => strtoupper($_POST["editarDireccion"]));

				$respuesta = ModeloEps::mdlEditarEps($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La EPS ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "eps";

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

							window.location = "eps";

							}
						})

			  	</script>';

			}

		}

	}


	/*=============================================
	MOSTRAR EPS
	=============================================*/

	static public function ctrMostrarEps($item, $valor) {

		$tabla = "eps";
		$respuesta = ModeloEps::MdlMostrarEps($tabla, $item, $valor);

		return $respuesta;

    }
    
    /*=============================================
	BORRAR EPS
	=============================================*/

	static public function ctrBorrarEps(){

		if(isset($_GET["idEps"])){

			$tabla ="eps";
			$datos = $_GET["idEps"];

			$respuesta = ModeloEps::mdlBorrarEps($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La EPS ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then(function(result){
									if (result.value) {

									window.location = "eps";

									}
								})

					</script>';

				}

		}

	}

}