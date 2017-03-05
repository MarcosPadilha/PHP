<?php

require_once ("../../../../Control/SalaCL.php");
require_once ("../../../../Model/Bancodados/SalaBD.php");
require_once ("../../../../Model/Business/SalaBO.php");
require_once ("../../../../View/Html/Includes/Header.php");

if(!empty($_POST)){
	SalaCL::newSala();
}

class NewSalaIO{

	public static function getInstance(){
		$numero = $_POST['salnumero'];
		$capacidade = $_POST['salcapacidade'];
		if ($_POST['salarcon']=="sim") {
			$arcondicionado = 1;
		}else if($_POST['salarcon']=="nao"){
			$arcondicionado = 0;
		}
		$tamanhoquadro = $_POST['saltamquadro'];

		return new SalaBO($numero , $capacidade, $arcondicionado, $tamanhoquadro);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <title> Cadastro de Salas</title>
     
     <script language="javascript" src="../../../javascript/inputs.js"></script>
</head>
<body>

<div class="interface">
     <div class="Cadastro">

          <form class="" action="" method="POST">
               <fieldset>
                    <legend>Inserir Sala</legend>
                    <p>
                         <label for="salnumero"> Sala:</label>
                         <input type="number" name="salnumero" id="salnumero">
                    </p>
                    <p>
                         <label for="salcapacidade"> Capacidade:</label>
                         <input type="number" name="salcapacidade" id="salcapacidade">
                    </p>
                    <p>
                         <label for="salarcon">Ar Condicionado:</label>
					<select id="salarcon" name="salarcon">
				     	<option value="sim">Sim</option>
						<option value="nao">Não</option>
					</select>
                    </p>
                    <p>
                         <label for="saltamquadro">Tamanho Quadro:</label>
                         <input type="number" name="saltamquadro" id="saltamquadro">
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
