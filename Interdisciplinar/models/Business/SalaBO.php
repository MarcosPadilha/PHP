<?php

class SalaBO{

     private $numero;
     private $capacidade;
     private $arcondicionado;
     private $tamanhoquadro;

     function __construct($numero , $capacidade, $arcondicionado, $tamanhoquadro) {
         $this->numero = $numero;
         $this->capacidade = $capacidade;
         $this->arcondicionado = $arcondicionado;
         $this->tamanhoquadro = $tamanhoquadro;
     }

     function getCapacidade() {
         return $this->capacidade;
     }

     function getArcondicionado() {
         return $this->arcondicionado;
     }

     function getTamanhoquadro() {
         return $this->tamanhoquadro;
     }

     function getNumero() {
         return $this->numero;
     }
     function setCapacidade($capacidade) {
         $this->capacidade = $capacidade;
     }

     function setArcondicionado($arcondicionado) {
         $this->arcondicionado = $arcondicionado;
     }

     function setTamanhoquadro($tamanhoquadro) {
         $this->tamanhoquadro = $tamanhoquadro;
     }

     function setNumero($numero) {
         $this->numero = $numero;
     }


}
?>
