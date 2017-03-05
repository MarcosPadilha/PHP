<?php

require_once ("../../../../Control/ColaboradorCL.php");
require_once ("../../../../Model/Bancodados/ColaboradorBD.php");
require_once ("../../../../Model/Business/ColaboradorBO.php");
require_once ("../../../../View/Html/Includes/Header.php");


ColaboradorCL::findColaborador();

if(!empty($_POST)){
     ColaboradorCL::deletaColaborador($_POST['del']);
     header("Refresh:0");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Colaboradores</title>
</head>
<body>
     <div id="interface">
          <table id="playlistTable">
               <caption>Lista de Colaboradores:</caption>
               <thead>
                    <tr>
                         <th>Nome</th>
                         <th>RA</th>
                         <th>Email</th>
                         <th>Senha</th>
                    </tr>
               </thead>
               <tbody>
               <?php
                    foreach (ColaboradorCL::findColaborador() as $key) {
                         echo "<tr>
                               <td>" . (String)($key->ColNome) ."</td>".
                              "<td>" . (String)($key->ColRA) ."</td>".
                              "<td>" . (String)($key->ColEmail) ."</td>".
                              "<td>" . (String)($key->ColSenha) ."</td>
                              <form method='post' action='atualizar.php'>
                        		     <td>
                        		 	     <input type='submit' class='btnaltexc' name='alterar' value='Alterar' id='alterar'>
                        		 	     <input type='hidden' name='upda' value='$key->ColCodigo'>
                        		     </td>
                        	     </form>
                              <form method='post' action=''>
                   		          <td>
                   		 		     <input type='submit' class='btnaltexc' name='deletta' value='Excluir'>
                   		 		     <input type='hidden' name='del' value='$key->ColCodigo'>
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
