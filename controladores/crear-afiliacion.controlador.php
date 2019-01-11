<?php

class ControladorCrearAfiliaciones{
    
    /*======================================
    CREAR AFILIACION
    ======================================*/

    static public function ctrCrearAfiliacion(){

        if(isset($_POST["id"])){

            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["id"])){       

                        $tabla = "afiliaciones";

                        $datos = array("afiliado_id"=>strtoupper($_POST["id"]),
                        "tarifa_ibc"=>strtoupper($_POST["nuevoIbc"]),
                        "afp_id"=>$_POST["seleccionarAfp"],
                        "eps_id"=>strtoupper($_POST["seleccionarEps"]),
                        "arl_id"=>$_POST["seleccionarArl"],
                        "tipo_afiliados_id"=>$_POST["seleccionarTipoAfi"],
                        "empresa_apo_id"=>strtoupper($_POST["seleccionarEmpApo"]),
                        "arl_tarifas_id"=>strtoupper($_POST["seleccionarTipoArl"]),
                        "profesiones_id"=>strtoupper($_POST["seleccionarProfesion"]),
                        "caja_compensaciones_id"=>strtoupper($_POST["seleccionarCcf"]),
                        "administracion_tarifas_id"=>strtoupper($_POST["seleccionarTarifaAdm"]),
                        "fecha_afiliacion"=>$_POST["nuevaFechaAfiliacion"],
                        "usuario_id"=>$_POST["idUsuario"]);

                                $respuesta = ModeloCrearAfiliaciones::mdlIngresarAfiliacion($tabla, $datos);

                                if($respuesta == "ok"){

                                    echo '<script>

                                    swal({
                                        type: "success",
                                        title: "¡La afiliación ha sido guardado correctamente!",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar",
                                        closeModal: false

                                        }).then((result)=>{

                                                    if(result.value){
                                                    window.location = "afiliaciones";
                                                    }

                                            });

                                    </script>';
                                }

            }else{

                echo '<script>

                swal({
                    type: "error",
                    title: "¡El afiliado no puede estar vacío o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar",
                    closeModal: false

                }).then((result)=>{

                    if(result.value){
                        window.location = "afiliados";
                    }

                });

                </script>';


            }



        }
    }

    }