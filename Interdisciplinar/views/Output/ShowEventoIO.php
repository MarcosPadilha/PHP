<?php

require_once ("../../../../Control/EventoCL.php");
require_once ("../../../../Model/Bancodados/EventoBD.php");
require_once ("../../../../Model/Business/EventoBO.php");
require_once ("../../../../View/Html/Includes/Header.php");


EventoCL::findEvento();

if(!empty($_POST)){
     EventoCL::deletaEvento($_POST['del']);
     header("Refresh:0");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Eventos</title>
</head>
<body>
     <div id="interface">
          <table id="playlistTable">
               <caption>Lista de Alunos:</caption>
               <thead>
                    <tr>
                         <th>Nome</th>
                         <th>Inicio</th>
                         <th>Termino</th>
                         <th>Descrição</th>
                         <th>Logo</th>
                    </tr>
               </thead>
               <tbody>
               <?php
                    foreach (EventoCL::findEvento() as $key) {
                         echo "<tr>
                               <td>" . (String)($key->EveNome) ."</td>".
                              "<td>" . (String)($key->EveDataInicio) ."</td>".
                              "<td>" . (String)($key->EveDataTermino) ."</td>".
                              "<td>" . (String)($key->EveDescricao) ."</td>".
                              "<td>" . (String)($key->EveLogo) ."</td>
                              <form method='post' action='atualizar.php'>
                        		     <td>
                        		 	     <input type='submit' class='btnaltexc' name='alterar' value='Alterar' id='alterar'>
                        		 	     <input type='hidden' name='upda' value='$key->EveCodigo'>
                        		     </td>
                        	     </form>
                              <form method='post' action=''>
                   		          <td>
                   		 		     <input type='submit' class='btnaltexc' name='deletta' value='Excluir'>
                   		 		     <input type='hidden' name='del' value='$key->EveCodigo'>
                   			     </td>
                   		     </form>
                         </tr>";
                    }
               ?>
               </tbody>
          </table>
     </div>
</body>
</html>
