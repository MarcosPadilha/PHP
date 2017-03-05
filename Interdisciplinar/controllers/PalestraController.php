<?php

require_once("../models/PalestraModel.php");

class PalestraController {

	public static function newPalestra($nome, $descricao, $foto ,$datainicio, $datatermino, $sala, $palestrante, $evento, $recurso){
		PalestraModel::insertPalestra($nome, $descricao, $foto ,$datainicio, $datatermino, $sala, $palestrante, $evento, $recurso);

    }

    	public static function findPalestra(){
	    return PalestraModel::findAll();
    	}

	public static function deletaPalestra($id){
	    return PalestraModel::delete($id);
   	}
	public static function findForId($id){
		return PalestraModel::findPalestraForId($id);
	}
	public static function updatePalestra($codigo, $nome, $descricao){
		return PalestraModel::update($codigo, $nome, $descricao);
	}

}
?>
