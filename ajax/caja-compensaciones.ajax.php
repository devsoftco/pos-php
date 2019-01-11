<?php

require_once "../controladores/caja-compensaciones.controlador.php";
require_once "../modelos/caja-compensaciones.modelo.php";

class AjaxCajas{

    /*==================================
    EDITANDO CCF
    ==================================*/

    static public $idCcf;

    public function ajaxEditarCaja(){

        $item = "id";
        $valor = $this->idCcf;

        $respuesta = ControladorCajas::ctrMostrarCaja($item, $valor);

        echo json_encode($respuesta);

    }

    /*==================================
    ACTIVAR CCF
    ==================================*/

    static public $activarCcf;
    static public $activarId;

    public function ajaxActivarCcf(){


        $tabla = "caja_compensaciones";

        $item1 = "estado";
        $valor1 = $this->activarCcf;

        $item2 = "id";
        $valor2 = $this->activarId;


        $respuesta = ModeloCajas::mdlActualizarCaja($tabla, $item1, $valor1, $item2, $valor2);

    }

    /*==================================
    VALIDAR NO REPETIR CODIGO
    ==================================*/

    static public $validarCodigo;

    public function ajaxValidarCodigo(){


        $item = "codigo";
        $valor = $this->validarCodigo;

        $respuesta = ControladorCajas::ctrMostrarCaja($item, $valor);

        echo json_encode($respuesta);

    }

}

/*==================================
EDITAR CCF
==================================*/

if(isset($_POST["idCcf"])){

    $editar = new AjaxCajas();
    $editar -> idCcf = $_POST["idCcf"];
    $editar -> ajaxEditarCaja();

}


/*==================================
ACTIVAR CCF
==================================*/

if(isset($_POST["activarCcf"])){

    $activarCcf= new AjaxCajas();
    $activarCcf-> activarCcf= $_POST["activarCcf"];
    $activarCcf-> activarId = $_POST["activarId"];
    $activarCcf-> ajaxActivarCcf();

}

/*==================================
VALIDAR NO REPETIR CODIGO
==================================*/

if(isset($_POST["validarCodigo"])){

    $valCodigo = new AjaxCajas();
    $valCodigo -> validarCodigo = $_POST["validarCodigo"];
    $valCodigo -> ajaxValidarCodigo();

}

