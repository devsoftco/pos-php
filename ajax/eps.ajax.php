<?php

require_once "../controladores/eps.controlador.php";
require_once "../modelos/eps.modelo.php";

class AjaxEps{

    /*==================================
    EDITANDO EPS
    ==================================*/

    static public $idEps;

    public function ajaxEditarEps(){

        $item = "id";
        $valor = $this->idEps;

        $respuesta = ControladorEps::ctrMostrarEps($item, $valor);

        echo json_encode($respuesta);

    }

    /*==================================
    ACTIVAR EPS
    ==================================*/

    static public $activarEps;
    static public $activarId;

    public function ajaxActivarEps(){


        $tabla = "eps";

        $item1 = "estado";
        $valor1 = $this->activarEps;

        $item2 = "id";
        $valor2 = $this->activarId;


        $respuesta = ModeloEps::mdlActualizarEps($tabla, $item1, $valor1, $item2, $valor2);

    }

    /*==================================
    VALIDAR NO REPETIR CODIGO
    ==================================*/

    static public $validarCodigo;

    public function ajaxValidarCodigo(){


        $item = "codigo";
        $valor = $this->validarCodigo;

        $respuesta = ControladorEPS::ctrMostrarEPS($item, $valor);

        echo json_encode($respuesta);

    }

}

/*==================================
EDITAR EPS
==================================*/

if(isset($_POST["idEps"])){

    $editar = new AjaxEps();
    $editar -> idEps = $_POST["idEps"];
    $editar -> ajaxEditarEps();

}


/*==================================
ACTIVAR EPS
==================================*/

if(isset($_POST["activarEps"])){

    $activarEps = new AjaxEps();
    $activarEps -> activarEps = $_POST["activarEps"];
    $activarEps -> activarId = $_POST["activarId"];
    $activarEps -> ajaxActivarEps();

}

/*==================================
VALIDAR NO REPETIR CODIGO
==================================*/

if(isset($_POST["validarCodigo"])){

    $valCodigo = new AjaxEps();
    $valCodigo -> validarCodigo = $_POST["validarCodigo"];
    $valCodigo -> ajaxValidarCodigo();

}

