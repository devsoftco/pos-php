<?php

require_once "conexion.php";

class ModeloCajas{

	/*=============================================
	MOSTRAR CCF
	=============================================*/

	static public function MdlMostrarCaja($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

        	return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 1 ORDER BY nombre ASC");

			$stmt -> execute();

        	return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }
    
    /*=============================================
	REGISTRO CCF
	=============================================*/

	static public function MdlIngresarCaja($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, codigo, nit, direccion) VALUES(:nombre, :codigo, :nit, :direccion)");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt -> bindParam(":nit", $datos["nit"], PDO::PARAM_STR);
		$stmt -> bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();

		$stmt = null;

    }
    
    /*=============================================
	EDITAR CCF
	=============================================*/

	static public function mdlEditarCaja($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, nit = :nit, direccion = :direccion WHERE codigo = :codigo");

        $stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt -> bindParam(":nit", $datos["nit"], PDO::PARAM_STR);
		$stmt -> bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}

		$stmt->close();

		$stmt = null;


	}

	/*=============================================
	ACTUALIZAR ESTADO CCF
	=============================================*/

	static public function mdlActualizarCaja($tabla, $item1, $valor1, $item2, $valor2){

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
	BORRAR CCF
	=============================================*/

	static public function mdlBorrarCaja($tabla, $datos){

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