<?php

require_once ("../../../../Control/EventoCL.php");
require_once ("../../../../Model/Bancodados/EventoBD.php");
require_once ("../../../../Model/Business/EventoBO.php");
require_once ("../../../../View/Html/Includes/Header.php");

if(!empty($_POST)){
	EventoCL::newEvento();
}

class NewEventoIO{

	public static function getInstance(){
		$nome = $_POST['evenome'];
		$datainicio = $_POST['evedatainicio'];
		$datatermino = $_POST['evedatatermino'];
		$descricao = $_POST['evedescricao'];
		$foto = $_POST['evefoto'];

		return new EventoBO($nome , $datainicio, $datatermino, $descricao, $foto);
	}
}
?>




<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <title> Cadastro de Eventos</title>
     
     <script language="javascript" src="../../../javascript/inputs.js"></script>
</head>
<body>

<div class="interface">
     <div class="Cadastro">

          <form class="" action="" method="POST">
               <fieldset>
                    <legend>Inserir Evento</legend>
                    <p>
                         <label for="evenome"> Nome:</label>
                         <input type="text" name="evenome" id="evenome">
                    </p>
                    <p>
                         <label for="evedatainicio"> Data Inicio:</label>
                         <input type="datetime-local" name="evedatainicio" id="evedatainicio">
                    </p>
                    <p>
                         <label for="evedatatermino">Data Termino:</label>
                         <input type="datetime-local" name="evedatatermino" id="evedatatermino">
                    </p>
                    <p>
                         <label for="evedescricao">Descrição:</label>
					<textarea rows="6" cols="50" name="evedescricao" id="evedescricao" placeholder="Informe a Descrição do evento!"></textarea>
                    </p>
                    <p>
                         <label for="evefoto">Foto:</label>
                         <input type="text" name="evefoto" id="evefoto">
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
