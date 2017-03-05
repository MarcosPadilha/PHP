<?php

require_once ("../../../../Control/PalestranteCL.php");
require_once ("../../../../Model/Bancodados/PalestranteBD.php");
require_once ("../../../../Model/Business/PalestranteBO.php");
require_once ("../../../../View/Html/Includes/Header.php");


PalestranteCL::findPalestrante();

if(!empty($_POST)){
     PalestranteCL::deletaPalestrante($_POST['del']);
     header("Refresh:0");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Palestrantes</title>
</head>
<body>
     <div id="interface">
          <table id="playlistTable">
               <caption>Lista de Palestrantes:</caption>
               <thead>
                    <tr>
                         <th>Nome</th>
                         <th>Especialização</th>
                         <th>Descricao</th>
                         <th>Foto</th>
                    </tr>
               </thead>
               <tbody>
               <?php
                    foreach (PalestranteCL::findPalestrante() as $key) {
                         echo "<tr>
                               <td>" . (String)($key->PltNome) ."</td>".
                              "<td>" . (String)($key->PltEspecializacao) ."</td>".
                              "<td>" . (String)($key->PltDescricao) ."</td>".
                              "<td>" . (String)($key->PltFoto) ."</td>
                              <form method='post' action='atualizar.php'>
                        		     <td>
                        		 	     <input type='submit' class='btnaltexc' name='alterar' value='Alterar' id='alterar'>
                        		 	     <input type='hidden' name='upda' value='$key->PltCodigo'>
                        		     </td>
                        	     </form>
                              <form method='post' action=''>
                   		          <td>
                   		 		     <input type='submit' class='btnaltexc' name='deletta' value='Excluir'>
                   		 		     <input type='hidden' name='del' value='$key->PltCodigo'>
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
