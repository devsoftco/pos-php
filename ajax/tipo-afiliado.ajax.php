<?php

require_once "../controladores/tipo-afiliado.controlador.php";
require_once "../modelos/tipo-afiliado.modelo.php";

class AjaxTipoAfiliados{

    /*==================================
    EDITANDO TIPO AFILIADO
    ==================================*/

    static public $idTipo;

    public function ajaxEditarTipoAfiliado(){

        $item = "id";
        $valor = $this->idTipo;

        $respuesta = ControladorTipoAfiliados::ctrMostrarTipoAfiliados($item, $valor);

        echo json_encode($respuesta);

    }

    /*==================================
    ACTIVAR TIPO AFILIADO
    ==================================*/

    static public $activarTipo;
    static public $activarTipoId;

    public function ajaxActivarTipoAfiliado(){


        $tabla = "tipo_afiliados";

        $item1 = "estado";
        $valor1 = $this->activarTipo;

        $item2 = "id";
        $valor2 = $this->activarTipoId;


        $respuesta = ModeloTipoAfiliados::mdlActualizarTipoAfiliado($tabla, $item1, $valor1, $item2, $valor2);

    }

    /*==================================
    VALIDAR NO REPETIR NOMBRE TIPO AFILIADO
    ==================================*/

    static public $validarNombre;

    public function ajaxValidarNombre(){


        $item = "nombre";
        $valor = $this->validarNombre;

        $respuesta = ControladorTipoAfiliados::ctrMostrarTipoAfiliados($item, $valor);

        echo json_encode($respuesta);

    }

}

/*==================================
EDITAR TIPO AFILIADO
==================================*/

if(isset($_POST["idTipo"])){

    $editar = new AjaxTipoAfiliados();
    $editar -> idTipo = $_POST["idTipo"];
    $editar -> ajaxEditarTipoAfiliado();

}


/*==================================
ACTIVAR TIPO AFILIADO
==================================*/

if(isset($_POST["activarTipo"])){

    $activarTipo = new AjaxTipoAfiliados();
    $activarTipo -> activarTipo = $_POST["activarTipo"];
    $activarTipo -> activarTipoId = $_POST["activarTipoId"];
    $activarTipo -> ajaxActivarTipoAfiliado();

}

/*==================================
VALIDAR NO REPETIR NOMBRE TIPO AFILIADO
==================================*/

if(isset($_POST["validarNombreTipo"])){

    $valNombre = new AjaxTipoAfiliados();
    $valNombre -> validarNombre = $_POST["validarNombreTipo"];
    $valNombre -> ajaxValidarNombre();

}

