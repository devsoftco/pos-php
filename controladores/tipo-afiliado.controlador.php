<?php

class ControladorTipoAfiliados{

    /*===========================================
    CREAR TIPO AFILIADO
    ===========================================*/

    static public function ctrCrearTipoAfiliado(){

        if(isset($_POST["nuevoNombreTipo"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreTipo"])){

                $tabla = "tipo_afiliados";

                $datos = array("nombre" => strtoupper($_POST["nuevoNombreTipo"]),
                        "porcentaje_eps" => $_POST["nuevoPorcentajeEps"],
						"porcentaje_afp" => $_POST["nuevoPorcentajeAfp"],
						"porcentaje_ccf" => $_POST["nuevoPorcentajeCcf"]);

                $respuesta = ModeloTipoAfiliados::MdlIngresarTipoAfiliado($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

					swal({
						  type: "success",
						  title: "El nuevo Tipo Afiliado ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tipo-afiliado";

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

							window.location = "tipo-afiliado";

							}
						})

			  	</script>';
            }
        }

    }

    /*=============================================
	EDITAR TIPO AFILIADO
	=============================================*/

	static public function ctrEditarTipoAfiliado(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){


				$tabla = "tipo_afiliados";

                $datos = array("nombre" => strtoupper($_POST["editarNombre"]),
                        "porcentaje_eps" => $_POST["editarPorcentajeEps"],
						"porcentaje_afp" => $_POST["editarPorcentajeAfp"],
						"porcentaje_ccf" => $_POST["editarPorcentajeCcf"],
                        "id" => $_POST["idTipo"]);

				$respuesta = ModeloTipoAfiliados::mdlEditarTipoAfiliado($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Tipo Afiliado ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tipo-afiliado";

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

							window.location = "tipo-afiliado";

							}
						})

			  	</script>';

			}

		}

	}


	/*=============================================
	MOSTRAR TIPO AFILIADOS
	=============================================*/

	static public function ctrMostrarTipoAfiliados($item, $valor) {

		$tabla = "tipo_afiliados";
		$respuesta = ModeloTipoAfiliados::MdlMostrarTipoAfiliados($tabla, $item, $valor);

		return $respuesta;

    }
    
    /*=============================================
	BORRAR TIPO AFILIADO
	=============================================*/

	static public function ctrBorrarTipoAfiliado(){

		if(isset($_GET["idTipo"])){

			$tabla ="tipo_afiliados";
			$datos = $_GET["idTipo"];

			$respuesta = ModeloTipoAfiliados::mdlBorrarTipoAfiliado($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El tipo Afiliado ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then(function(result){
									if (result.value) {

									window.location = "tipo-afiliado";

									}
								})

					</script>';

				}

		}

	}

}