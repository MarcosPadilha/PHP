<?php

require_once("../models/EventoModel.php");

class EventoController {

	public static function newEvento($nome,  $datainicio, $datatermino , $descricao){
		EventoModel::insertEvento($nome,  $datainicio, $datatermino , $descricao);
    }
    public static function findEvento(){
	    return EventoModel::findAll();
    }

    public static function deletaEvento($id){
	    return EventoModel::delete($id);
   }
   public static function findForId($id){
	   return EventoModel::findEventoForId($id);
   }
   public static function updateEvento($codigo, $nome){
	   return EventoModel::update($codigo, $nome);
   }

}
?>
