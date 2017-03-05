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
require_once ("../controllers/RecursoController.php");

if(!empty($_POST)){
     RecursoController::deletaRecurso($_POST['del']);

     //header("Refresh:0");
}

if(isset($_GET['atualizado'])) {
          echo '<div class="alert alert-success">
                    <strong>Parabéns!</strong> Aluno Atualizado com Sucesso.
               </div>'
          ;
}
?>

<body>
     <div class="container">
        <table class="table">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Quantidade</th>
              <th>Editar</th>
              <th>Excluir</th>
            </tr>
          </thead>
          <tbody>
          <?php
          foreach (RecursoController::findRecurso() as $key) {
               echo "<tr>
                     <td>" . (String)($key->RecNome) ."</td>".
                    "<td>" . (String)($key->RecQuantidade) ."</td>
                    <form method='post' action='atualizar_recurso.php'>
                         <td>
                         <input type='hidden' name='atualizar' value='$key->RecCodigo'>
                         <button type='submit' class='btn btn-warning'>Atualizar</button>
                         </td>
                    </form>
                    <form method='post' action=''>
                         <td>
                              <input type='submit' class='btn btn-danger' name='deletta' value='Excluir'>
                              <input type='hidden' name='del' value='$key->RecCodigo'>
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
