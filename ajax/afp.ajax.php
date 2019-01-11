<?php

require_once "../controladores/afp.controlador.php";
require_once "../modelos/afp.modelo.php";

class AjaxAfp{

    /*==================================
    EDITANDO AFP
    ==================================*/

    static public $idAfp;

    public function ajaxEditarAfp(){

        $item = "id";
        $valor = $this->idAfp;

        $respuesta = ControladorAfp::ctrMostrarAfp($item, $valor);

        echo json_encode($respuesta);

    }

    /*==================================
    ACTIVAR AFP
    ==================================*/

    static public $activarAfp;
    static public $activarId;

    public function ajaxActivarAfp(){


        $tabla = "afp";

        $item1 = "estado";
        $valor1 = $this->activarAfp;

        $item2 = "id";
        $valor2 = $this->activarId;


        $respuesta = ModeloAfp::mdlActualizarAfp($tabla, $item1, $valor1, $item2, $valor2);

    }

    /*==================================
    VALIDAR NO REPETIR CODIGO
    ==================================*/

    static public $validarCodigo;

    public function ajaxValidarCodigo(){


        $item = "codigo";
        $valor = $this->validarCodigo;

        $respuesta = ControladorAfp::ctrMostrarAfp($item, $valor);

        echo json_encode($respuesta);

    }

}

/*==================================
EDITAR AFP
==================================*/

if(isset($_POST["idAfp"])){

    $editar = new AjaxAfp();
    $editar -> idAfp = $_POST["idAfp"];
    $editar -> ajaxEditarAfp();

}


/*==================================
ACTIVAR AFP
==================================*/

if(isset($_POST["activarAfp"])){

    $activarAfp = new AjaxAfp();
    $activarAfp -> activarAfp = $_POST["activarAfp"];
    $activarAfp -> activarId = $_POST["activarId"];
    $activarAfp -> ajaxActivarAfp();

}

/*==================================
VALIDAR NO REPETIR CODIGO
==================================*/

if(isset($_POST["validarCodigo"])){

    $valCodigo = new AjaxAfp();
    $valCodigo -> validarCodigo = $_POST["validarCodigo"];
    $valCodigo -> ajaxValidarCodigo();

}

