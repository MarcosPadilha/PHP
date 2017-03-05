<?php

require_once ("../../../../Control/RecursoCL.php");
require_once ("../../../../Model/Bancodados/RecursoBD.php");
require_once ("../../../../Model/Business/RecursoBO.php");
require_once ("../../../../View/Html/Includes/Header.php");


RecursoCL::findRecurso();

if(!empty($_POST)){
     RecursoCL::deletaRecurso($_POST['del']);
     header("Refresh:0");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Recursos</title>
</head>
<body>
     <div id="interface">
          <table id="playlistTable">
               <caption>Lista de Recursos:</caption>
               <thead>
                    <tr>
                         <th>Nome</th>
                         <th>Quantidade</th>
                    </tr>
               </thead>
               <tbody>
               <?php
                    foreach (RecursoCL::findRecurso() as $key) {
                         echo "<tr>
                               <td>" . (String)($key->RecNome) ."</td>".
                              "<td>" . (String)($key->RecQuantidade) ."</td>
                              <form method='post' action='atualizar.php'>
                        		     <td>
                        		 	     <input type='submit' class='btnaltexc' name='alterar' value='Alterar' id='alterar'>
                        		 	     <input type='hidden' name='upda' value='$key->RecCodigo'>
                        		     </td>
                        	     </form>
                              <form method='post' action=''>
                   		          <td>
                   		 		     <input type='submit' class='btnaltexc' name='deletta' value='Excluir'>
                   		 		     <input type='hidden' name='del' value='$key->RecCodigo'>
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
