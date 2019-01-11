<?php

require_once "conexion.php";

class ModeloAfiliaciones{

    /*=============================================
	MOSTRAR AFILIACIONES
	=============================================*/

	static public function MdlMostrarAfiliaciones($tabla, $itemAfiliaciones, $valorAfiliaciones){

		if($itemAfiliaciones != null){

            //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt = Conexion::conectar()->prepare("SELECT a.id, CONCAT(c.nombres,' ',c.apellido_paterno,' ',c.apellido_materno) as afiliado, 
            CONCAT(c.tipo_documento,' ',c.numero_documento) as documento, t2.estado, eps.nombre as eps, IFNULL(arl.nombre, 'NO TIENE') as arl, IFNULL(tipo_arl.nombre, 'NO TIENE') as tipo_arl, 
            IFNULL(afp.nombre,'NO TIENE') as afp, IFNULL(ccf.nombre, 'NO TIENE') as ccf, IFNULL(b.id, 'NO TIENE') as beneficiario_id, a.id as afiliacion_id, a.usuario_id, usu.nombre as usuario,t2.tarifa
                                            FROM $tabla as a 
                                            LEFT JOIN (SELECT * FROM estado_afiliaciones 
                                            WHERE id IN (SELECT MAX(id) FROM estado_afiliaciones GROUP BY afiliaciones_id) ) as t2 
                                            ON t2.afiliaciones_id = a.id LEFT JOIN afiliados as c ON c.id = a.afiliado_id 
                                            LEFT JOIN beneficiarios as b ON b.afiliado_id = c.id 
                                            LEFT JOIN eps as eps ON eps.id = a.eps_id
                                            LEFT JOIN arl as arl ON arl.id = a.arl_id
                                            LEFT JOIN arl_tarifas as tipo_arl ON tipo_arl.id = a.arl_tarifas_id
                                            LEFT JOIN afp as afp ON afp.id = a.afp_id
                                            LEFT JOIN caja_compensaciones as ccf ON ccf.id = a.caja_compensaciones_id
                                            LEFT JOIN usuarios as usu ON usu.id = a.usuario_id
                                            WHERE a.$itemAfiliaciones = :$itemAfiliaciones");
            
			$stmt -> bindParam(":".$itemAfiliaciones, $valorAfiliaciones, PDO::PARAM_STR);

			$stmt -> execute();

        	return $stmt -> fetch();

		}else{

            //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt = Conexion::conectar()->prepare("SELECT c.id, CONCAT(c.nombres,' ',c.apellido_paterno,' ',c.apellido_materno) as afiliado, 
            CONCAT(c.tipo_documento,' ',c.numero_documento) as documento, t2.estado, eps.nombre as eps, IFNULL(arl.nombre, 'NO TIENE') as arl, 
            IFNULL(tipo_arl.nombre, 'NO TIENE') as tipo_arl, IFNULL(afp.nombre, 'NO TIENE') as afp, IFNULL(ccf.nombre, 'NO TIENE') as ccf, IFNULL(b.id, 'NO TIENE') as beneficiario_id, a.id as afiliacion_id,
            a.usuario_id, usu.nombre as usuario,t2.tarifa
                                            FROM $tabla as a 
                                            LEFT JOIN (SELECT * FROM estado_afiliaciones 
                                            WHERE id IN (SELECT MAX(id) FROM estado_afiliaciones GROUP BY afiliaciones_id) ) as t2 
                                            ON t2.afiliaciones_id = a.id LEFT JOIN afiliados as c ON c.id = a.afiliado_id 
                                            LEFT JOIN beneficiarios as b ON b.afiliado_id = c.id 
                                            LEFT JOIN eps as eps ON eps.id = a.eps_id
                                            LEFT JOIN arl as arl ON arl.id = a.arl_id
                                            LEFT JOIN arl_tarifas as tipo_arl ON tipo_arl.id = a.arl_tarifas_id
                                            LEFT JOIN afp as afp ON afp.id = a.afp_id
                                            LEFT JOIN caja_compensaciones as ccf ON ccf.id = a.caja_compensaciones_id
                                            LEFT JOIN usuarios as usu ON usu.id = a.usuario_id
                                            GROUP BY c.id");

			$stmt -> execute();

        	return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }
    


    /*=============================================
	MOSTRAR ID AFILIADO
	=============================================*/

	static public function MdlMostrarIdAfiliado($tabla, $item, $valor){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();


    $stmt -> close();

    $stmt = null;

}

    /*===========================================
    CREAR AFILIACION
    ===========================================*/

    static public function mdlIngresarAfiliacion($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(afiliado_id, profesion, tipo_riesgo,
                                        eps_id, arl_id, afp_id, empresa_afi_id,
                                        empresa_apo_id, usuario_id) VALUES (:afiliado_id,
                                        :profesion, :tipo_riesgo, :eps_id,
                                        :arl_id, :afp_id, :empresa_afi_id, :empresa_apo_id, :usuario_id)");

        $stmt->bindParam(":afiliado_id", $datos["afiliado_id"], PDO::PARAM_STR);
        $stmt->bindParam(":profesion", $datos["profesion"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_riesgo", $datos["tipo_riesgo"], PDO::PARAM_STR);
        $stmt->bindParam(":eps_id", $datos["eps_id"], PDO::PARAM_STR);
        $stmt->bindParam(":arl_id", $datos["arl_id"], PDO::PARAM_STR);
        $stmt->bindParam(":afp_id", $datos["afp_id"], PDO::PARAM_STR);
        $stmt->bindParam(":empresa_afi_id", $datos["empresa_afi_id"], PDO::PARAM_STR);
        $stmt->bindParam(":empresa_apo_id", $datos["empresa_apo_id"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario_id", $datos["usuario_id"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }
        $stmt->close();

        $stmt = null;

    }

    /*===========================================
    CREAR RETIRO AFILIACION
    ===========================================*/

    static public function mdlIngresarRetiroAfiliacion($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(estado, fecha_retiro, motivo,
                                        texto_adicional, afiliaciones_id, usuarios_id) VALUES ('0',
                                        :fecha_retiro, :motivo, :texto_adicional, :afiliaciones_id,
                                        :usuarios_id)");

        $stmt->bindParam(":fecha_retiro", $datos["fecha_retiro"], PDO::PARAM_STR);
        $stmt->bindParam(":motivo", $datos["motivo"], PDO::PARAM_STR);
        $stmt->bindParam(":texto_adicional", $datos["texto_adicional"], PDO::PARAM_STR);
        $stmt->bindParam(":afiliaciones_id", $datos["afiliaciones_id"], PDO::PARAM_STR);
        $stmt->bindParam(":usuarios_id", $datos["usuarios_id"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }
        $stmt->close();

        $stmt = null;

    }

    /*===========================================
    CREAR ACTIVACION DE AFILIACION
    ===========================================*/

    static public function mdlIngresarActivacion($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(estado, motivo, texto_adicional, fecha_afiliacion, tarifa,
                                        afiliaciones_id, usuarios_id) VALUES ('1', 'AFILIACION',
                                        :texto_adicional, :fecha_afiliacion, :tarifa, :afiliaciones_id,
                                        :usuarios_id)");
        $stmt->bindParam(":texto_adicional", $datos["texto_adicional"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_afiliacion", $datos["fecha_afiliacion"], PDO::PARAM_STR);
        $stmt->bindParam(":tarifa", $datos["tarifa"], PDO::PARAM_STR);
        $stmt->bindParam(":afiliaciones_id", $datos["afiliaciones_id"], PDO::PARAM_STR);
        $stmt->bindParam(":usuarios_id", $datos["usuarios_id"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }
        $stmt->close();

        $stmt = null;

    }

    /*===========================================
    CREAR PAGO AFILIACIÓN
    ===========================================*/

    static public function mdlCrearPagoAfiliacion($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado_pago = 1
                                                    WHERE afiliaciones_id = :afiliaciones_id");

        $stmt->bindParam(":afiliaciones_id", $datos["afiliaciones_id"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();

		$stmt = null;
    }

    /*===========================================
    EDITAR AFILIADO
    ===========================================*/

    static public function mdlEditarAfiliado($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombres = :nombres, apellido_paterno = :apellido_paterno, apellido_materno = :apellido_materno, 
                                                    tipo_documento = :tipo_documento, 
                                                    email = :email, celular = :celular, telefono = :telefono, direccion = :direccion,
                                                    barrio = :barrio, departamento = :departamento, fecha_nacimiento = :fecha_nacimiento, cedula = :cedula, tipo_afiliado = :tipo_afiliado
                                                    WHERE numero_documento = :numero_documento");

		$stmt -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt -> bindParam(":apellido_paterno", $datos["apellido_paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido_materno", $datos["apellido_materno"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_documento", $datos["tipo_documento"], PDO::PARAM_STR);
        //$stmt->bindParam(":numero_documento", $datos["numero_documento"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":barrio", $datos["barrio"], PDO::PARAM_STR);
        $stmt->bindParam(":departamento", $datos["departamento"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":cedula", $datos["cedula"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_afiliado", $datos["tipo_afiliado"], PDO::PARAM_STR);
        $stmt->bindParam(":numero_documento", $datos["numero_documento"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();

		$stmt = null;
    }

    /*=============================================
	ACTUALIZAR ESTADO AFILIADO
	=============================================*/

	static public function mdlActualizarAfiliacion($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();

		$stmt = null;

    }

    /*=============================================
	BORRAR AFILIADO
	=============================================*/

	static public function mdlBorrarAfiliado($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


    }
    
    /*=============================================
	CANTIDAD AFILIACIONES ACTIVAS
	=============================================*/

	static public function MdlCantidadAfiliaciones($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(t2.estado) as total_afiliaciones FROM $tabla as a LEFT JOIN 
                                            (SELECT * FROM estado_afiliaciones WHERE id IN (SELECT MAX(id) FROM estado_afiliaciones GROUP BY afiliaciones_id) ) as t2 
                                            ON t2.afiliaciones_id = a.id LEFT JOIN afiliados as c ON c.id = a.afiliado_id WHERE t2.estado = 1");

        $stmt -> execute();
        

        return $stmt -> fetch();
        
        $stmt -> close();

        $stmt = null;
		



    }
    
    /*=============================================
	RANGO FECHAS
	=============================================*/	

	static public function mdlRangoFechasAfiliaciones($tabla, $fechaInicial, $fechaFinal){

		if($fechaInicial == null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

			$stmt -> execute();

			return $stmt -> fetchAll();	


		}else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFinal%'");

			$stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal'");

			}
		
			$stmt -> execute();

			return $stmt -> fetchAll();

		}

    }

    /*=============================================
	MOSTRAR CANTIDAD DE AFILIADOS POR EPS
	=============================================*/

	static public function MdlMostrarAfiliacionesPorEps($tabla, $item, $valor){

		if($item != null){

            //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt = Conexion::conectar()->prepare("SELECT COUNT(afi.eps_id) as eps, eps.nombre
            FROM $tabla as afi
            LEFT JOIN eps as eps ON eps.id = afi.eps_id 
            LEFT JOIN estado_afiliaciones as es ON es.afiliaciones_id = afi.id
            WHERE es.estado = 1
            GROUP BY afi.eps_id");
            
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

        	return $stmt -> fetch();

		}else{

            //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt = Conexion::conectar()->prepare("SELECT COUNT(afi.eps_id) as eps, eps.nombre as nombre
            FROM $tabla as afi
            LEFT JOIN eps as eps ON eps.id = afi.eps_id 
            LEFT JOIN estado_afiliaciones as es ON es.afiliaciones_id = afi.id
            WHERE es.estado = 1
            GROUP BY afi.eps_id");

			$stmt -> execute();

        	return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }
    
    



}