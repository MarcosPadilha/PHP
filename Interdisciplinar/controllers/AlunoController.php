<?php

require_once("../models/AlunoModel.php");

class AlunoController {

	public static function newAluno($nome, $sobrenome, $endereco, $datanasc, $email, $senha){
		AlunoModel::insertAluno($nome, $sobrenome, $endereco, $datanasc, $email, $senha);
    }

    	public static function findAluno(){
    		return AlunoModel::findAll();
    	}
	public static function findForId($id){
		return AlunoModel::findAlunoForId($id);
	}
	public static function findForId2($id){
		return AlunoModel::findAlunoForId2($id);
	}

    	public static function deletaAluno($id){
    		return AlunoModel::delete($id);
	}

	public static function loginAluno($ra, $senha){
		return AlunoModel::login($ra, $senha);
	}


	public static function updateAluno($codigo, $nome, $sobrenome, $endereco, $datanasc, $email, $senha){
		return AlunoModel::update($codigo, $nome, $sobrenome, $endereco, $datanasc, $email, $senha);
	}

}
?>
