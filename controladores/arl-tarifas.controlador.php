<?php

class ControladorTarifasArl{

    /*===========================================
    CREAR TARIFA ARL
    ===========================================*/

    static public function ctrCrearTarifaArl(){

        if(isset($_POST["nuevoNombre"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){

                $tabla = "arl_tarifas";

                $datos = array("nombre" => strtoupper($_POST["nuevoNombre"]),
						"tarifa" => $_POST["nuevaTarifa"]);

                $respuesta = ModeloTarifasArl::MdlIngresarTarifaArl($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

					swal({
						  type: "success",
						  title: "La Tarifa ARL ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "arl-tarifas";

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

							window.location = "arl-tarifas";

							}
						})

			  	</script>';
            }
        }

    }

    /*=============================================
	EDITAR TARIFA ARL
	=============================================*/

	static public function ctrEditarTarifaArl(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){


				$tabla = "arl_tarifas";

                $datos = array("nombre" => strtoupper($_POST["editarNombre"]),
                        "tarifa" => $_POST["editarTarifa"],
                        "id" => $_POST["idTarArl"]);

				$respuesta = ModeloTarifasArl::mdlEditarTarArl($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Tarifa ARL ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "arl-tarifas";

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

							window.location = "arl-tarifas";

							}
						})

			  	</script>';

			}

		}

	}


	/*=============================================
	MOSTRAR TARIFAS ARL
	=============================================*/

	static public function ctrMostrarTarifasArl($item, $valor) {

		$tabla = "arl_tarifas";
		$respuesta = ModeloTarifasArl::MdlMostrarTarifasArl($tabla, $item, $valor);

		return $respuesta;

    }
    
    /*=============================================
	BORRAR TARIFA ARL
	=============================================*/

	static public function ctrBorrarTarifaArl(){

		if(isset($_GET["idTarArl"])){

			$tabla ="arl_tarifas";
			$datos = $_GET["idTarArl"];

			$respuesta = ModeloTarifasArl::mdlBorrarTarArl($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La Tarifa ARL ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then(function(result){
									if (result.value) {

									window.location = "arl-tarifas";

									}
								})

					</script>';

				}

		}

	}

}