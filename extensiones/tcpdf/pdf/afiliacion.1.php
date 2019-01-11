<?php

require_once "../../../controladores/aportes.controlador.php";
require_once "../../../modelos/aportes.modelo.php";

require_once "../../../controladores/afiliaciones.controlador.php";
require_once "../../../modelos/afiliaciones.modelo.php";

class imprimirAfiliacion{

public $pagoAfi;

public function traerImpresionAfiliacion(){

//TRAEMOS LA INFORMACION DE PAGO LA AFILIACIÓN

$item = "id";
$valor = $this->pagoAfi;

$respuestaPago= ControladorAportes::ctrMostrarEstadoAfi($item, $valor);

$idPago = $respuestaPago["id"];
$tarifa = number_format($respuestaPago["tarifa"],2);
$fecha_afiliacion = $respuestaPago["fecha_afiliacion"];
$fecha_pago = substr($respuestaPago["fecha"],0,-8);
$afiliacion = $respuestaPago["afiliaciones_id"];

//TRAEMOS LA INFORMACION DE LA AFILIACION
$itemAfiliaciones = "id";
$valorAfiliaciones = $respuestaPago["afiliaciones_id"];

$respuesta= ControladorAfiliaciones::ctrMostrarAfiliaciones($itemAfiliaciones, $valorAfiliaciones);

$eps = $respuesta["eps"];
$arl = $respuesta["arl"];
$tipo_arl = $respuesta["tipo_arl"];
$afp = $respuesta["afp"];
$ccf = $respuesta["ccf"];
$total = number_format($respuesta["tarifa"],2);
$ejecutivo = $respuesta["usuario"];



require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->startPageGroup();

$pdf->AddPage();

$bloque1 = <<<EOF

    <table>

        <tr>

            <td style="width:150px"><img src="images/logo-negro-bloque-inima.jpg"></td>

            <td style="background-color:white; width:140px">

                <div style="font-size:8.5px; text-align:right; line-height:15px;">
                
                <br>
                NIT: XX.XXX.XXX-X
                <br>
                Dirección: Cra 40 #51-41

                </div>

            </td>

            <td style="background-color:white; width:150px">

                <div style="font-size:8.5px; text-align:right; line-height:15px;">

                <br>
                Contacto: 310 371 8797

                <br>
                recursosinima@outlook.com

                </div>

            </td>

            <td style="background-color:white; width:100px; text-align:center; color:red"><br><br>
                RECIBO N.<br>$idPago</td>


        </tr>

    </table>

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

//--------------------------------------------------------------------------------

$bloque2 = <<<EOF

    <table>

        <tr>

            <td style="width:540px"><img src="images/back.jpg"></td>

        </tr>

    </table>

    <table style="font-size:10px; padding:5px 10px;">

        <tr>

            <td style="background-color:white; width:350px">Afiliado: $respuesta[afiliado]</td>

            <td style="background-color:white; width:190px; text-align:right">Fecha Afiliación: $fecha_afiliacion</td>

        </tr>

        <tr>

            <td style="background-color:white; width:350px;">Ejecutivo: $ejecutivo</td>

            <td style="background-color:white; width:190px; text-align:right">Fecha Pago: $fecha_pago</td>
        
        </tr>

    </table>


EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

//--------------------------------------------------------------------------------

$bloque3 = <<<EOF

    <table style="font-size:10px; padding:5px 10px;">

        <tr>

            <td style="background-color:white; width:540px;"></td>
            
       </tr>

        <tr>

            <td style="border: 1px solid #666; background-color:white; width:540px; text-align:center">Afiliado a:</td>
            
       </tr>

    <tr>
       <td style="border: 1px solid #666; background-color:white; width:540px; text-align:left">E.P.S.: $eps</td>

    </tr>

    <tr>
        <td style="border: 1px solid #666; background-color:white; width:540px; text-align:left">A.R.L.: $arl, $tipo_arl</td>

    </tr>

    <tr>

        <td style="border: 1px solid #666; background-color:white; width:540px; text-align:left">A.F.P.: $afp</td>

    </tr>

    <tr>

        <td style="border: 1px solid #666; background-color:white; width:540px; text-align:left">C.C.F.: $ccf</td>

    </tr>

    <tr>

        <td style="background-color:white; width:540px; text-align:left"></td>

    </tr>

    <tr>

        <td style=" background-color:white; width:140px; text-align:left"> Método de Pago:</td>

        <td style="background-color:white; width:200px; text-align:left">$tarifa</td>

        <td style="border: 1px solid #666; background-color:white; width:100px; text-align:center"> Total a Pagar:</td>

        <td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center">$ $tarifa</td>

    </tr>

    </table>


EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

//--------------------------------------------------------------------------------

//SALIDA DEL ARCHIVO

$pdf->Output('afiliacion.pdf');

}

}

$afiliacion = new imprimirAfiliacion();
$afiliacion -> pagoAfi = $_GET["pagoAfi"];
$afiliacion -> traerImpresionAfiliacion();

?>
 