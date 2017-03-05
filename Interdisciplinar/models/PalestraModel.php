<?php

require_once("connection/Conn.php");

class PalestraModel {

	public static function insertPalestra($nome, $descricao, $foto ,$datainicio, $datatermino, $sala, $palestrante, $evento, $recurso){
		$sql  = "INSERT INTO palestra (PalNome, PalDescricao, PalFotoCapa, PalDataInicio, PalDataTermino, SalCodigo, PltCodigo, EveCodigo, RecCodigo)
		VALUES (:nome, :descricao, :foto, :datainicio, :datatermino, :sala, :palestrante, :evento,:recurso )";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':descricao', $descricao);
		$stmt->bindParam(':foto', $foto);
		$stmt->bindParam(':datainicio', $datainicio);
          $stmt->bindParam(':datatermino', $datatermino);
		$stmt->bindParam(':sala', $sala);
		$stmt->bindParam(':palestrante', $palestrante);
		$stmt->bindParam(':evento', $evento);
		$stmt->bindParam(':recurso', $recurso);
		$stmt->execute();

		// redirecionar para criar Palestra
		header('Location: ../views/criar_palestra.php?create=true');
	}

	public static function findAll(){
			$sql  = "SELECT * FROM palestra";
			$stmt = Conn::prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
	}
	public static function delete($id){
		$sql  = "DELETE FROM palestra WHERE PalCodigo = :id";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();

		$sql  = "DELETE FROM assiste WHERE PalCodigo = :id";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}

	public static function findPalestraForId($id){
			$sql  = "SELECT * FROM palestra WHERE PalCodigo = :id";
			$stmt = Conn::prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
	}
	public static function update($codigo, $nome, $descricao){
		$sql  = "UPDATE palestra SET
		PalNome = :nome,
		PalDescricao = :descricao
		WHERE PalCodigo = :id";

		$stmt = Conn::prepare($sql);

		$stmt->bindParam(':id', $codigo);
		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':descricao', $descricao);


		$stmt->execute();

		header('Location: ../views/listar_palestras.php?atualizado=true');
	}
}
