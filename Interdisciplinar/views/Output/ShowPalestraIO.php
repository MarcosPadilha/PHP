<?php

require_once ("../../../../Control/PalestraCL.php");
require_once ("../../../../Model/Bancodados/PalestraBD.php");
require_once ("../../../../Model/Business/PalestraBO.php");
require_once ("../../../../View/Html/Includes/Header.php");


PalestraCL::findPalestra();

if(!empty($_POST)){
     PalestraCL::deletaPalestra($_POST['del']);
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
                         <th>Descrição</th>
                         <th>Inicio</th>
                         <th>Termino</th>
                         <th>Logo</th>
                    </tr>
               </thead>
               <tbody>
               <?php
                    foreach (PalestraCL::findPalestra() as $key) {
                         echo "<tr>
                               <td>" . (String)($key->PalNome) ."</td>".
                              "<td>" . (String)($key->PalDescricao) ."</td>".
                              "<td>" . (String)($key->PalDataInicio) ."</td>".
                              "<td>" . (String)($key->PalDataTermino) ."</td>".
                              "<td>" . (String)($key->PalFotoCapa) ."</td>
                              <form method='post' action='atualizar.php'>
                        		     <td>
                        		 	     <input type='submit' class='btnaltexc' name='alterar' value='Alterar' id='alterar'>
                        		 	     <input type='hidden' name='upda' value='$key->PalCodigo'>
                        		     </td>
                        	     </form>
                              <form method='post' action=''>
                   		          <td>
                   		 		     <input type='submit' class='btnaltexc' name='deletta' value='Excluir'>
                   		 		     <input type='hidden' name='del' value='$key->PalCodigo'>
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
