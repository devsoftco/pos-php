<?php

require_once "conexion.php";

class ModeloAfiliados{

    /*=============================================
	MOSTRAR AFILIADOS
	=============================================*/

	static public function MdlMostrarAfiliados($tabla, $item, $valor){

		if($item != null){

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

            $stmt = Conexion::conectar()->prepare("SELECT a.id, CONCAT(a.nombres,' ',a.apellido_paterno,' ',a.apellido_materno) as afiliado, 
            CONCAT(a.tipo_documento,' ',a.numero_documento) as documento, 
            IFNULL(t2.estado, 0) as estado, a.cedula, a.celular, IFNULL(b.afiliado_id,0) as afiliado_id, IFNULL(c.id,0) as afiliacion_id, IFNULL(ant.afiliados_id,0) as antecedentes
            FROM $tabla as a 
            LEFT JOIN afiliaciones as c ON a.id = c.afiliado_id 
            LEFT JOIN (SELECT * FROM estado_afiliaciones 
            WHERE id IN (SELECT MAX(id) FROM estado_afiliaciones GROUP BY afiliaciones_id) ) as t2 
            ON t2.afiliaciones_id = c.id 
            LEFT JOIN beneficiarios as b ON b.afiliado_id = a.id 
            LEFT JOIN antecedentes as ant ON ant.afiliados_id = a.id
            GROUP BY a.id ORDER BY a.id DESC");

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
    CREAR AFILIADO
    ===========================================*/

    static public function mdlIngresarAfiliado($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombres, apellido_paterno, apellido_materno,
                                        tipo_documento, numero_documento, email, celular, telefono,
                                        direccion, barrio, departamento, fecha_nacimiento, cedula) VALUES (:nombres,
                                        :apellido_paterno, :apellido_materno, :tipo_documento, :numero_documento,
                                        :email, :celular, :telefono, :direccion, :barrio, :departamento,
                                        :fecha_nacimiento, :cedula)");

        $stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido_paterno", $datos["apellido_paterno"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido_materno", $datos["apellido_materno"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_documento", $datos["tipo_documento"], PDO::PARAM_STR);
        $stmt->bindParam(":numero_documento", $datos["numero_documento"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":barrio", $datos["barrio"], PDO::PARAM_STR);
        $stmt->bindParam(":departamento", $datos["departamento"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
        $stmt->bindParam(":cedula", $datos["cedula"], PDO::PARAM_STR);

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
                                                    barrio = :barrio, departamento = :departamento, fecha_nacimiento = :fecha_nacimiento, cedula = :cedula
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



}