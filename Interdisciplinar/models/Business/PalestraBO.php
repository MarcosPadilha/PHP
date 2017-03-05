<?php

class PalestraBO{

     private $nome;
     private $descricao;
     private $datainicio;
     private $datatermino;
     private $foto;

     function __construct($nome, $descricao, $datainicio, $datatermino, $foto) {
         $this->nome = $nome;
         $this->descricao = $descricao;
         $this->datainicio = $datainicio;
         $this->datatermino = $datatermino;
         $this->foto = $foto;
     }

     function getNome() {
         return $this->nome;
     }

     function getDescricao() {
         return $this->descricao;
     }

     function getDatainicio() {
         return $this->datainicio;
     }

     function getDatatermino() {
         return $this->datatermino;
     }

     function getFoto() {
         return $this->foto;
     }

     function setNome($nome) {
         $this->nome = $nome;
     }

     function setDescricao($descricao) {
         $this->descricao = $descricao;
     }

     function setDatainicio($datainicio) {
         $this->datainicio = $datainicio;
     }

     function setDatatermino($datatermino) {
         $this->datatermino = $datatermino;
     }

     function setFoto($foto) {
         $this->foto = $foto;
     }


}

?>
