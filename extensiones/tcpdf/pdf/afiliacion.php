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
				    Afiliado: $respuesta[afiliado]

				    <br>
				    Asesor: $ejecutivo

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
             Fecha Afiliación: 
        </td>
        
        <td style="width:80px; ">
             $fecha_afiliacion
             <br><br><br><br>
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
			Comprobante de pago Afiliación
		</td>

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
 