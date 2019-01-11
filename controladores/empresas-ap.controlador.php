<?php

class ControladorEmpresasAp{

    /*===========================================
    CREAR EMPRESA
    ===========================================*/

    static public function ctrCrearEmpresa(){

        if(isset($_POST["nuevoNombre"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){

                $tabla = "empresas_apo";

                $datos = array("nombre" => strtoupper($_POST["nuevoNombre"]),
                        "nit" => strtoupper($_POST["nuevoNit"]),
						"direccion" => strtoupper($_POST["nuevaDireccion"]));

                $respuesta = ModeloEmpresasAp::MdlIngresarEmpresa($tabla, $datos);

                if($respuesta == "ok"){

                    echo'<script>

					swal({
						  type: "success",
						  title: "La Empresa ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "empresas-ap";

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

							window.location = "empresas-ap";

							}
						})

			  	</script>';
            }
        }

    }

    /*=============================================
	EDITAR EMPRESA
	=============================================*/

	static public function ctrEditarEmpresa(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){


                $tabla = "empresas_apo";

                $datos = array("nombre" => strtoupper($_POST["editarNombre"]),
                        "direccion" => strtoupper($_POST["editarDireccion"]),
                        "nit" => strtoupper($_POST["editarNit"]),
                        "id" => $_POST["idEmp"]);

				$respuesta = ModeloEmpresasAp::mdlEditarEmpresa($tabla, $datos, $valor);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Empresa ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "empresas-ap";

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

							window.location = "empresas-ap";

							}
						})

			  	</script>';

			}

		}

	}


	/*=============================================
	MOSTRAR EMPRESAS
	=============================================*/

	static public function ctrMostrarEmpresas($item, $valor) {

		$tabla = "empresas_apo";
		$respuesta = ModeloEmpresasAp::MdlMostrarEmpresas($tabla, $item, $valor);

		return $respuesta;

    }
    
    /*=============================================
	BORRAR EMPRESA
	=============================================*/

	static public function ctrBorrarEmpresa(){

		if(isset($_GET["idEmp"])){

			$tabla ="empresas_apo";
			$datos = $_GET["idEmp"];

			$respuesta = ModeloEmpresasAp::mdlBorrarEmpresa($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La Empresa ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then(function(result){
									if (result.value) {

									window.location = "empresas-ap";

									}
								})

					</script>';

				}

		}

	}

}