<?php

class ControladorTarifaAdministracion{

    /*===========================================
    CREAR TARIFA AFILIACION
    ===========================================*/

    static public function ctrCrearTarifaAdministracion(){

        if(isset($_POST["nuevoNombreTarAdm"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreTarAdm"])){

                $tabla = "administracion_tarifas";

                $datos = array("nombre" => strtoupper($_POST["nuevoNombreTarAdm"]),
						"tarifa" => $_POST["nuevaTarifa"]);

                $respuesta = ModeloTarifasAdministracion::MdlIngresarTarifaAdministracion($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

					swal({
						  type: "success",
						  title: "La Tarifa Administración ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tarifa-administracion";

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

							window.location = "tarifa-administracion";

							}
						})

			  	</script>';
            }
        }

    }

    /*=============================================
	EDITAR TARIFA ADMINISTRACION
	=============================================*/

	static public function ctrEditarTarifaAdministracion(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){


				$tabla = "administracion_tarifas";

                $datos = array("nombre" => strtoupper($_POST["editarNombre"]),
                        "tarifa" => $_POST["editarTarifa"],
                        "id" => $_POST["idTarAfi"]);

				$respuesta = ModeloTarifasAdministracion::mdlEditarTarifaAdministracion($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Tarifa ARL ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tarifa-administracion";

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

							window.location = "tarifa-administracion";

							}
						})

			  	</script>';

			}

		}

	}


	/*=============================================
	MOSTRAR TARIFAS ADMINISTRACION
	=============================================*/

	static public function ctrMostrarTarifasAdministracion($item, $valor) {

		$tabla = "administracion_tarifas";

		$respuesta = ModeloTarifasAdministracion::MdlMostrarTarifasAdministracion($tabla, $item, $valor);

		return $respuesta;

    }
    
    /*=============================================
	BORRAR TARIFA AFILIACION
	=============================================*/

	static public function ctrBorrarTarifaAdministracion(){

		if(isset($_GET["idTarAfi"])){

			$tabla ="administracion_tarifas";
			$datos = $_GET["idTarAfi"];

			$respuesta = ModeloTarifasAdministracion::mdlBorrarTarifaAdministracion($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La Tarifa de Afiliación ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then(function(result){
									if (result.value) {

									window.location = "tarifa-administracion";

									}
								})

					</script>';

				}

		}

	}

}