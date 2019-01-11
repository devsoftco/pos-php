<?php

require_once "../controladores/empresas-ap.controlador.php";
require_once "../modelos/empresas-ap.modelo.php";

class AjaxEmpresasAp{

    /*==================================
    EDITANDO EMPRESA
    ==================================*/

    static public $idEmp;

    public function ajaxEditarEmpresa(){

        $item = "id";
        $valor = $this->idEmp;

        $respuesta = ControladorEmpresasAp::ctrMostrarEmpresas($item, $valor);

        echo json_encode($respuesta);

    }

    /*==================================
    ACTIVAR EMPRESA
    ==================================*/

    static public $activarEmp;
    static public $activarId;

    public function ajaxActivarEmpresa(){


        $tabla = "empresas_apo";

        $item1 = "estado";
        $valor1 = $this->activarEmp;

        $item2 = "id";
        $valor2 = $this->activarId;


        $respuesta = ModeloEmpresasAp::mdlActualizarEmpresa($tabla, $item1, $valor1, $item2, $valor2);

    }

    /*==================================
    VALIDAR NO REPETIR NIT
    ==================================*/

    static public $validarNit;

    public function ajaxValidarNit(){


        $item = "nit";
        $valor = $this->validarNit;

        $respuesta = ControladorEmpresasAp::ctrMostrarEmpresas($item, $valor);

        echo json_encode($respuesta);

    }

}

/*==================================
EDITAR EMPRESA
==================================*/

if(isset($_POST["idEmp"])){

    $editar = new AjaxEmpresasAp();
    $editar -> idEmp = $_POST["idEmp"];
    $editar -> ajaxEditarEmpresa();

}


/*==================================
ACTIVAR EMPRESA
==================================*/

if(isset($_POST["activarEmp"])){

    $activarEmp = new AjaxEmpresasAp();
    $activarEmp -> activarEmp = $_POST["activarEmp"];
    $activarEmp -> activarId = $_POST["activarId"];
    $activarEmp -> ajaxActivarEmpresa();

}

/*==================================
VALIDAR NO REPETIR NIT
==================================*/

if(isset($_POST["validarNit"])){

    $valNit = new AjaxEmpresasAp();
    $valNit -> validarNit = $_POST["validarNit"];
    $valNit -> ajaxValidarNit();

}

