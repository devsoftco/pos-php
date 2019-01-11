<?php

require_once "../controladores/ibc.controlador.php";
require_once "../modelos/ibc.modelo.php";

class AjaxIbc{

    /*==================================
    EDITANDO IBC
    ==================================*/

    static public $idIbc;

    public function ajaxEditarIbc(){

        $item = "id";
        $valor = $this->idIbc;

        $respuesta = ControladorIbc::ctrMostrarIbc($item, $valor);

        echo json_encode($respuesta);

    }

    /*==================================
    ACTIVAR IBC
    ==================================*/

    static public $activarIbc;
    static public $activarIbcId;

    public function ajaxActivarIbc(){


        $tabla = "ibc";

        $item1 = "estado";
        $valor1 = $this->activarIbc;

        $item2 = "id";
        $valor2 = $this->activarIbcId;


        $respuesta = ModeloIbc::mdlActualizarIbc($tabla, $item1, $valor1, $item2, $valor2);

    }


}

/*==================================
EDITAR IBC
==================================*/

if(isset($_POST["idIbc"])){

    $editar = new AjaxIbc();
    $editar -> idIbc = $_POST["idIbc"];
    $editar -> ajaxEditarIbc();

}


/*==================================
ACTIVAR IBC
==================================*/

if(isset($_POST["activarIbc"])){

    $activarIbc= new AjaxIbc();
    $activarIbc-> activarIbc = $_POST["activarIbc"];
    $activarIbc-> activarIbcId = $_POST["activarIbcId"];
    $activarIbc-> ajaxActivarIbc();

}


