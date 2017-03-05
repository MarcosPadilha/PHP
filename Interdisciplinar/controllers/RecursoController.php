<?php

require_once("../models/RecursoModel.php");

class RecursoController {

	public static function newRecurso($nome, $quantidade){
		RecursoModel::insertRecurso($nome, $quantidade);
    }
    public static function findRecurso(){
	    return RecursoModel::findAll();
    }

    public static function deletaRecurso($id){
	    return RecursoModel::delete($id);
   }
   public static function findForId($id){
  return RecursoModel::findRecursoForId($id);
   }
   public static function updateRecurso($codigo, $nome, $quantidade){
  return RecursoModel::update($codigo, $nome, $quantidade);
   }

}
?>
