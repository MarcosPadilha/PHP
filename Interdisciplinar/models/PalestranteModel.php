

<?php

require_once("connection/Conn.php");

class PalestranteModel {

	public static function insertPalestrante($nome, $especializacao, $descricao , $foto){
		$sql  = "INSERT INTO palestrante (PltNome, PltEspecializacao, PltDescricao, PltFoto) VALUES (:nome, :especializacao, :descricao, :foto)";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':especializacao', $especializacao);
		$stmt->bindParam(':descricao', $descricao);
		$stmt->bindParam(':foto', $foto);
		$stmt->execute();

		// redirecionar para criar Palestrante
		header('Location: ../views/criar_palestrante.php?create=true');
	}

	public static function findAll(){
			$sql  = "SELECT * FROM palestrante";
			$stmt = Conn::prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
	}
	public static function delete($id){
		$sql  = "DELETE FROM palestrante WHERE PltCodigo = :id";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}
	public static function findPalestranteForId($id){
			$sql  = "SELECT * FROM palestrante WHERE PltCodigo = :id";
			$stmt = Conn::prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
	}

	public static function update($codigo, $nome, $especializacao, $descricao){
		$sql  = "UPDATE palestrante SET
		PltNome = :nome,
		PltEspecializacao = :especializacao,
		PltDescricao = :descricao
		WHERE PltCodigo = :id";

		$stmt = Conn::prepare($sql);

		$stmt->bindParam(':id', $codigo);
		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':especializacao', $especializacao);
		$stmt->bindParam(':descricao', $descricao);


		$stmt->execute();

		header('Location: ../views/listar_palestrantes.php?atualizado=true');
	}
}
