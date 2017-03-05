<?php

require_once("../models/SalaModel.php");

class SalaController {

	public static function newSala($numero, $capacidade){
		SalaModel::insertSala($numero, $capacidade);
    }
    public static function findSala(){
	    return SalaModel::findAll();
    }

    public static function deletaSala($id){
	    return SalaModel::delete($id);
   }
   public static function findForId($id){
	return SalaModel::findSalaForId($id);
   }
   public static function updateSala($codigo, $numero, $capacidade){
	return SalaModel::update($codigo, $numero, $capacidade);
   }

}
?>
