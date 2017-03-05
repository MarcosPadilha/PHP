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
require_once ("../controllers/PalestranteController.php");

if(!empty($_POST)){
     PalestranteController::deletaPalestrante($_POST['del']);

     //header("Refresh:0");
}
?>

<body>
     <div class="container">
        <table class="table">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Especialização</th>
              <th>Descrição</th>
              <th>Foto</th>
              <th>Editar</th>
              <th>Excluir</th>
            </tr>
          </thead>
          <tbody>
          <?php
          foreach (PalestranteController::findPalestrante() as $key) {
               echo "<tr>
                     <td>" . (String)($key->PltNome) ."</td>".
                    "<td>" . (String)($key->PltEspecializacao) ."</td>".
                    "<td>" . (String)($key->PltDescricao) ."</td>".
                    "<td>" . (String)($key->PltFoto) ."</td>
                    <form method='post' action='atualizar_palestrante.php'>
                         <td>
                         <input type='hidden' name='atualizar' value='$key->PltCodigo'>
                         <button type='submit' class='btn btn-warning'>Atualizar</button>
                         </td>
                    </form>
                    <form method='post' action=''>
                         <td>
                              <input type='submit' class='btn btn-danger' name='deletta' value='Excluir'>
                              <input type='hidden' name='del' value='$key->PltCodigo'>
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
