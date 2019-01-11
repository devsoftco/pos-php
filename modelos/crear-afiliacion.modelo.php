<?php

require_once "conexion.php";

class ModeloCrearAfiliaciones{

    /*=============================================
	MOSTRAR AFILIACIONES
	=============================================*/

	static public function MdlMostrarAfiliados($tabla, $item, $valor){

		if($item != null){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

        	return $stmt -> fetch();

		}else{

            //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            
            
            //$stmt = Conexion::conectar()->prepare("SELECT c.id, c.nombres, c.apellido_paterno, c.apellido_materno, c.tipo_documento, c.numero_documento, c.estado, c.cedula, c.celular, c.tipo_afiliado, b.afiliado_id
            //FROM $tabla as c LEFT JOIN beneficiarios as b ON c.id=b.afiliado_id");

            $stmt = Conexion::conectar()->prepare("SELECT c.id, c.nombres, c.apellido_paterno, c.apellido_materno, c.tipo_documento, c.numero_documento, 
                                                    c.estado, c.cedula, c.celular, c.tipo_afiliado, b.afiliado_id, a.id as afiliacion_id
            FROM $tabla as c 
            LEFT JOIN beneficiarios as b ON c.id=b.afiliado_id 
            LEFT JOIN afiliaciones as a ON a.afiliado_id = c.id");

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

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(afiliado_id, tarifa_ibc, profesiones_id, arl_tarifas_id,
                                        eps_id, arl_id, afp_id, caja_compensaciones_id, tipo_afiliados_id, empresa_afi_id,
                                        empresa_apo_id, administracion_tarifas_id, estado, usuario_id) VALUES (:afiliado_id, :tarifa_ibc,
                                        :profesiones_id, :arl_tarifas_id, :eps_id,
                                        :arl_id, :afp_id, :caja_compensaciones_id, :tipo_afiliados_id, :empresa_afi_id, :empresa_apo_id, :administracion_tarifas_id, 1, :usuario_id)");

        $stmt->bindParam(":afiliado_id", $datos["afiliado_id"], PDO::PARAM_STR);
        $stmt->bindParam(":tarifa_ibc", $datos["tarifa_ibc"], PDO::PARAM_STR);
        $stmt->bindParam(":profesiones_id", $datos["profesiones_id"], PDO::PARAM_STR);
        $stmt->bindParam(":arl_tarifas_id", $datos["arl_tarifas_id"], PDO::PARAM_STR);
        $stmt->bindParam(":eps_id", $datos["eps_id"], PDO::PARAM_STR);
        $stmt->bindParam(":arl_id", $datos["arl_id"], PDO::PARAM_STR);
        $stmt->bindParam(":afp_id", $datos["afp_id"], PDO::PARAM_STR);
        $stmt->bindParam(":caja_compensaciones_id", $datos["caja_compensaciones_id"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_afiliados_id", $datos["tipo_afiliados_id"], PDO::PARAM_STR);
        $stmt->bindParam(":empresa_afi_id", $datos["empresa_afi_id"], PDO::PARAM_STR);
        $stmt->bindParam(":empresa_apo_id", $datos["empresa_apo_id"], PDO::PARAM_STR);
        $stmt->bindParam(":administracion_tarifas_id", $datos["administracion_tarifas_id"], PDO::PARAM_STR);
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

	static public function mdlActualizarAfiliado($tabla, $item1, $valor1, $item2, $valor2){

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



}