<?php

class RecursoBO{

     private $nome;
     private $Quantidade;

     function __construct($nome, $Quantidade) {
         $this->nome = $nome;
         $this->Quantidade = $Quantidade;
     }
     function getNome() {
         return $this->nome;
     }

     function getQuantidade() {
         return $this->Quantidade;
     }

     function setNome($nome) {
         $this->nome = $nome;
     }

     function setQuantidade($Quantidade) {
         $this->Quantidade = $Quantidade;
     }



}

?>
