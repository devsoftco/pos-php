<?php

require_once "conexion.php";

class ModeloTipoAfiliados{

	/*=============================================
	MOSTRAR TIPO AFILIADOS
	=============================================*/

	static public function MdlMostrarTipoAfiliados($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

        	return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 1");

			$stmt -> execute();

        	return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }
    
    /*=============================================
	REGISTRO TIPO AFILIADOS
	=============================================*/

	static public function MdlIngresarTipoAfiliado($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, porcentaje_eps, porcentaje_afp, porcentaje_ccf) 
												VALUES(:nombre, :porcentaje_eps, :porcentaje_afp, :porcentaje_ccf)");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":porcentaje_eps", $datos["porcentaje_eps"], PDO::PARAM_STR);
		$stmt -> bindParam(":porcentaje_afp", $datos["porcentaje_afp"], PDO::PARAM_STR);
		$stmt -> bindParam(":porcentaje_ccf", $datos["porcentaje_ccf"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();

		$stmt = null;

    }
    
    /*=============================================
	EDITAR TIPO AFILIADO
	=============================================*/

	static public function mdlEditarTipoAfiliado($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, porcentaje_eps = :porcentaje_eps, porcentaje_afp = :porcentaje_afp, porcentaje_ccf = :porcentaje_ccf 
												WHERE id = :id");

        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":porcentaje_eps", $datos["porcentaje_eps"], PDO::PARAM_STR);
		$stmt -> bindParam(":porcentaje_afp", $datos["porcentaje_afp"], PDO::PARAM_STR);
		$stmt -> bindParam(":porcentaje_ccf", $datos["porcentaje_ccf"], PDO::PARAM_STR);
        $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();

		$stmt = null;


	}

	/*=============================================
	ACTUALIZAR ESTADO TIPO AFILIADO
	=============================================*/

	static public function mdlActualizarTipoAfiliado($tabla, $item1, $valor1, $item2, $valor2){

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
	BORRAR TIPO AFILIADO
	=============================================*/

	static public function mdlBorrarTipoAfiliado($tabla, $datos){

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