<?php

require_once "../controladores/empresas-af.controlador.php";
require_once "../modelos/empresas-af.modelo.php";

class AjaxEmpresasAf{

    /*==================================
    EDITANDO EMPRESA
    ==================================*/

    static public $idEmp;

    public function ajaxEditarEmpresa(){

        $item = "id";
        $valor = $this->idEmp;

        $respuesta = ControladorEmpresasAf::ctrMostrarEmpresas($item, $valor);

        echo json_encode($respuesta);

    }

    /*==================================
    ACTIVAR EMPRESA
    ==================================*/

    static public $activarEmp;
    static public $activarId;

    public function ajaxActivarEmpresa(){


        $tabla = "empresas_afi";

        $item1 = "estado";
        $valor1 = $this->activarEmp;

        $item2 = "id";
        $valor2 = $this->activarId;


        $respuesta = ModeloEmpresasAf::mdlActualizarEmpresa($tabla, $item1, $valor1, $item2, $valor2);

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
EDITAR EMPRESA
==================================*/

if(isset($_POST["idEmp"])){

    $editar = new AjaxEmpresasAf();
    $editar -> idEmp = $_POST["idEmp"];
    $editar -> ajaxEditarEmpresa();

}


/*==================================
ACTIVAR EMPRESA
==================================*/

if(isset($_POST["activarEmp"])){

    $activarEmp = new AjaxEmpresasAf();
    $activarEmp -> activarEmp = $_POST["activarEmp"];
    $activarEmp -> activarId = $_POST["activarId"];
    $activarEmp -> ajaxActivarEmpresa();

}

/*==================================
VALIDAR NO REPETIR CODIGO
==================================*/

if(isset($_POST["validarCodigo"])){

    $valCodigo = new AjaxEmpresasAf();
    $valCodigo -> validarCodigo = $_POST["validarCodigo"];
    $valCodigo -> ajaxValidarCodigo();

}

