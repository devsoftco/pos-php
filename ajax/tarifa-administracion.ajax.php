<?php

require_once "../controladores/tarifa-administracion.controlador.php";
require_once "../modelos/tarifa-administracion.modelo.php";

class AjaxTarifaAdministracion{

    /*==================================
    EDITANDO TARIFA Administracion
    ==================================*/

    static public $idTarAdm;

    public function ajaxEditarTarAdm(){

        $item = "id";
        $valor = $this->idTarAdm;

        $respuesta = ControladorTarifaAdministracion::ctrMostrarTarifasAdministracion($item, $valor);

        echo json_encode($respuesta);

    }

    /*==================================
    ACTIVAR TARIFA AFILIACIONES
    ==================================*/

    static public $activarTarAdm;
    static public $activarTarId;

    public function ajaxActivarTarAdm(){


        $tabla = "administracion_tarifas";

        $item1 = "estado";
        $valor1 = $this->activarTarAdm;

        $item2 = "id";
        $valor2 = $this->activarTarId;


        $respuesta = ModeloTarifasAdministracion::mdlActualizarTarifaAdministracion($tabla, $item1, $valor1, $item2, $valor2);

    }

    /*==================================
    VALIDAR NO REPETIR NOMBRE TARIFA
    ==================================*/

    static public $validarNombre;

    public function ajaxValidarNombre(){


        $item = "nombre";
        $valor = $this->validarNombre;

        $respuesta = ControladorTarifaAdministracion::ctrMostrarTarifasAdministracion($item, $valor);

        echo json_encode($respuesta);

    }

}

/*==================================
EDITAR TARIFA AFILIACION
==================================*/

if(isset($_POST["idTarAdm"])){

    $editar = new AjaxTarifaAdministracion();
    $editar -> idTarAdm = $_POST["idTarAdm"];
    $editar -> ajaxEditarTarAdm();

}


/*==================================
ACTIVAR TARIFA AFILIACION
==================================*/

if(isset($_POST["activarTarAdm"])){

    $activarAdm = new AjaxTarifaAdministracion();
    $activarAdm -> activarTarAdm = $_POST["activarTarAdm"];
    $activarAdm -> activarTarId = $_POST["activarTarId"];
    $activarAdm -> ajaxActivarTarAdm();

}

/*==================================
VALIDAR NO REPETIR NOMBRE TARIFA AFILIACION
==================================*/

if(isset($_POST["validarNombre"])){

    $valNombre = new AjaxTarifaAdministracion();
    $valNombre -> validarNombre = $_POST["validarNombre"];
    $valNombre -> ajaxValidarNombre();

}

