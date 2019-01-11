<?php

class ControladorProfesiones{

    /*===========================================
    CREAR PROFESION
    ===========================================*/

    static public function ctrCrearProfesion(){

        if(isset($_POST["nuevoNombre"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){

                $tabla = "profesiones";

                $datos = array("nombre" => strtoupper($_POST["nuevoNombre"]));

                $respuesta = ModeloProfesiones::MdlIngresarProfesion($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

					swal({
						  type: "success",
						  title: "La Profesión ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "profesiones";

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

							window.location = "profesiones";

							}
						})

			  	</script>';
            }
        }

    }

    /*=============================================
	EDITAR PROFESION
	=============================================*/

	static public function ctrEditarProfesion(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){


                $tabla = "profesiones";

                $datos = array("nombre" => strtoupper($_POST["editarNombre"]),
                        "id" => $_POST["idPro"]);

				$respuesta = ModeloProfesiones::mdlEditarProfesion($tabla, $datos, $valor);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Profesión ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "profesiones";

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

							window.location = "profesiones";

							}
						})

			  	</script>';

			}

		}

	}


	/*=============================================
	MOSTRAR PROFESIONES
	=============================================*/

	static public function ctrMostrarProfesiones($item, $valor) {

		$tabla = "profesiones";
		$respuesta = ModeloProfesiones::MdlMostrarProfesiones($tabla, $item, $valor);

		return $respuesta;

    }
    
    /*=============================================
	BORRAR PROFESION
	=============================================*/

	static public function ctrBorrarProfesion(){

		if(isset($_GET["idPro"])){

			$tabla ="profesiones";
			$datos = $_GET["idPro"];

			$respuesta = ModeloProfesiones::mdlBorrarProfesion($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La Profesión ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then(function(result){
									if (result.value) {

									window.location = "profesiones";

									}
								})

					</script>';

				}

		}

	}

}