<?php

require_once ("../../../../Control/PalestranteCL.php");
require_once ("../../../../Model/Bancodados/PalestranteBD.php");
require_once ("../../../../Model/Business/PalestranteBO.php");
require_once ("../../../../View/Html/Includes/Header.php");

if(!empty($_POST)){
	PalestranteCL::newPalestrante();
}

class NewPalestranteIO{

	public static function getInstance(){
		$nome = $_POST['pltnome'];
		$especializacao = $_POST['pltespecializacao'];
		$descricao = $_POST['pltdescricao'];
		$foto = $_POST['pltfoto'];

		return new PalestranteBO($nome , $especializacao, $descricao, $foto);
	}
}
?>




<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <title> Cadastro de Palestrante</title>
     
     <script language="javascript" src="../../../javascript/inputs.js"></script>
</head>
<body>

<div class="interface">
     <div class="Cadastro">

          <form class="" action="" method="POST">
               <fieldset>
                    <legend>Inserir Palestrante</legend>
                    <p>
                         <label for="pltnome"> Nome:</label>
                         <input type="text" name="pltnome" id="pltnome">
                    </p>
                    <p>
                         <label for="pltespecializacao"> especializacao:</label>
                         <input type="text" name="pltespecializacao" id="pltespecializacao">
                    </p>
				<p>
                         <label for="pltdescricao">Descrição:</label>
					<textarea rows="6" cols="50" name="pltdescricao" id="pltdescricao" placeholder="Informe a Descrição do palestrante!"></textarea>
                    </p>
				<p>
					<label for="pltfoto"> Foto:</label>
					<input type="text" name="pltfoto" id="pltfoto">
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
