<?php

require_once "../../../controladores/aportes.controlador.php";
require_once "../../../modelos/aportes.modelo.php";

class imprimirAporte{

public $pagoApo;

public function traerImpresionAporte(){

//TRAEMOS LA INFORMACION DE PAGO LA AFILIACIÓN

$item = "id";
$valor = $this->pagoApo;

$respuestaPago= ControladorAportes::ctrMostrarEstadoAportesPagados($item, $valor);

$idPago = $respuestaPago["id"];
$afiliado = $respuestaPago["afiliado"];
$identificacion = $respuestaPago["documento"];
$tarifa = number_format($respuestaPago["total_pagado"],2);
$fecha_pago = substr($respuestaPago["fecha_pago"],0,-8);
$eps = $respuestaPago["eps"];
$arl = $respuestaPago["arl"];
$tipo_arl = $respuestaPago["tipo_arl"];
$afp = $respuestaPago["afp"];
$ccf = $respuestaPago["ccf"];
$periodo = date("m/Y", strtotime($respuestaPago["periodo"]))  ;
$metodoPago = $respuestaPago["metodo_pago"];
$asesor = $respuestaPago["asesor"];


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

				<br>
				ASESORIAS Y TRÁMITES EN 
				SEGURIDAD SOCIAL
			
				<br><br>
				NIT: 1.094.908.658

				<br>
				
				recursosinima@outlook.com

				<br>
				Teléfono: 310 371 8797

				<br>
				RECIBO N.$idPago

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
	
		<td style="width:160px;">

			<div>

				<br>					
				Afiliado: $afiliado

				<br>					
				Documento: $identificacion

				<br><br>
				Asesor: $asesor

				<br><br>
				Fecha Pago: $fecha_pago
				<br>
				Periodo Pagado: $periodo
				<br><br>


			</div>

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

</table>



EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

//--------------------------------------------------------------------------------

$bloque4 = <<<EOF

<table style="font-size:9px; text-align:center">

	<tr>

		<td style="width:160px;">

			<div>

				<br>					
				==Comprobante de pago Aporte==

				<br>					
				Documento: $identificacion

				<br><br>

			</div>

		</td>
		

	</tr>

</table>



EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');


//--------------------------------------------------------------------------------

//SALIDA DEL ARCHIVO

$pdf->Output('aporte.'.$identificacion.'.pdf');

}

}

$aporte = new imprimirAporte();
$aporte -> pagoApo = $_GET["pagoApo"];
$aporte -> traerImpresionAporte();

?>
 