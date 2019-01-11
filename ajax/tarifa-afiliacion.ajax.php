<?php

require_once "../controladores/tarifa-afiliacion.controlador.php";
require_once "../modelos/tarifa-afiliacion.modelo.php";

class AjaxTarifaAfiliaciones{

    /*==================================
    EDITANDO TARIFA AFILIACIONES
    ==================================*/

    static public $idTarAfi;

    public function ajaxEditarTarAfi(){

        $item = "id";
        $valor = $this->idTarAfi;

        $respuesta = ControladorTarifaAfiliaciones::ctrMostrarTarifasAfiliaciones($item, $valor);

        echo json_encode($respuesta);

    }

    /*==================================
    ACTIVAR TARIFA AFILIACIONES
    ==================================*/

    static public $activarTarAfi;
    static public $activarTarId;

    public function ajaxActivarTarAfi(){


        $tabla = "afiliacion_tarifas";

        $item1 = "estado";
        $valor1 = $this->activarTarAfi;

        $item2 = "id";
        $valor2 = $this->activarTarId;


        $respuesta = ModeloTarifasAfiliaciones::mdlActualizarTarifaAfiliacion($tabla, $item1, $valor1, $item2, $valor2);

    }

    /*==================================
    VALIDAR NO REPETIR NOMBRE TARIFA
    ==================================*/

    static public $validarNombre;

    public function ajaxValidarNombre(){


        $item = "nombre";
        $valor = $this->validarNombre;

        $respuesta = ControladorTarifaAfiliaciones::ctrMostrarTarifasAfiliaciones($item, $valor);

        echo json_encode($respuesta);

    }

}

/*==================================
EDITAR TARIFA AFILIACION
==================================*/

if(isset($_POST["idTarAfi"])){

    $editar = new AjaxTarifaAfiliaciones();
    $editar -> idTarAfi = $_POST["idTarAfi"];
    $editar -> ajaxEditarTarAfi();

}


/*==================================
ACTIVAR TARIFA AFILIACION
==================================*/

if(isset($_POST["activarTarAfi"])){

    $activarAfi = new AjaxTarifaAfiliaciones();
    $activarAfi -> activarTarAfi = $_POST["activarTarAfi"];
    $activarAfi -> activarTarId = $_POST["activarTarId"];
    $activarAfi -> ajaxActivarTarAfi();

}

/*==================================
VALIDAR NO REPETIR NOMBRE TARIFA AFILIACION
==================================*/

if(isset($_POST["validarNombre"])){

    $valNombre = new AjaxTarifaAfiliaciones();
    $valNombre -> validarNombre = $_POST["validarNombre"];
    $valNombre -> ajaxValidarNombre();

}

