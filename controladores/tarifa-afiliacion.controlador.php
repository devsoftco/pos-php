<?php

class ControladorTarifaAfiliaciones{

    /*===========================================
    CREAR TARIFA AFILIACION
    ===========================================*/

    static public function ctrCrearTarifaAfiliacion(){

        if(isset($_POST["nuevoNombre"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){

                $tabla = "afiliacion_tarifas";

                $datos = array("nombre" => strtoupper($_POST["nuevoNombre"]),
						"tarifa" => $_POST["nuevaTarifa"]);

                $respuesta = ModeloTarifasAfiliaciones::MdlIngresarTarifaAfiliacion($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

					swal({
						  type: "success",
						  title: "La Tarifa Ailiación ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tarifa-afiliacion";

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

							window.location = "tarifa-afiliacion";

							}
						})

			  	</script>';
            }
        }

    }

    /*=============================================
	EDITAR TARIFA AFILIACION
	=============================================*/

	static public function ctrEditarTarifaAfiliacion(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){


				$tabla = "afiliacion_tarifas";

                $datos = array("nombre" => strtoupper($_POST["editarNombre"]),
                        "tarifa" => $_POST["editarTarifa"],
                        "id" => $_POST["idTarAfi"]);

				$respuesta = ModeloTarifasAfiliaciones::mdlEditarTarifaAfiliacion($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Tarifa ARL ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tarifa-afiliacion";

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

							window.location = "tarifa-afiliacion";

							}
						})

			  	</script>';

			}

		}

	}


	/*=============================================
	MOSTRAR TARIFAS AFILIACION
	=============================================*/

	static public function ctrMostrarTarifasAfiliaciones($item, $valor) {

		$tabla = "afiliacion_tarifas";
		$respuesta = ModeloTarifasAfiliaciones::MdlMostrarTarifasAfiliaciones($tabla, $item, $valor);

		return $respuesta;

    }
    
    /*=============================================
	BORRAR TARIFA AFILIACION
	=============================================*/

	static public function ctrBorrarTarifaAfiliacion(){

		if(isset($_GET["idTarAfi"])){

			$tabla ="afiliacion_tarifas";
			$datos = $_GET["idTarAfi"];

			$respuesta = ModeloTarifasAfiliaciones::mdlBorrarTarifaAfiliacion($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La Tarifa Afiliacion ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then(function(result){
									if (result.value) {

									window.location = "tarifa-afiliacion";

									}
								})

					</script>';

				}

		}

	}

}