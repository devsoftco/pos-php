<?php

require_once "../controladores/afiliaciones.controlador.php";
require_once "../modelos/afiliaciones.modelo.php";

class AjaxAfiliaciones{

    /*==================================
    ACTIVAR AFILIACION
    ==================================*/

    static public $activarAfiliacion;
    static public $activarId;

    public function ajaxActivarAfiliacion(){


        $tabla = "estado_afiliaciones";

        $item1 = "estado";
        $valor1 = $this->activarAfiliacion;

        $item2 = "afiliaciones_id";
        $valor2 = $this->activarId;


        $respuesta = ModeloAfiliaciones::mdlActualizarAfiliacion($tabla, $item1, $valor1, $item2, $valor2);

    }


    /*==================================
    AGREGAR ID AFILIACION
    ==================================*/

    static public $idAfiliacion;

    public function ajaxAgregarIdAfiliacion(){

        $item = "id";
        $valor = $this->idAfiliacion;

        $respuesta = ControladorAfiliaciones::ctrMostrarAfiliaciones($item, $valor);

        echo json_encode($respuesta);

    }

}

/*==================================
ACTIVAR AFILIADO
==================================*/

if(isset($_POST["activarAfiliacion"])){

    $activarAfiliacion = new AjaxAfiliaciones();
    $activarAfiliacion -> activarAfiliacion = $_POST["activarAfiliacion"];
    $activarAfiliacion -> activarId = $_POST["activarId"];
    $activarAfiliacion -> ajaxActivarAfiliacion();

}

/*==================================
AGREGAR ID AFILIACION
==================================*/

if(isset($_POST["idAfiliacion"])){

    $agregarIdAfiliacion = new AjaxAfiliaciones();
    $agregarIdAfiliacion -> idAfiliacion = $_POST["idAfiliacion"];
    $agregarIdAfiliacion -> ajaxAgregarIdAfiliacion();

}




