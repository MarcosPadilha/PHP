<?php

require_once("../models/InscricaoModel.php");

class InscricaoController{

     public static function inscreverAluno($aluno, $palestra){
          InscricaoModel::inscrever($aluno, $palestra);
     }
     public static function findForId($aluno, $palestra){
          return InscricaoModel::findInscricoes($aluno, $palestra);
     }
     public static function findInscricoes(){
          return InscricaoModel::findAll();
     }
     public static function deletaInscricao($aluno, $palestra){
          return InscricaoModel::delete($aluno, $palestra);
     }
     public static function findPalestra($palestra){
          return InscricaoModel::findPalestraForId($palestra);
     }
     public static function setValor($aluno, $palestra , $valor){
          return InscricaoModel::setAssConfirmacao($aluno, $palestra , $valor);
     }

}

?>
