<?php

require_once("connection/Conn.php");

class AlunoModel {

	public static function insertAluno($nome, $sobrenome, $endereco, $datanasc, $email, $senha){

		$sql  = "INSERT INTO aluno (AluNome, AluSobrenome, AluEndereco, AluDataNasc, AluEmail, AluSenha)
		VALUES (:nome, :sobrenome, :endereco, :datanasc, :email, :senha)";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':senha', $senha);
		$stmt->bindParam(':sobrenome', $sobrenome);
		$stmt->bindParam(':endereco', $endereco);
		$stmt->bindParam(':datanasc', $datanasc);
		$stmt->execute();


		// redirecionar para criar Aluno
		header('Location: ../views/criar_aluno.php?create=true');
	}

	public static function findAll(){
			$sql  = "SELECT * FROM aluno";
			$stmt = Conn::prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
	}

	public static function findAlunoForId($id){
			$sql  = "SELECT * FROM aluno WHERE AluRA = :id";
			$stmt = Conn::prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
	}

	public static function delete($id){
		$sql  = "DELETE FROM aluno WHERE AluCodigo = :id";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();

		$sql  = "DELETE FROM assiste WHERE AluCodigo = :id";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();

	}

	public static function login($ra, $senha){
		$sql  = "SELECT * FROM aluno WHERE AluCodigo = :ra AND AluSenha = :senha";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':ra', $ra);
		$stmt->bindParam(':senha', $senha);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public static function update($codigo, $nome, $sobrenome, $endereco, $datanasc, $email, $senha){
		$sql  = "UPDATE aluno SET
		AluNome = :nome,
		AluSobrenome = :sobrenome,
		AluEndereco =:endereco,
		AluDataNasc =:datanasc,
		AluEmail = :email,
		AluSenha = :senha
		WHERE AluCodigo = :id";

		$stmt = Conn::prepare($sql);

		$stmt->bindParam(':id', $codigo);
		$stmt->bindParam(':nome', $nome);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':senha', $senha);
		$stmt->bindParam(':sobrenome', $sobrenome);
		$stmt->bindParam(':endereco', $endereco);
		$stmt->bindParam(':datanasc', $datanasc);

		$stmt->execute();

		header('Location: ../views/listar_alunos.php?atualizado=true');
	}
	public static function findAlunoForId2($id){
			$sql  = "SELECT * FROM aluno WHERE AluCodigo = :id";
			$stmt = Conn::prepare($sql);
			$stmt->bindParam(':id', $id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
	}

}
