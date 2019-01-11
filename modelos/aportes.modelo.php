<?php

require_once "conexion.php";

class ModeloAportes{

    /*=============================================
	MOSTRAR ESTADO PAGO AFILIACION
	=============================================*/

	static public function MdlMostrarEstadoAfi($tabla, $item, $valor){

		if($item != null){

            //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

        	return $stmt -> fetch();

		}else{

            //$stmt = Conexion::conectar()->prepare("SELECT c.id, c.nombres, c.apellido_paterno, c.apellido_materno, c.tipo_documento,
                                                     //c.numero_documento, c.estado, c.cedula, c.celular, b.afiliado_id, a.id as afiliacion_id
                            //FROM $tabla as c 
            //LEFT JOIN beneficiarios as b ON c.id=b.afiliado_id 
            //LEFT JOIN afiliaciones as a ON a.afiliado_id = c.id");

            $stmt = Conexion::conectar()->prepare("SELECT est.id, CONCAT(a.nombres,' ',a.apellido_paterno,' ',a.apellido_materno) as afiliado, 
            CONCAT(a.tipo_documento,' ',a.numero_documento) as documento, DATE_FORMAT(est.fecha_afiliacion, '%d-%m-%Y') as fecha_afiliacion, t2.estado, c.id as afiliacion_id, t2.estado_pago, est.tarifa
            FROM $tabla as est 
            LEFT JOIN afiliaciones as c ON c.id = est.afiliaciones_id 
            LEFT JOIN afiliados as a ON a.id = c.afiliado_id
            LEFT JOIN (SELECT * FROM estado_afiliaciones 
            WHERE id IN (SELECT MAX(id) FROM estado_afiliaciones GROUP BY afiliaciones_id) ) as t2 
            ON t2.afiliaciones_id = c.id 
            WHERE t2.estado = 1
            GROUP BY a.id ORDER BY a.id DESC");

			$stmt -> execute();

        	return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }

    /*=============================================
	MOSTRAR ESTADO PAGO APORTES
	=============================================*/

	static public function MdlMostrarEstadoAportes($tabla, $item, $valor){

		if($item != null){

            //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt = Conexion::conectar()->prepare("SELECT est.id, CONCAT(a.nombres,' ',a.apellido_paterno,' ',a.apellido_materno) as afiliado, 
            CONCAT(a.tipo_documento,' ',a.numero_documento) as documento, t2.estado, c.id as afiliacion_id, t2.estado_pago, DATE(t3.fecha) as mes_pago, IF(MONTH(t3.fecha) != MONTH(CURDATE()), 0, 1) as pago_aporte, IFNULL(t3.id,0) as aporte_id, DAY(est.fecha_afiliacion) as dias_afiliacion,
tar_arl.tarifa as tarifa_arl, IFNULL(arl.nombre, 'NO TIENE') as arl, tar_arl.nombre as tipo_arl,
ROUND(tar_arl.tarifa/30) as tarifa_por_dia_arl, c.arl_id, c.arl_tarifas_id,
c.eps_id, eps.nombre as eps,
ROUND((tipo_afi.porcentaje_eps / 100) * c.tarifa_ibc) as tarifa_eps,
ROUND(((tipo_afi.porcentaje_eps / 100) * c.tarifa_ibc)/30)as tarifa_por_dia_eps,
c.afp_id, IFNULL(afp.nombre, 'NO TIENE') as afp,
ROUND ((tipo_afi.porcentaje_afp/100)*c.tarifa_ibc) as tarifa_afp,
ROUND(((tipo_afi.porcentaje_afp / 100) * c.tarifa_ibc)/30)as tarifa_por_dia_afp,
c.caja_compensaciones_id, IFNULL(ccf.nombre, 'NO TIENE') as ccf,
ROUND ((tipo_afi.porcentaje_ccf/100)*c.tarifa_ibc) as tarifa_ccf,
ROUND(((tipo_afi.porcentaje_ccf / 100) * c.tarifa_ibc)/30)as tarifa_por_dia_ccf,
adm_tar.tarifa as tarifa_administracion,
imp.tarifa as tarifa_cree,
c.tarifa_ibc, 
CONCAT(YEAR(NOW()),MONTH(NOW())-1) as periodo, IFNULL(t3.total_pagado, 0) as total_pagado, t3.fecha as fecha_pago, t3.metodo_pago, usuario.nombre as asesor
            FROM $tabla as est 
            LEFT JOIN afiliaciones as c ON c.id = est.afiliaciones_id 
            LEFT JOIN afiliados as a ON a.id = c.afiliado_id 
            LEFT JOIN (SELECT * FROM estado_afiliaciones WHERE id IN (SELECT MAX(id) FROM estado_afiliaciones WHERE estado = 1 	AND estado_pago = 1  GROUP BY afiliaciones_id) ) as t2 ON t2.afiliaciones_id = c.id 
            LEFT JOIN(SELECT * FROM aportes WHERE id IN (SELECT MAX(id) FROM aportes WHERE estado = 1  GROUP BY afiliaciones_id) ) as t3 ON t3.afiliaciones_id = c.id
            LEFT JOIN arl as arl ON arl.id = c.arl_id
            LEFT JOIN eps as eps ON eps.id = c.eps_id
            LEFT JOIN afp as afp ON afp.id = c.afp_id
            LEFT JOIN caja_compensaciones as ccf ON ccf.id = c.caja_compensaciones_id
            LEFT JOIN arl_tarifas as tar_arl ON tar_arl.id = c.arl_tarifas_id 
            LEFT JOIN tipo_afiliados as tipo_afi ON tipo_afi.id = c.tipo_afiliados_id
            LEFT JOIN administracion_tarifas as adm_tar ON adm_tar.id = c.administracion_tarifas_id
            LEFT JOIN usuarios as usuario ON usuario.id = t3.usuarios_id
	        LEFT JOIN impuestos_tarifa as imp ON imp.id = c.impuestos_tarifa_id 
            WHERE c.$item = :$item AND est.estado_pago = 1 AND t3.fecha IS NULL OR MONTH(CURDATE()) = MONTH(t3.fecha)+1");
            
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

        	return $stmt -> fetch();

		}else{

            //$stmt = Conexion::conectar()->prepare("SELECT c.id, c.nombres, c.apellido_paterno, c.apellido_materno, c.tipo_documento,
                                                     //c.numero_documento, c.estado, c.cedula, c.celular, b.afiliado_id, a.id as afiliacion_id
                            //FROM $tabla as c 
            //LEFT JOIN beneficiarios as b ON c.id=b.afiliado_id 
            //LEFT JOIN afiliaciones as a ON a.afiliado_id = c.id");

            $stmt = Conexion::conectar()->prepare("SELECT est.id, CONCAT(a.nombres,' ',a.apellido_paterno,' ',a.apellido_materno) as afiliado, 
            CONCAT(a.tipo_documento,' ',a.numero_documento) as documento, t2.estado, c.id as afiliacion_id, t2.estado_pago, DATE(t3.fecha) as mes_pago, IF(MONTH(t3.fecha) != MONTH(CURDATE()), 0, 1) as pago_aporte, IFNULL(t3.id,0) as aporte_id, DAY(est.fecha_afiliacion) as dias_afiliacion,
tar_arl.tarifa as tarifa_arl, IFNULL(arl.nombre, 'NO TIENE') as arl, tar_arl.nombre as tipo_arl,
ROUND(tar_arl.tarifa/30) as tarifa_por_dia_arl, c.arl_id, c.arl_tarifas_id,
c.eps_id, eps.nombre as eps,
ROUND((tipo_afi.porcentaje_eps / 100) * c.tarifa_ibc) as tarifa_eps,
ROUND(((tipo_afi.porcentaje_eps / 100) * c.tarifa_ibc)/30)as tarifa_por_dia_eps,
c.afp_id, IFNULL(afp.nombre, 'NO TIENE') as afp,
ROUND ((tipo_afi.porcentaje_afp/100)*c.tarifa_ibc) as tarifa_afp,
ROUND(((tipo_afi.porcentaje_afp / 100) * c.tarifa_ibc)/30)as tarifa_por_dia_afp,
c.caja_compensaciones_id, IFNULL(ccf.nombre, 'NO TIENE') as ccf,
ROUND ((tipo_afi.porcentaje_ccf/100)*c.tarifa_ibc) as tarifa_ccf,
ROUND(((tipo_afi.porcentaje_ccf / 100) * c.tarifa_ibc)/30)as tarifa_por_dia_ccf,
adm_tar.tarifa as tarifa_administracion,
imp.tarifa as tarifa_cree,
c.tarifa_ibc, 
CONCAT(YEAR(NOW()),MONTH(NOW())-1) as periodo, IFNULL(t3.total_pagado,0) as total_pagado, t3.fecha as fecha_pago, t3.metodo_pago, usuario.nombre as asesor
            FROM $tabla as est 
            LEFT JOIN afiliaciones as c ON c.id = est.afiliaciones_id 
            LEFT JOIN afiliados as a ON a.id = c.afiliado_id 
            LEFT JOIN (SELECT * FROM estado_afiliaciones WHERE id IN (SELECT MAX(id) FROM estado_afiliaciones WHERE estado = 1 	AND estado_pago = 1  GROUP BY afiliaciones_id) ) as t2 ON t2.afiliaciones_id = c.id 
            LEFT JOIN(SELECT * FROM aportes WHERE id IN (SELECT MAX(id) FROM aportes WHERE estado = 1  GROUP BY afiliaciones_id) ) as t3 ON t3.afiliaciones_id = c.id
            LEFT JOIN arl as arl ON arl.id = c.arl_id
            LEFT JOIN eps as eps ON eps.id = c.eps_id
            LEFT JOIN afp as afp ON afp.id = c.afp_id
            LEFT JOIN caja_compensaciones as ccf ON ccf.id = c.caja_compensaciones_id
            LEFT JOIN arl_tarifas as tar_arl ON tar_arl.id = c.arl_tarifas_id 
            LEFT JOIN tipo_afiliados as tipo_afi ON tipo_afi.id = c.tipo_afiliados_id
            LEFT JOIN administracion_tarifas as adm_tar ON adm_tar.id = c.administracion_tarifas_id
            LEFT JOIN usuarios as usuario ON usuario.id = t3.usuarios_id
	        LEFT JOIN impuestos_tarifa as imp ON imp.id = c.impuestos_tarifa_id 
            WHERE est.estado_pago = 1 AND t3.fecha IS NULL OR MONTH(CURDATE()) = MONTH(t3.fecha)+1");

			$stmt -> execute();

        	return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }

    /*=============================================
	MOSTRAR ESTADO APORTES POR PAGAR
	=============================================*/

	static public function MdlMostrarAportesPorPagar($tabla, $item, $valor){

		if($item != null){

            //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt = Conexion::conectar()->prepare("SELECT est.id, CONCAT(a.nombres,' ',a.apellido_paterno,' ',a.apellido_materno) as afiliado, 
            CONCAT(a.tipo_documento,' ',a.numero_documento) as documento, t2.estado, c.id as afiliacion_id, t2.estado_pago, apo.id as aporte_id, DAY(est.fecha_afiliacion) as dias_afiliacion,
            tar_arl.tarifa as tarifa_arl,
            ROUND(tar_arl.tarifa/30) as tarifa_por_dia_arl, c.arl_id, c.arl_tarifas_id,
            c.eps_id,
            ROUND((tipo_afi.porcentaje_eps / 100) * c.tarifa_ibc) as tarifa_eps,
            ROUND(((tipo_afi.porcentaje_eps / 100) * c.tarifa_ibc)/30)as tarifa_por_dia_eps,
            c.afp_id,
            ROUND ((tipo_afi.porcentaje_afp/100)*c.tarifa_ibc) as tarifa_afp,
            ROUND(((tipo_afi.porcentaje_afp / 100) * c.tarifa_ibc)/30)as tarifa_por_dia_afp,
            c.caja_compensaciones_id,
            ROUND ((tipo_afi.porcentaje_ccf/100)*c.tarifa_ibc) as tarifa_ccf,
            ROUND(((tipo_afi.porcentaje_ccf / 100) * c.tarifa_ibc)/30)as tarifa_por_dia_ccf,
            adm_tar.tarifa as tarifa_administracion,
            Imp.tarifa as tarifa_cree,
            c.tarifa_ibc, 
            CONCAT(YEAR(NOW()),MONTH(NOW())-1) as periodo
            FROM $tabla as est 
            LEFT JOIN afiliaciones as c ON c.id = est.afiliaciones_id 
            LEFT JOIN afiliados as a ON a.id = c.afiliado_id 
            LEFT JOIN (SELECT * FROM estado_afiliaciones WHERE id IN (SELECT MAX(id) FROM estado_afiliaciones WHERE estado = 1 					AND estado_pago = 1  GROUP BY afiliaciones_id) ) as t2 ON t2.afiliaciones_id = c.id 
            LEFT JOIN aportes as apo ON apo.afiliaciones_id = c.id 
            LEFT JOIN arl_tarifas as tar_arl ON tar_arl.id = c.arl_tarifas_id 
            LEFT JOIN tipo_afiliados as tipo_afi ON tipo_afi.id = c.tipo_afiliados_id
            LEFT JOIN administracion_tarifas as adm_tar ON adm_tar.id = c.administracion_tarifas_id
	        LEFT JOIN impuestos_tarifa as imp ON imp.id = c.impuestos_tarifa_id
            WHERE c.$item = :$item");
            
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

        	return $stmt -> fetch();

		    }else{

            //$stmt = Conexion::conectar()->prepare("SELECT c.id, c.nombres, c.apellido_paterno, c.apellido_materno, c.tipo_documento,
                                                     //c.numero_documento, c.estado, c.cedula, c.celular, b.afiliado_id, a.id as afiliacion_id
                            //FROM $tabla as c 
            //LEFT JOIN beneficiarios as b ON c.id=b.afiliado_id 
            //LEFT JOIN afiliaciones as a ON a.afiliado_id = c.id");

            $stmt = Conexion::conectar()->prepare("SELECT est.id, CONCAT(a.nombres,' ',a.apellido_paterno,' ',a.apellido_materno) as afiliado, 
            CONCAT(a.tipo_documento,' ',a.numero_documento) as documento, t2.estado, c.id as afiliacion_id, t2.estado_pago, apo.id as aporte_id, DAY(est.fecha_afiliacion) as dias_afiliacion,
                c.arl_id, c.arl_tarifas_id, tar_arl.tarifa as tarifa_arl,
                ROUND(tar_arl.tarifa/30) as tarifa_arl_por_dia,
                c.eps_id,
                ROUND((tipo_afi.porcentaje_eps / 100) * c.tarifa_ibc) as tarifa_eps,
                ROUND(((tipo_afi.porcentaje_eps / 100) * c.tarifa_ibc)/30)as tarifa_eps_por_dia,
                    c.afp_id,
                ROUND ((tipo_afi.porcentaje_afp/100)*c.tarifa_ibc) as tarifa_afp,
                ROUND(((tipo_afi.porcentaje_afp / 100) * c.tarifa_ibc)/30)as tarifa_afp_por_dia,
                    c.caja_compensaciones_id,
                ROUND ((tipo_afi.porcentaje_ccf/100)*c.tarifa_ibc) as tarifa_ccf,
                ROUND(((tipo_afi.porcentaje_ccf / 100) * c.tarifa_ibc)/30)as tarifa_ccf_por_dia,
                    adm_tar.tarifa as tarifa_administracion,
                    Imp.tarifa as tarifa_cree,
                    c.tarifa_ibc, 
                    CONCAT(YEAR(NOW()),MONTH(NOW())-1) as periodo
            FROM $tabla as est 
            LEFT JOIN afiliaciones as c ON c.id = est.afiliaciones_id 
            LEFT JOIN afiliados as a ON a.id = c.afiliado_id 
            LEFT JOIN (SELECT * FROM estado_afiliaciones WHERE id IN (SELECT MAX(id) FROM estado_afiliaciones WHERE estado = 1 					AND estado_pago = 1  GROUP BY afiliaciones_id) ) as t2 ON t2.afiliaciones_id = c.id 
            LEFT JOIN aportes as apo ON apo.afiliaciones_id = c.id 
            LEFT JOIN arl_tarifas as tar_arl ON tar_arl.id = c.arl_tarifas_id 
            LEFT JOIN tipo_afiliados as tipo_afi ON tipo_afi.id = c.tipo_afiliados_id
            LEFT JOIN administracion_tarifas as adm_tar ON adm_tar.id = c.administracion_tarifas_id
	        LEFT JOIN impuestos_tarifa as imp ON imp.id = c.impuestos_tarifa_id");

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
    CREAR PAGO APORTE
    ===========================================*/

    static public function mdlIngresarAporte($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(periodo, dias, arl_id, arl_tarifas_id,
                                        tarifa_arl, tarifa_por_dia_arl, eps_id, tarifa_eps, tarifa_por_dia_eps,
                                        afp_id, tarifa_afp, tarifa_por_dia_afp, caja_compensaciones_id, tarifa_ccf,
                                        tarifa_por_dia_ccf, tarifa_administracion, tarifa_cree, tarifa_ibc, total_pagado,
                                        metodo_pago, comprobante, estado, afiliaciones_id, usuarios_id) VALUES (:periodo,
                                        :dias, :arl_id, :arl_tarifas_id, :tarifa_arl, :tarifa_por_dia_arl,
                                        :eps_id, :tarifa_eps, :tarifa_por_dia_eps, :afp_id, :tarifa_afp, :tarifa_por_dia_afp,
                                        :caja_compensaciones_id, :tarifa_ccf,
                                        :tarifa_por_dia_ccf, :tarifa_administracion, :tarifa_cree, :tarifa_ibc, :total_pagado,
                                        :metodo_pago, :comprobante, 1, :afiliaciones_id, :usuarios_id)");

        $stmt->bindParam(":periodo", $datos["periodo"], PDO::PARAM_STR);
        $stmt->bindParam(":dias", $datos["dias"], PDO::PARAM_STR);
        $stmt->bindParam(":arl_id", $datos["arl_id"], PDO::PARAM_STR);
        $stmt->bindParam(":arl_tarifas_id", $datos["arl_tarifas_id"], PDO::PARAM_STR);
        $stmt->bindParam(":tarifa_arl", $datos["tarifa_arl"], PDO::PARAM_STR);
        $stmt->bindParam(":tarifa_por_dia_arl", $datos["tarifa_por_dia_arl"], PDO::PARAM_STR);
        $stmt->bindParam(":eps_id", $datos["eps_id"], PDO::PARAM_STR);
        $stmt->bindParam(":tarifa_eps", $datos["tarifa_eps"], PDO::PARAM_STR);
        $stmt->bindParam(":tarifa_por_dia_eps", $datos["tarifa_por_dia_eps"], PDO::PARAM_STR);
        $stmt->bindParam(":afp_id", $datos["afp_id"], PDO::PARAM_STR);
        $stmt->bindParam(":tarifa_afp", $datos["tarifa_afp"], PDO::PARAM_STR);
        $stmt->bindParam(":tarifa_por_dia_afp", $datos["tarifa_por_dia_afp"], PDO::PARAM_STR);
        $stmt->bindParam(":caja_compensaciones_id", $datos["caja_compensaciones_id"], PDO::PARAM_STR);
        $stmt->bindParam(":tarifa_ccf", $datos["tarifa_ccf"], PDO::PARAM_STR);
        $stmt->bindParam(":tarifa_por_dia_ccf", $datos["tarifa_por_dia_ccf"], PDO::PARAM_STR);
        $stmt->bindParam(":tarifa_administracion", $datos["tarifa_administracion"], PDO::PARAM_STR);
        $stmt->bindParam(":tarifa_cree", $datos["tarifa_cree"], PDO::PARAM_STR);
        $stmt->bindParam(":tarifa_ibc", $datos["tarifa_ibc"], PDO::PARAM_STR);
        $stmt->bindParam(":total_pagado", $datos["total_pagado"], PDO::PARAM_STR);
        $stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);
        $stmt->bindParam(":comprobante", $datos["comprobante"], PDO::PARAM_STR);
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

	static public function mdlActualizarPagoAfi($tabla, $item1, $valor1, $item2, $valor2){

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
    
    /*===========================================
    CREAR ANTECEDENTE
    ===========================================*/

    static public function mdlIngresarAntecedente($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, archivo, afiliados_id) VALUES (:nombre, :archivo, :afiliados_id)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":archivo", $datos["archivo"], PDO::PARAM_STR);
        $stmt->bindParam(":afiliados_id", $datos["afiliados_id"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }
        $stmt->close();

        $stmt = null;

    }

    /*=============================================
	CANTIDAD RECAUDADO POR AFILIACIONES ACTIVAS MES ACTUAL
	=============================================*/

	static public function MdlCantidadAfiliacionesMes($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT IFNULL(SUM(t2.tarifa),0) as total_pago_afiliaciones FROM $tabla as a LEFT JOIN 
                                            (SELECT * FROM estado_afiliaciones WHERE id IN (SELECT MAX(id) FROM estado_afiliaciones GROUP BY afiliaciones_id) ) as t2 
                                            ON t2.afiliaciones_id = a.id LEFT JOIN afiliados as c ON c.id = a.afiliado_id WHERE t2.estado = 1 AND MONTH(t2.fecha_afiliacion)=MONTH(NOW())");

        $stmt -> execute();
        

        return $stmt -> fetch();
        
        $stmt -> close();

        $stmt = null;
		



    }
    
    /*=============================================
	CANTIDAD AFILIADOS POR PAGAR MES ACTUAL
	=============================================*/

	static public function MdlCantidadAportesPorPagar($tabla){

		//$stmt = Conexion::conectar()->prepare("SELECT IFNULL(COUNT(afiliado_id),0) as por_pagar
        //FROM $tabla as a
        //LEFT JOIN (SELECT * FROM estado_afiliaciones WHERE id IN (SELECT MAX(id) FROM estado_afiliaciones WHERE estado = 1 AND estado_pago = 1 GROUP BY id)) as t2 ON t2.afiliaciones_id = a.id 
        //LEFT JOIN (SELECT * FROM aportes WHERE id IN (SELECT MAX(id) FROM aportes WHERE periodo = CONCAT(YEAR(NOW()),MONTH(NOW())-1)GROUP BY id) ) as t3 ON t3.afiliaciones_id = a.id
        //WHERE t3.id is null");

        $stmt = Conexion::conectar()->prepare("SELECT IFNULL(COUNT(afiliado_id),0) as por_pagar
        FROM $tabla as a
        LEFT JOIN (SELECT * FROM estado_afiliaciones WHERE id IN (SELECT MAX(id) FROM estado_afiliaciones WHERE estado = 1 AND estado_pago = 1 GROUP BY id)) as t2 ON t2.afiliaciones_id = a.id 
        LEFT JOIN(SELECT * FROM aportes WHERE id IN (SELECT MAX(id) FROM aportes WHERE estado = 1  GROUP BY afiliaciones_id) ) as t3 ON t3.afiliaciones_id = a.id
        WHERE t2.estado_pago = 1 AND t3.fecha IS NULL OR MONTH(CURDATE()) = MONTH(t3.fecha)+1");


        $stmt -> execute();
        

        return $stmt -> fetch();
        
        $stmt -> close();

        $stmt = null;
		



	}



}