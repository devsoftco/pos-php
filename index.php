<?php

require_once "controladores/usuarios.controlador.php";
require_once "controladores/plantilla.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/afiliados.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/eps.controlador.php";
require_once "controladores/arl.controlador.php";
require_once "controladores/arl-tarifas.controlador.php";
require_once "controladores/tarifa-afiliacion.controlador.php";
require_once "controladores/tarifa-administracion.controlador.php";
require_once "controladores/afp.controlador.php";
require_once "controladores/ibc.controlador.php";
require_once "controladores/empresas-af.controlador.php";
require_once "controladores/empresas-ap.controlador.php";
require_once "controladores/beneficiarios.controlador.php";
require_once "controladores/profesiones.controlador.php";
require_once "controladores/tipo-afiliado.controlador.php";
require_once "controladores/crear-afiliacion.controlador.php";
require_once "controladores/afiliaciones.controlador.php";
require_once "controladores/caja-compensaciones.controlador.php";
require_once "controladores/aportes.controlador.php";




require_once "modelos/categorias.modelo.php";
require_once "modelos/afiliados.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/eps.modelo.php";
require_once "modelos/arl.modelo.php";
require_once "modelos/arl-tarifas.modelo.php";
require_once "modelos/tarifa-afiliacion.modelo.php";
require_once "modelos/tarifa-administracion.modelo.php";
require_once "modelos/afp.modelo.php";
require_once "modelos/ibc.modelo.php";
require_once "modelos/empresas-af.modelo.php";
require_once "modelos/empresas-ap.modelo.php";
require_once "modelos/beneficiarios.modelo.php";
require_once "modelos/profesiones.modelo.php";
require_once "modelos/crear-afiliacion.modelo.php";
require_once "modelos/tipo-afiliado.modelo.php";
require_once "modelos/afiliaciones.modelo.php";
require_once "modelos/caja-compensaciones.modelo.php";
require_once "modelos/aportes.modelo.php";

require_once "extensiones/vendor/autoload.php";



$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();