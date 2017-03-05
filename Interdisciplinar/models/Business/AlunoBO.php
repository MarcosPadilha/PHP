<?php

class AlunoBO{

     private $nome;
     private $registro;
     private $email;
     private $senha;
     function __construct($nome, $registro, $email, $senha) {
         $this->nome = $nome;
         $this->registro = $registro;
         $this->email = $email;
         $this->senha = $senha;
         
     }
     function getNome() {
         return $this->nome;
     }

     function getRegistro() {
         return $this->registro;
     }

     function getEmail() {
         return $this->email;
     }

     function getSenha() {
         return $this->senha;
     }

     function setNome($nome) {
         $this->nome = $nome;
     }

     function setRegistro($registro) {
         $this->registro = $registro;
     }

     function setEmail($email) {
         $this->email = $email;
     }

     function setSenha($senha) {
         $this->senha = $senha;
     }



}

?>
