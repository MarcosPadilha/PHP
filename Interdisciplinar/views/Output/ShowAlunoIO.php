<?php

require_once ("../../../../Control/AlunoCL.php");
require_once ("../../../../Model/Bancodados/AlunoBD.php");
require_once ("../../../../Model/Business/AlunoBO.php");
require_once ("../../../../View/Html/Includes/Header.php");


AlunoCL::findAluno();

if(!empty($_POST)){
     AlunoCL::deletaAluno($_POST['del']);
     header("Refresh:0");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    
    <title>Alunos</title>
</head>
<body>
     <div id="interface">
          <table id="playlistTable">
               <caption>Lista de Alunos:</caption>
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
                    foreach (AlunoCL::findAluno() as $key) {
                         echo "<tr>
                               <td>" . (String)($key->AluNome) ."</td>".
                              "<td>" . (String)($key->AluRA) ."</td>".
                              "<td>" . (String)($key->AluEmail) ."</td>".
                              "<td>" . (String)($key->AluSenha) ."</td>
                              <form method='post' action='atualizar.php'>
                        		     <td>
                        		 	     <input type='submit' class='btnaltexc' name='alterar' value='Alterar' id='alterar'>
                        		 	     <input type='hidden' name='upda' value='$key->AluCodigo'>
                        		     </td>
                        	     </form>
                              <form method='post' action=''>
                   		          <td>
                   		 		     <input type='submit' class='btnaltexc' name='deletta' value='Excluir'>
                   		 		     <input type='hidden' name='del' value='$key->AluCodigo'>
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
