

<?php

require_once("connection/Conn.php");

class RecursoModel {

	public static function insertRecurso($nome, $quantidade){
		$sql  = "INSERT INTO recurso (RecNome, RecQuantidade) VALUES (:nome, :quantidade)";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':quantidade', $quantidade);
		$stmt->execute();

		// redirecionar para criar recurso
		header('Location: ../views/criar_recurso.php?create=true');
	}

	public static function findAll(){
			$sql  = "SELECT * FROM recurso";
			$stmt = Conn::prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
	}
	public static function delete($id){
		$sql  = "DELETE FROM recurso WHERE RecCodigo = :id";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}
	public static function findRecursoForId($id){
		$sql  = "SELECT * FROM recurso WHERE RecCodigo = :id";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}
	public static function update($codigo, $nome, $quantidade){
		$sql  = "UPDATE recurso SET
		RecNome = :nome,
		RecQuantidade = :quantidade
		WHERE RecCodigo = :id";

		$stmt = Conn::prepare($sql);

		$stmt->bindParam(':id', $codigo);
		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':quantidade', $quantidade);

		$stmt->execute();

		header('Location: ../views/listar_recursos.php?atualizado=true');
	}
}
