<?php

require_once "../controladores/arl.controlador.php";
require_once "../modelos/arl.modelo.php";

class AjaxArl{

    /*==================================
    EDITANDO ARL
    ==================================*/

    static public $idArl;

    public function ajaxEditarArl(){

        $item = "id";
        $valor = $this->idArl;

        $respuesta = ControladorArl::ctrMostrarArl($item, $valor);

        echo json_encode($respuesta);

    }

    /*==================================
    ACTIVAR ARL
    ==================================*/

    static public $activarArl;
    static public $activarId;

    public function ajaxActivarArl(){


        $tabla = "arl";

        $item1 = "estado";
        $valor1 = $this->activarArl;

        $item2 = "id";
        $valor2 = $this->activarId;


        $respuesta = ModeloArl::mdlActualizarArl($tabla, $item1, $valor1, $item2, $valor2);

    }

    /*==================================
    VALIDAR NO REPETIR CODIGO
    ==================================*/

    static public $validarCodigo;

    public function ajaxValidarCodigo(){


        $item = "codigo";
        $valor = $this->validarCodigo;

        $respuesta = ControladorArl::ctrMostrarArl($item, $valor);

        echo json_encode($respuesta);

    }

}

/*==================================
EDITAR ARL
==================================*/

if(isset($_POST["idArl"])){

    $editar = new AjaxArl();
    $editar -> idArl = $_POST["idArl"];
    $editar -> ajaxEditarArl();

}


/*==================================
ACTIVAR ARL
==================================*/

if(isset($_POST["activarArl"])){

    $activarArl = new AjaxArl();
    $activarArl -> activarArl = $_POST["activarArl"];
    $activarArl -> activarId = $_POST["activarId"];
    $activarArl -> ajaxActivarArl();

}

/*==================================
VALIDAR NO REPETIR CODIGO
==================================*/

if(isset($_POST["validarCodigo"])){

    $valCodigo = new AjaxArl();
    $valCodigo -> validarCodigo = $_POST["validarCodigo"];
    $valCodigo -> ajaxValidarCodigo();

}

