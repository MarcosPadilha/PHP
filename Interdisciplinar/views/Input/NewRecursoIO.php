<?php

require_once ("../../../../Control/RecursoCL.php");
require_once ("../../../../Model/Bancodados/RecursoBD.php");
require_once ("../../../../Model/Business/RecursoBO.php");
require_once ("../../../../View/Html/Includes/Header.php");

if(!empty($_POST)){
	RecursoCL::newRecurso();
}

class NewRecursoIO{

	public static function getInstance(){
		$nome = $_POST['recnome'];
		$quantidade = $_POST['recquantidade'];

		return new RecursoBO($nome , $quantidade);
	}
}
?>




<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <title> Cadastro de Recursos</title>
     
     <script language="javascript" src="../../../javascript/inputs.js"></script>
</head>
<body>

<div class="interface">
     <div class="Cadastro">

          <form class="" action="" method="POST">
               <fieldset>
                    <legend>Inserir Recursos</legend>
                    <p>
                         <label for="recnome"> Nome:</label>
                         <input type="text" name="recnome" id="recnome">
                    </p>
                    <p>
                         <label for="recquantidade"> Quantide:</label>
                         <input type="number" name="recquantidade" id="recquantidade">
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
