<?php

require_once "conexion.php";

class ModeloProfesiones{

	/*=============================================
	MOSTRAR PROFESIONES
	=============================================*/

	static public function MdlMostrarProfesiones($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

        	return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre ASC");

			$stmt -> execute();

        	return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }
    
    /*=============================================
	REGISTRO PROFESION
	=============================================*/

	static public function MdlIngresarProfesion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre) VALUES(:nombre)");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();

		$stmt = null;

    }
    
    /*=============================================
	EDITAR PROFESION
	=============================================*/

	static public function mdlEditarProfesion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre WHERE id = :id");

        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
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
	BORRAR PROFESION
	=============================================*/

	static public function mdlBorrarProfesion($tabla, $datos){

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