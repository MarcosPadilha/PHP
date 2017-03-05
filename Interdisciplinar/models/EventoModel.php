<?php

require_once("connection/Conn.php");

class EventoModel {

	public static function insertEvento($nome, $datainicio, $datatermino, $descricao){
		$sql  = "INSERT INTO evento (EveNome, EveDataInicio, EveDataTermino, EveDescricao)
		VALUES (:nome, :datainicio, :datatermino, :descricao)";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':datainicio', $datainicio);
		$stmt->bindParam(':datatermino', $datatermino);
		$stmt->bindParam(':descricao', $descricao);          
		$stmt->execute();

		// redirecionar para criar Evento
		header('Location: ../views/criar_evento.php?create=true');
	}

	public static function findAll(){
			$sql  = "SELECT * FROM evento";
			$stmt = Conn::prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
	}
	public static function delete($id){
		$sql  = "DELETE FROM evento WHERE EveCodigo = :id";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}

	public static function findEventoForId($id){
		$sql  = "SELECT * FROM evento WHERE EveCodigo = :id";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}
	public static function update($codigo, $nome){
		$sql  = "UPDATE evento SET
		EveNome = :nome
		WHERE EveCodigo = :id";

		$stmt = Conn::prepare($sql);

		$stmt->bindParam(':id', $codigo);
		$stmt->bindParam(':nome', $nome);

		$stmt->execute();

		header('Location: ../views/listar_eventos.php?atualizado=true');
	}
}
