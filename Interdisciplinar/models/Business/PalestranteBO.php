<?php

class PalestranteBO{

     private $nome;
     private $especializacao;
     private $descricao;
     private $foto;

     function __construct($nome, $especializacao, $descricao, $foto) {
         $this->nome = $nome;
         $this->especializacao = $especializacao;
         $this->descricao = $descricao;
         $this->foto = $foto;
     }
     function getNome() {
         return $this->nome;
     }

     function getDescricao() {
         return $this->descricao;
     }

     function getEspecializacao() {
         return $this->especializacao;
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

     function setEspecializacao($especializacao) {
         $this->especializacao = $especializacao;
     }

     function setFoto($foto) {
         $this->foto = $foto;
     }


}


 ?>
