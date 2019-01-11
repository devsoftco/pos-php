<?php

require_once "../controladores/arl-tarifas.controlador.php";
require_once "../modelos/arl-tarifas.modelo.php";

class AjaxTarifaArl{

    /*==================================
    EDITANDO TARIFA ARL
    ==================================*/

    static public $idTarArl;

    public function ajaxEditarTarArl(){

        $item = "id";
        $valor = $this->idTarArl;

        $respuesta = ControladorTarifasArl::ctrMostrarTarifasArl($item, $valor);

        echo json_encode($respuesta);

    }

    /*==================================
    ACTIVAR ARL
    ==================================*/

    static public $activarTarArl;
    static public $activarTarId;

    public function ajaxActivarTarArl(){


        $tabla = "arl_tarifas";

        $item1 = "estado";
        $valor1 = $this->activarTarArl;

        $item2 = "id";
        $valor2 = $this->activarTarId;


        $respuesta = ModeloTarifasArl::mdlActualizarTarArl($tabla, $item1, $valor1, $item2, $valor2);

    }

    /*==================================
    VALIDAR NO REPETIR NOMBRE
    ==================================*/

    static public $validarNombre;

    public function ajaxValidarNombre(){


        $item = "nombre";
        $valor = $this->validarNombre;

        $respuesta = ControladorTarifasArl::ctrMostrarTarifasArl($item, $valor);

        echo json_encode($respuesta);

    }

}

/*==================================
EDITAR TARIFA ARL
==================================*/

if(isset($_POST["idTarArl"])){

    $editar = new AjaxTarifaArl();
    $editar -> idTarArl = $_POST["idTarArl"];
    $editar -> ajaxEditarTarArl();

}


/*==================================
ACTIVAR TARIFA ARL
==================================*/

if(isset($_POST["activarTarArl"])){

    $activarArl = new AjaxTarifaArl();
    $activarArl -> activarTarArl = $_POST["activarTarArl"];
    $activarArl -> activarTarId = $_POST["activarTarId"];
    $activarArl -> ajaxActivarTarArl();

}

/*==================================
VALIDAR NO REPETIR NOMBRE TARIFA ARL
==================================*/

if(isset($_POST["validarNombre"])){

    $valNombre = new AjaxTarifaArl();
    $valNombre -> validarNombre = $_POST["validarNombre"];
    $valNombre -> ajaxValidarNombre();

}

