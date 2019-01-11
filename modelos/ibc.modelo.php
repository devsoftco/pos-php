<?php

require_once "conexion.php";

class ModeloIbc{

	/*=============================================
	MOSTRAR IBC
	=============================================*/

	static public function MdlMostrarIbc($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

        	return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

        	return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }
    
    /*=============================================
	REGISTRO IBC
	=============================================*/

	static public function MdlIngresarIbc($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, tarifa) VALUES(:nombre, :tarifa)");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":tarifa", $datos["tarifa"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();

		$stmt = null;

    }
    
    /*=============================================
	EDITAR IBC
	=============================================*/

	static public function mdlEditarIbc($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, tarifa = :tarifa WHERE id = :id");

        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":tarifa", $datos["tarifa"], PDO::PARAM_STR);
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
	ACTUALIZAR ESTADO IBC
	=============================================*/

	static public function mdlActualizarIbc($tabla, $item1, $valor1, $item2, $valor2){

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
	BORRAR IBC
	=============================================*/

	static public function mdlBorrarIbc($tabla, $datos){

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