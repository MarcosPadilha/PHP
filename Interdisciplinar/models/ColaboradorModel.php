<?php

require_once("connection/Conn.php");

class ColaboradorModel {

	public static function insertColaborador($nome, $sobrenome, $endereco, $datanasc, $email, $senha){
		$sql  = "INSERT INTO colaborador (ColNome, ColSobrenome, ColEndereco, ColDataNasc, ColEmail, ColSenha)
		VALUES (:nome, :sobrenome, :endereco, :datanasc, :email, :senha)";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':senha', $senha);
		$stmt->bindParam(':sobrenome', $sobrenome);
		$stmt->bindParam(':endereco', $endereco);
		$stmt->bindParam(':datanasc', $datanasc);
		$stmt->execute();

		// redirecionar para criar colaborador
		header('Location: ../views/criar_colaborador.php?create=true');
	}

	public static function findAll(){
			$sql  = "SELECT * FROM colaborador";
			$stmt = Conn::prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
	}

	public static function findColaboradorForId($id){
			$sql  = "SELECT * FROM colaborador WHERE ColRA = :id";
			$stmt = Conn::prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->execute();
			return $stmt->fetch();
	}

	public static function delete($id){
		$sql  = "DELETE FROM colaborador WHERE ColCodigo = :id";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}

	public static function login($ra, $senha){
		$sql  = "SELECT * FROM colaborador WHERE ColCodigo = :ra AND ColSenha = :senha";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':ra', $ra);
		$stmt->bindParam(':senha', $senha);
		$stmt->execute();
		return $stmt->fetchAll();
	}
	public static function update($codigo, $nome, $sobrenome, $endereco, $datanasc, $email, $senha){
		$sql  = "UPDATE colaborador SET
		ColNome = :nome,
		ColSobrenome = :sobrenome,
		ColEndereco =:endereco,
		ColDataNasc =:datanasc,
		ColEmail = :email,
		ColSenha = :senha
		WHERE ColCodigo = :id";

		$stmt = Conn::prepare($sql);

		$stmt->bindParam(':id', $codigo);
		$stmt->bindParam(':nome', $nome);		
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':senha', $senha);
		$stmt->bindParam(':sobrenome', $sobrenome);
		$stmt->bindParam(':endereco', $endereco);
		$stmt->bindParam(':datanasc', $datanasc);

		$stmt->execute();

		header('Location: ../views/listar_colaboradores.php?atualizado=true');
	}
	public static function findColaboradorForId2($id){
			$sql  = "SELECT * FROM colaborador WHERE ColCodigo = :id";
			$stmt = Conn::prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
	}
}
