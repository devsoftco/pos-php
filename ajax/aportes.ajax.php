<?php

require_once "../controladores/aportes.controlador.php";
require_once "../modelos/aportes.modelo.php";
require_once "../controladores/afiliaciones.controlador.php";
require_once "../modelos/afiliaciones.modelo.php";

class AjaxAportes{


    /*==================================
    ACTIVAR USUARIO
    ==================================*/

    static public $idAfiliacion;

    public function ajaxactivarPagoAfi(){

        $itemAfiliaciones = "id";
        $valorAfiliaciones = $this->idAfiliacion;

        $respuesta = ControladorAfiliaciones::ctrMostrarAfiliaciones($itemAfiliaciones, $valorAfiliaciones);

        echo json_encode($respuesta);


    }

    /*==================================
    VER DATOS APORTE PARA PAGO
    ==================================*/

    static public $idAfiliadoA;

    public function ajaxVerAporte(){

        $item = "id";
        $valor = $this->idAfiliadoA;

        $respuesta = ControladorAportes::ctrMostrarEstadoAportes($item, $valor);

        echo json_encode($respuesta);

        

    }

}

/*==================================
ACTIVAR USUARIO
==================================*/

if(isset($_POST["idAfiliacion"])){

    $activarPagoAfi = new AjaxAportes();
    $activarPagoAfi -> idAfiliacion = $_POST["idAfiliacion"];
    $activarPagoAfi -> ajaxactivarPagoAfi();

}

/*==================================
VER DATOS APORTE PARA PAGO
==================================*/

if(isset($_POST["idAfiliadoA"])){

    $editar = new AjaxAportes();
    $editar -> idAfiliadoA = $_POST["idAfiliadoA"];
    $editar -> ajaxVerAporte();

}

