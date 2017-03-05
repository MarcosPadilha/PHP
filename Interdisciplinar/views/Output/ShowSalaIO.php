<?php

require_once ("../../../../Control/SalaCL.php");
require_once ("../../../../Model/Bancodados/SalaBD.php");
require_once ("../../../../Model/Business/SalaBO.php");
require_once ("../../../../View/Html/Includes/Header.php");


SalaCL::findSala();

if(!empty($_POST)){
     SalaCL::deletaSala($_POST['del']);
     header("Refresh:0");
}

?>

<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <title>Salas</title>
</head>
<body>
     <div id="interface">
          <table id="playlistTable">
               <caption>Lista de Salas:</caption>
               <thead>
                    <tr>
                         <th>Número</th>
                         <th>Capacidade</th>
                         <th>Ar Condicionado</th>
                         <th>Tamanho</th>
                    </tr>
               </thead>
               <tbody>
               <?php
                    foreach (SalaCL::findSala() as $key) {
                         echo "<tr>
                               <td>" . (String)($key->SalNumero) ."</td>".
                              "<td>" . (String)($key->SalCapacidade) ."</td>".
                              "<td>" . (String)($key->SalArCond) ."</td>".
                              "<td>" . (String)($key->SalTamQuadro) ."</td>
                              <form method='post' action='atualizar.php'>
                        		     <td>
                        		 	     <input type='submit' class='btnaltexc' name='alterar' value='Alterar' id='alterar'>
                        		 	     <input type='hidden' name='upda' value='$key->SalCodigo'>
                        		     </td>
                        	     </form>
                              <form method='post' action=''>
                   		          <td>
                   		 		     <input type='submit' class='btnaltexc' name='deletta' value='Excluir'>
                   		 		     <input type='hidden' name='del' value='$key->SalCodigo'>
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
