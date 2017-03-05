

<?php

require_once("connection/Conn.php");

class SalaModel {

	public static function insertSala($numero, $capacidade){
		$sql  = "INSERT INTO sala (SalNumero, SalCapacidade) VALUES (:numero, :capacidade)";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':numero', $numero);
		$stmt->bindParam(':capacidade', $capacidade);
		$stmt->execute();

		// redirecionar para criar sala
		header('Location: ../views/criar_sala.php?create=true');
	}

	public static function findAll(){
			$sql  = "SELECT * FROM sala";
			$stmt = Conn::prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
	}
	public static function delete($id){
		$sql  = "DELETE FROM sala WHERE SalCodigo = :id";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}
	public static function findSalaForId($id){
		$sql  = "SELECT * FROM sala WHERE SalCodigo = :id";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}
	public static function update($codigo, $numero, $capacidade){
		$sql  = "UPDATE sala SET
		SalNumero = :numero,
		SalCapacidade = :capacidade
		WHERE SalCodigo = :id";

		$stmt = Conn::prepare($sql);

		$stmt->bindParam(':capacidade', $capacidade);
		$stmt->bindParam(':id', $codigo);
		$stmt->bindParam(':numero', $numero);

		$stmt->execute();

		header('Location: ../views/listar_salas.php?atualizado=true');
	}
}
