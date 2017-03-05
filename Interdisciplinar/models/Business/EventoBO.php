<?php

class EventoBO{

     private $nome;
     private $datainicio;
     private $datatermino;
     private $descricao;
     private $foto;

     function __construct($nome, $datainicio, $datatermino, $descricao, $foto) {
         $this->nome = $nome;         
         $this->datainicio = $datainicio;
         $this->datatermino = $datatermino;
         $this->descricao = $descricao;
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
