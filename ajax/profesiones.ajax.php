<?php

require_once "../controladores/profesiones.controlador.php";
require_once "../modelos/profesiones.modelo.php";

class AjaxProfesiones{

    /*==================================
    EDITANDO PROFESIÓN
    ==================================*/

    static public $idPro;

    public function ajaxEditarProfesion(){

        $item = "id";
        $valor = $this->idPro;

        $respuesta = ControladorProfesiones::ctrMostrarProfesiones($item, $valor);

        echo json_encode($respuesta);

    }


    /*==================================
    VALIDAR NO REPETIR NOMBRE
    ==================================*/

    static public $validarNombre;

    public function ajaxValidarNombre(){


        $item = "nombre";
        $valor = $this->validarNombre;

        $respuesta = ControladorProfesiones::ctrMostrarProfesiones($item, $valor);

        echo json_encode($respuesta);

    }

}

/*==================================
EDITAR PROFESIÓN
==================================*/

if(isset($_POST["idPro"])){

    $editar = new AjaxProfesiones();
    $editar -> idPro = $_POST["idPro"];
    $editar -> ajaxEditarProfesion();

}



/*==================================
VALIDAR NO REPETIR NOMBRE
==================================*/

if(isset($_POST["validarNombre"])){

    $valNombre = new AjaxProfesiones();
    $valNombre -> validarNombre = $_POST["validarNombre"];
    $valNombre -> ajaxValidarNombre();

}


