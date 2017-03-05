<?php

require_once ("../../../../Control/PalestraCL.php");
require_once ("../../../../Model/Bancodados/PalestraBD.php");
require_once ("../../../../Model/Business/PalestraBO.php");
require_once ("../../../../View/Html/Includes/Header.php");
require_once ("../../../../Control/SalaCL.php");

if(!empty($_POST)){
	PalestraCL::newPalestra();
}

class NewPalestraIO{

	public static function getInstance(){
		$nome = $_POST['palnome'];
		$datainicio = $_POST['paldatainicio'];
		$datatermino = $_POST['paldatatermino'];
		$descricao = $_POST['paldescricao'];
		$foto = $_POST['palfoto'];

		return new PalestraBO($nome , $descricao, $datainicio, $datatermino, $foto);
	}
}
?>




<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <title> Cadastro de Alunos</title>     
</head>
<body>

<div class="interface">
     <div class="Cadastro">

          <form class="" action="" method="POST">
               <fieldset>
                    <legend>Inserir Palestra</legend>
                    <p>
                         <label for="palnome"> Nome:</label>
                         <input type="text" name="palnome" id="palnome">
                    </p>
				<p>
                         <label for="paldatainicio"> Data Inicio:</label>
                         <input type="datetime-local" name="paldatainicio" id="paldatainicio">
                    </p>
                    <p>
                         <label for="paldatatermino">Data Termino:</label>
                         <input type="datetime-local" name="paldatatermino" id="paldatatermino">
                    </p>
                    <p>
                         <label for="paldescricao">Descrição:</label>
					<textarea rows="6" cols="50" name="paldescricao" id="paldescricao" placeholder="Informe a Descrição da palestra!"></textarea>
                    </p>
				<p>
                         <label for="palfoto">Foto:</label>
                         <input type="text" name="palfoto" id="palfoto">
                    </p>
				<p>
					<label for="palsala">Sala:</label>
					<select class="" name="palsala" id="palsala">
						<?php
						foreach (SalaCL::findSala() as $key) {
							echo "<option value='$key->SalCodigo'>$key->SalNumero</option>";
						}

						?>
					</select>
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
