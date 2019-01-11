<?php

require_once "conexion.php";

class ModeloBeneficiarios{

	/*===========================================
    CREAR BENEFICIARIO
    ===========================================*/

    static public function mdlIngresarBeneficiario($tabla, $datos){

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombres, apellido_paterno, apellido_materno, parentesco,
                                        tipo_documento, numero_documento, cedula, documentos, afiliado_id) VALUES (:nombres,
                                        :apellido_paterno, :apellido_materno, :parentesco, :tipo_documento, :numero_documento,
                                        :cedula, :documentos, :afiliado_id)");

        $stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
        $stmt->bindParam(":apellido_paterno", $datos["apellido_paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido_materno", $datos["apellido_materno"], PDO::PARAM_STR);
		$stmt->bindParam(":parentesco", $datos["parentesco"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_documento", $datos["tipo_documento"], PDO::PARAM_STR);
        $stmt->bindParam(":numero_documento", $datos["numero_documento"], PDO::PARAM_STR);
        $stmt->bindParam(":cedula", $datos["cedula"], PDO::PARAM_STR);
		$stmt->bindParam(":documentos", $datos["documentos"], PDO::PARAM_STR);
		$stmt->bindParam(":afiliado_id", $datos["afiliado_id"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else{

            return "error";

        }
        $stmt->close();

        $stmt = null;

    }

    /*=============================================
	MOSTRAR BENEFICIARIOS
	=============================================*/

	static public function MdlMostrarBeneficiarios($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

        	return $stmt -> fetch();

		}else{

			//$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt = Conexion::conectar()->prepare("SELECT CONCAT(b.id,' ',b.nombres,' ',b.apellido_paterno,' ',b.apellido_materno) as beneficiario, CONCAT(b.tipo_documento,' ',b.numero_documento) as documento, b.cedula, b.documentos, b.estado, b.parentesco, a.numero_documento as numero_afiliado
            FROM $tabla as b JOIN afiliados as a ON b.afiliado_id=a.id");

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
    EDITAR BENEFICIARIO
    ===========================================*/

    static public function mdlEditarBeneficiario($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombres = :nombres, apellido_paterno = :apellido_paterno, apellido_materno = :apellido_materno, 
                                                    parentesco = :parentesco, tipo_documento = :tipo_documento, 
                                                    cedula = :cedula, documentos = :documentos
                                                    WHERE numero_documento = :numero_documento");

		$stmt -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt -> bindParam(":apellido_paterno", $datos["apellido_paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido_materno", $datos["apellido_materno"], PDO::PARAM_STR);
		$stmt->bindParam(":parentesco", $datos["parentesco"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_documento", $datos["tipo_documento"], PDO::PARAM_STR);
		$stmt->bindParam(":cedula", $datos["cedula"], PDO::PARAM_STR);
		$stmt->bindParam(":documentos", $datos["documentos"], PDO::PARAM_STR);
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
	ACTUALIZAR ESTADO BENEFICIARIO
	=============================================*/

	static public function mdlActualizarBeneficiario($tabla, $item1, $valor1, $item2, $valor2){

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

	static public function mdlBorrarBeneficiario($tabla, $datos){

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