<?php

require_once "../controladores/beneficiarios.controlador.php";
require_once "../modelos/beneficiarios.modelo.php";

class AjaxBeneficiarios{

    /*==================================
    EDITAR BENEFICIARIO
    ==================================*/

    static public $idBeneficiario;

    public function ajaxEditarBeneficiario(){

        $item = "id";
        $valor = $this->idBeneficiario;

        $respuesta = ControladorBeneficiarios::ctrMostrarBeneficiarios($item, $valor);

        echo json_encode($respuesta);

    }

    /*==================================
    AGREGAR ID AFILIADO 
    ==================================*/

    static public $idAfiliado;

    public function ajaxAgregarIdAfiliado(){

        $item = "id";
        $valor = $this->idAfiliado;

        $respuesta = ControladorBeneficiarios::ctrMostrarIdAfiliado($item, $valor);

        echo json_encode($respuesta);

    }

    /*==================================
    ACTIVAR BENEFICIARIO
    ==================================*/

    static public $activarBeneficiario;
    static public $activarId;

    public function ajaxActivarBeneficiario(){


        $tabla = "beneficiarios";

        $item1 = "estado";
        $valor1 = $this->activarBeneficiario;

        $item2 = "id";
        $valor2 = $this->activarId;


        $respuesta = ModeloBeneficiarios::mdlActualizarBeneficiario($tabla, $item1, $valor1, $item2, $valor2);

    }

    /*==================================
    VALIDAR NO REPETIR BENEFICIADO
    ==================================*/

    static public $validarBeneficiario;

    public function ajaxValidarBeneficiario(){


        $item = "numero_documento";
        $valor = $this->validarBeneficiario;

        $respuesta = ControladorBeneficiarios::ctrMostrarBeneficiarios($item, $valor);

        echo json_encode($respuesta);

    }

}

/*==================================
EDITAR BENEFICIARIO
==================================*/

if(isset($_POST["idBeneficiario"])){

    $editar = new AjaxBeneficiarios();
    $editar -> idBeneficiario = $_POST["idBeneficiario"];
    $editar -> ajaxEditarBeneficiario();

}

/*==================================
AGREGAR ID AFILIADO 
==================================*/

if(isset($_POST["idAfiliado"])){

    $agregar = new AjaxBeneficiarios();
    $agregar -> idAfiliado = $_POST["idAfiliado"];
    $agregar -> ajaxAgregarIdAfiliado();

}


/*==================================
ACTIVAR BENEFICIARIO
==================================*/

if(isset($_POST["activarBeneficiario"])){

    $activarBeneficiario = new AjaxBeneficiarios();
    $activarBeneficiario -> activarBeneficiario = $_POST["activarBeneficiario"];
    $activarBeneficiario -> activarId = $_POST["activarId"];
    $activarBeneficiario -> ajaxActivarBeneficiario();

}

/*==================================
VALIDAR NO REPETIR BENEFICIARIO
==================================*/

if(isset($_POST["validarBeneficiario"])){

    $valBeneficiario = new AjaxBeneficiarios();
    $valBeneficiario -> validarBeneficiario = $_POST["validarBeneficiario"];
    $valBeneficiario -> ajaxValidarBeneficiario();

}


