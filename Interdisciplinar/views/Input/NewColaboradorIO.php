<?php

require_once ("../../../../Control/ColaboradorCL.php");
require_once ("../../../../Model/Bancodados/ColaboradorBD.php");
require_once ("../../../../Model/Business/ColaboradorBO.php");
require_once ("../../../../View/Html/Includes/Header.php");

if(!empty($_POST)){
	ColaboradorCL::newColaborador();
}

class NewColaboradorIO{

	public static function getInstance(){
		$nome = $_POST['colnome'];
		$registro = $_POST['colra'];
		$email = $_POST['colemail'];
		$senha = $_POST['colsenha'];

		return new ColaboradorBO($nome , $registro, $email, $senha);
	}
}
?>


<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <title> Cadastro de Colaboradores</title>     
     <script language="javascript" src="../../../javascript/inputs.js"></script>
</head>
<body>

<div class="interface">
     <div class="Cadastro">

          <form class="" action="" method="POST">
               <fieldset>
                    <legend>Inserir Colaborador</legend>
                    <p>
                         <label for="colnome"> Nome:</label>
                         <input type="text" name="colnome" id="colnome">
                    </p>
                    <p>
                         <label for="colra"> RA:</label>
                         <input type="text" name="colra" id="colra">
                    </p>
                    <p>
                         <label for="colemail">Email:</label>
                         <input type="email" name="colemail" id="colemail">
                    </p>
                    <p>
                         <label for="colconfirmaemail">Confirmação de Email:</label>
                         <input type="email" name="colconfirmaemail" id="colconfirmaemail">
                    </p>
                    <p>
                         <label for="colsenha">Senha:</label>
                         <input type="password" name="colsenha"id="colsenha">
                    </p>
                    <p>
                         <label for="colconfirmasenha">Confirmação de Senha:</label>
                         <input type="password" name="colconfirmasenha" id="colconfirmasenha">
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
