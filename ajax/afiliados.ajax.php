<?php

require_once "../controladores/afiliados.controlador.php";
require_once "../modelos/afiliados.modelo.php";

class AjaxAfiliados{

    /*==================================
    EDITAR AFILIADO
    ==================================*/

    static public $idAfiliado;

    public function ajaxEditarAfiliado(){

        $item = "id";
        $valor = $this->idAfiliado;

        $respuesta = ControladorAfiliados::ctrMostrarAfiliados($item, $valor);

        echo json_encode($respuesta);

        

    }

    /*==================================
    ACTIVAR AFILIADO
    ==================================*/

    static public $activarAfiliado;
    static public $activarId;

    public function ajaxActivarAfiliado(){


        $tabla = "afiliados";

        $item1 = "estado";
        $valor1 = $this->activarAfiliado;

        $item2 = "id";
        $valor2 = $this->activarId;


        $respuesta = ModeloAfiliados::mdlActualizarAfiliado($tabla, $item1, $valor1, $item2, $valor2);

    }

    /*==================================
    VALIDAR NO REPETIR AFILIADO
    ==================================*/

    static public $validarAfiliado;

    public function ajaxValidarAfiliado(){


        $item = "numero_documento";
        $valor = $this->validarAfiliado;

        $respuesta = ControladorAfiliados::ctrMostrarAfiliados($item, $valor);

        echo json_encode($respuesta);

    }



}

/*==================================
EDITAR AFILIADO
==================================*/

if(isset($_POST["idAfiliado"])){

    $editar = new AjaxAfiliados();
    $editar -> idAfiliado = $_POST["idAfiliado"];
    $editar -> ajaxEditarAfiliado();

}

/*==================================
ACTIVAR AFILIADO
==================================*/

if(isset($_POST["activarAfiliado"])){

    $activarAfiliado = new AjaxAfiliados();
    $activarAfiliado -> activarAfiliado = $_POST["activarAfiliado"];
    $activarAfiliado -> activarId = $_POST["activarId"];
    $activarAfiliado -> ajaxActivarAfiliado();

}

/*==================================
VALIDAR NO REPETIR AFILIADO
==================================*/

if(isset($_POST["validarAfiliado"])){

    $valAfiliado = new AjaxAfiliados();
    $valAfiliado -> validarAfiliado = $_POST["validarAfiliado"];
    $valAfiliado -> ajaxValidarAfiliado();

}


