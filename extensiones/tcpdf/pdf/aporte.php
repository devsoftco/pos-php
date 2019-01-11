<?php

require_once "../../../controladores/aportes.controlador.php";
require_once "../../../modelos/aportes.modelo.php";

require_once "../../../controladores/afiliaciones.controlador.php";
require_once "../../../modelos/afiliaciones.modelo.php";

class imprimirAporte{

public $pagoApo;

public function traerImpresionAporte(){

//TRAEMOS LA INFORMACION DE PAGO LA AFILIACIÓN

$item = "id";
$valor = $this->pagoApo;

$respuestaPago= ControladorAportes::ctrMostrarEstadoAportes($item, $valor);

$idPago = $respuestaPago["id"];
$afiliado = $respuestaPago["afiliado"];
$tarifa = number_format($respuestaPago["total_pagado"],2);
$fecha_pago = substr($respuestaPago["fecha_pago"],0,-8);
$afiliacion = $respuestaPago["afiliaciones_id"];
$eps = $respuestaPago["eps"];
$arl = $respuestaPago["arl"];
$tipo_arl = $respuestaPago["tipo_arl"];
$afp = $respuestaPago["afp"];
$ccf = $respuestaPago["ccf"];
$periodo = $respuestaPago["periodo"];
$metodoPago = $respuestaPago["metodo_pago"];
$asesor = $respuestaPago["asesor"];

//TRAEMOS LA INFORMACION DE LA AFILIACION
$itemAfiliaciones = "id";
$valorAfiliaciones = $respuestaPago["afiliaciones_id"];

$respuesta= ControladorAfiliaciones::ctrMostrarAfiliaciones($itemAfiliaciones, $valorAfiliaciones);

$ejecutivo = $respuesta["usuario"];



require_once('tcpdf_include.php');

//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage('P', 'A7');

// ---------------------------------------------------------

$bloque1 = <<<EOF

    <table style="font-size:9px; text-align:center">

	    <tr>
		
		    <td style="width:160px;">
	
			    <div>
			
				    Fecha: $fecha_pago

				    <br><br>
				    INIMA  S.A.S.
				
				    <br>
				    NIT: 900.807.128-3

                    <br>
                    
                    recursosinima@outlook.com

                    <br>
				    Teléfono: 310 371 8797

				    <br>
				    RECIBO N.$idPago

				    <br><br>					
				    Afiliado: $afiliado

				    <br>
				    Asesor: $asesor

				    <br>

			    </div>

		    </td>

	    </tr>


    </table>


EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');
    
// ---------------------------------------------------------


$bloque2 = <<<EOF

<table style="font-size:9px; text-align:left">

	<tr>
	
		<td style="width:80px; ">
             Fecha Pago: 
        </td>
        
        <td style="width:80px; ">
             $fecha_pago
        </td>

    </tr>
    
    <tr>
    
    <td style="width:80px; ">
         Periodo Pago: 
    </td>
    
    <td style="width:80px; ">
         $periodo
         <br><br><br>
    </td>

</tr>


</table>



EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');


//--------------------------------------------------------------------------------

$bloque3 = <<<EOF

<table style="font-size:9px; text-align:right">

	<tr>
	
		<td style="width:80px;">
			 E.P.S.: 
		</td>

		<td style="width:80px;">
			$eps
		</td>

	</tr>

	<tr>
	
		<td style="width:80px;">
			 A.R.L.: 
		</td>

		<td style="width:80px;">
			$arl, $tipo_arl
		</td>

    </tr>
    
    <tr>
	
        <td style="width:80px;">
            A.F.P.: 
        </td>

        <td style="width:80px;">
            $afp
        </td>

    </tr>

    <tr>
	
        <td style="width:80px;">
            C.C.F.: 
        </td>

        <td style="width:80px;">
            $ccf
        </td>

    </tr>

	<tr>
	
		<td style="width:160px;">
			 --------------------------
		</td>

	</tr>

	<tr>
	
		<td style="width:80px;">
			 TOTAL: 
		</td>

		<td style="width:80px;">
			$ $tarifa
		</td>

	</tr>

	<tr>
	
		<td style="width:160px;">
			<br>
			<br>
			Comprobante de pago Aporte
		</td>

	</tr>

</table>



EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

//--------------------------------------------------------------------------------

//SALIDA DEL ARCHIVO

$pdf->Output('aporte.pdf');

}

}

$aporte = new imprimirAporte();
$aporte -> pagoApo = $_GET["pagoApo"];
$aporte -> traerImpresionAporte();

?>
 