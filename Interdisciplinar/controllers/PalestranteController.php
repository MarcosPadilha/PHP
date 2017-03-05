<?php

require_once("../models/PalestranteModel.php");

class PalestranteController {

	public static function newPalestrante($nome, $especializacao, $descricao , $foto){
		PalestranteModel::insertPalestrante($nome, $especializacao, $descricao , $foto);
    }
    public static function findPalestrante(){
	    return PalestranteModel::findAll();
    }

    public static function deletaPalestrante($id){
	    return PalestranteModel::delete($id);
   }
   public static function findForId($id){
	   return PalestranteModel::findPalestranteForId($id);
   }
   public static function updatePalestrante($codigo, $nome, $especializacao, $descricao){
	   return PalestranteModel::update($codigo, $nome, $especializacao, $descricao);
   }

}
?>
