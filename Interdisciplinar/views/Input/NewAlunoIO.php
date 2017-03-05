<?php

require_once ("../../../../Control/AlunoCL.php");
require_once ("../../../../Model/Bancodados/AlunoBD.php");
require_once ("../../../../Model/Business/AlunoBO.php");
require_once ("../../../../View/Html/Includes/Header.php");

if(!empty($_POST)){
	AlunoCL::newAluno();
}

class NewAlunoIO{

	public static function getInstance(){
		$nome = $_POST['alunome'];
		$registro = $_POST['alura'];
		$email = $_POST['aluemail'];
		$senha = $_POST['alusenha'];

		return new AlunoBO($nome , $registro, $email, $senha);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title> Cadastro de Alunos</title>
	<meta charset="utf-8">
	
	<script language="javascript" src="../../../javascript/inputs.js"></script>
</head>
<body>
<div class="interface">
	<div class="Cadastro">

          <form class="" action="" method="POST">
               <fieldset>
                    <legend>Inserir Aluno</legend>
                    <p>
                         <label for="alunome"> Nome:</label>
                         <input type="text" name="alunome" id="alunome">
                    </p>
                    <p>
                         <label for="alura"> RA:</label>
                         <input type="text" name="alura" id="alura">
                    </p>
                    <p>
                         <label for="aluemail">Email:</label>
                         <input type="email" name="aluemail" id="aluemail">
                    </p>
                    <p>
                         <label for="aluconfirmaemail">Confirmação de Email:</label>
                         <input type="email" name="aluconfirmaemail" id="aluconfirmaemail">
                    </p>
                    <p>
                         <label for="alusenha">Senha:</label>
                         <input type="password" name="alusenha"id="alusenha">
                    </p>
                    <p>
                         <label for="aluconfirmasenha">Confirmação de Senha:</label>
                         <input type="password" name="aluconfirmasenha" id="aluconfirmasenha">
                    </p>
                    <p>
                         <input type="submit" name="enviar" value="Enviar">
                    </p>
               </fieldset>
          </form>

     </div>
</div>
</body>
</html>
