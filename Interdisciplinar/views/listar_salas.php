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
require_once ("../controllers/SalaController.php");

if(!empty($_POST)){
     SalaController::deletaSala($_POST['del']);

     //header("Refresh:0");
}

if(isset($_GET['atualizado'])) {
          echo '<div class="alert alert-success">
                    <strong>Parabéns!</strong> Evento Atualizada com Sucesso.
               </div>'
          ;
}
?>

<body>
     <div class="container">
        <table class="table">
          <thead>
            <tr>
              <th>Número</th>
              <th>Capacidade</th>
              <th>Editar</th>
              <th>Excluir</th>
            </tr>
          </thead>
          <tbody>
          <?php
          foreach (SalaController::findSala() as $key) {
               echo "<tr>
                     <td>" . (String)($key->SalNumero) ."</td>".
                    "<td>" . (String)($key->SalCapacidade) ."</td>
                    <form method='post' action='atualizar_sala.php'>
                         <td>
                         <input type='hidden' name='atualizar' value='$key->SalCodigo'>
                         <button type='submit' class='btn btn-warning'>Atualizar</button>
                         </td>
                    </form>
                    <form method='post' action=''>
                         <td>
                              <input type='submit' class='btn btn-danger' name='deletta' value='Excluir'>
                              <input type='hidden' name='del' value='$key->SalCodigo'>
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
