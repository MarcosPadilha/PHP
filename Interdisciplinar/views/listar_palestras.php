<?php

session_start();

if((!isset ($_SESSION['login-name']) == true) and (!isset ($_SESSION['login-pass']) == true)){

     unset($_SESSION['login-name']);
	unset($_SESSION['login-pass']);
	header('location:index.php');
}


$rotaLista = "home.php";
$btn_name = "";

require_once ("includes/header.php");
require_once ("../controllers/PalestraController.php");

if(!empty($_POST)){
     PalestraController::deletaPalestra($_POST['del']);
     //header("Refresh:0");
}

if(isset($_GET['atualizado'])) {
          echo '<div class="alert alert-success">
                    <strong>Parabéns!</strong> Palestra Atualizada com Sucesso.
               </div>'
          ;
}

?>

<body>
     <div class="container">
        <table class="table">
          <thead>
            <tr>
              <th>Cod. Palestra</th>
              <th>Nome</th>
              <th>Data Início</th>
              <th>Data Término</th>
              <th>Cod. Sala</th>
              <th>Cod. Evento</th>
              <th>Editar</th>
              <th>Excluir</th>
            </tr>
          </thead>
          <tbody>
          <?php
          foreach (PalestraController::findPalestra() as $key) {
               echo "<tr>
                     <td>" . (String)($key->PalCodigo) ."</td>".
                    "<td>" . (String)($key->PalNome) ."</td>".
                    "<td>" . (String)($key->PalDataInicio) ."</td>".
                    "<td>" . (String)($key->PalDataTermino) ."</td>".
                    "<td>" . (String)($key->SalCodigo) ."</td>".
                    "<td>" . (String)($key->EveCodigo) ."</td>
                    <form method='post' action='atualizar_palestra.php'>
                    <td>
                         <input type='hidden' name='atualizar' value='$key->PalCodigo'>
                         <button type='submit' class='btn btn-warning'>Atualizar</button>
                    </td>
                    </form>
                    <form method='post' action=''>
                         <td>
                              <input type='submit' class='btn btn-danger' name='deletta' value='Excluir'>
                              <input type='hidden' name='del' value='$key->PalCodigo'>
                         </td>
                    </form>
               </tr>";
          }
     ?>
          </tbody>
        </table>
      </div>
     </div>
</body>

<?php require_once ("includes/footer.php"); ?>
