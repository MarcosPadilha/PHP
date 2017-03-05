<?php

require_once("../models/ColaboradorModel.php");

class ColaboradorController {

     public static function newColaborador($nome, $sobrenome, $endereco, $datanasc, $email, $senha){
		ColaboradorModel::insertColaborador($nome, $sobrenome, $endereco, $datanasc, $email, $senha);
     }
     public static function findColaborador(){
          return ColaboradorModel::findAll();
     }
     public static function findForId($id){
          return ColaboradorModel::findColaboradorForId($id);
     }

     public static function deletaColaborador($id){
          return ColaboradorModel::delete($id);
     }

     public static function loginColaborador($ra, $senha){
         return ColaboradorModel::login($ra, $senha);
     }
     public static function findForId2($id){
         return ColaboradorModel::findColaboradorForId2($id);
     }

     public static function updateColaborador($codigo, $nome, $sobrenome, $endereco, $datanasc, $email, $senha){
    	    return ColaboradorModel::update($codigo, $nome, $sobrenome, $endereco, $datanasc, $email, $senha );
     }

}
?>
