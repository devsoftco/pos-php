<?php

require_once "../controladores/crear-afiliacion.controlador.php";
require_once "../modelos/crear-afiliacion.modelo.php";

class AjaxCrearAfiliaciones{

    /*==================================
    EDITAR AFILIADO
    ==================================*/

    static public $idAfiliado;

    public function ajaxEditarCrearAfiliacion(){

        $item = "id";
        $valor = $this->idAfiliado;

        $respuesta = ControladorAfiliados::ctrMostrarAfiliados($item, $valor);

        echo json_encode($respuesta);

        

    }

}

/*==================================
EDITAR AFILIADO
==================================*/

if(isset($_POST["idAfiliado"])){

    $editar = new AjaxCrearAfiliaciones();
    $editar -> idAfiliado = $_POST["idAfiliado"];
    $editar -> ajaxEditarCrearAfiliacion();

}