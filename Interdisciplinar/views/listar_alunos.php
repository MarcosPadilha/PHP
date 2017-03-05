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
require_once ("../controllers/AlunoController.php");

if(!empty($_POST)){
     AlunoController::deletaAluno($_POST['del']);
     //header("Refresh:0");
}

if(isset($_GET['atualizado'])) {
          echo '<div class="alert alert-success">
                    <strong>Parabéns!</strong> Aluno Atualizado com Sucesso.
               </div>'
          ;
}
if(isset($_GET['create'])) {
     if($_GET['create'] === 'true') {
          echo '<div class="alert alert-success">
            <strong>Parabéns!</strong> Aluno cadastrado com sucesso.
          </div>';
     } else {
          echo '<div class="alert alert-danger">
            <strong>Erro!</strong> Formato de data Invalido, digite a data de nascimento corretamente.
          </div>';
     }
}

?>

<body>
     <div class="container">
          <table class="table">
               <thead>
                    <tr>
                         <th>RA</th>
                         <th>Nome</th>
                         <th>Sobrenome</th>
                         <th>Email</th>
                         <th>Senha</th>
                         <th>Nascimento</th>
                         <th>Endereço</th>
                         <th>Editar</th>
                         <th>Excluir</th>
                    </tr>
               </thead>
          <tbody>
          <?php
          foreach (AlunoController::findAluno() as $key) {
               echo "<tr>
                     <td>" . (String)($key->AluCodigo) ."</td>".
                     "<td>" . (String)($key->AluNome) ."</td>".
                    "<td>" . (String)($key->AluSobrenome) ."</td>".
                    "<td>" . (String)($key->AluEmail) ."</td>".
                    "<td>" . (String)($key->AluSenha) ."</td>".
                    "<td>" . (String)($key->AluDataNasc) ."</td>".
                    "<td>" . (String)($key->AluEndereco) ."</td>
                    <form method='POST' action='atualizar_aluno.php'>
                         <td>
					     <input type='hidden' name='atualizar' value='$key->AluCodigo'>
					     <button type='submit' class='btn btn-warning'>Atualizar</button>
                         </td>
                    </form>
                    <form method='post' action=''>
                         <td>
                              <input type='submit' class='btn btn-danger' name='deletta' value='Excluir'>
                              <input type='hidden' name='del' value='$key->AluCodigo'>
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
