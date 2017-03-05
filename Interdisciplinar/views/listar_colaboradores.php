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
require_once ("../controllers/ColaboradorController.php");

if(!empty($_POST)){
     ColaboradorController::deletaColaborador($_POST['del']);

     //header("Refresh:0");
}

if(isset($_GET['atualizado'])) {
          echo '<div class="alert alert-success">
                    <strong>Parabéns!</strong> Colaborador Atualizado com Sucesso.
               </div>'
          ;
}
if(isset($_GET['create'])) {
     if($_GET['create'] === 'true') {
          echo '<div class="alert alert-success">
            <strong>Parabéns!</strong> Colaborador cadastrado com sucesso.
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
               foreach (ColaboradorController::findColaborador() as $key) {
                    echo "<tr>
                         <td>" . (String)($key->ColCodigo) ."</td>".
                         "<td>" . (String)($key->ColNome) ."</td>".
                         "<td>" . (String)($key->ColSobrenome) ."</td>".
                         "<td>" . (String)($key->ColEmail) ."</td>".
                         "<td>" . (String)($key->ColSenha) ."</td>".
                         "<td>" . (String)($key->ColDataNasc) ."</td>".
                         "<td>" . (String)($key->ColEndereco) ."</td>
                         <form method='post' action='atualizar_colaborador.php'>
                              <td>
                                   <input type='submit' class='btn btn-warning' name='alterar' value='Alterar' id='alterar'>
                                   <input type='hidden' name='atualizar' value='$key->ColCodigo'>
                              </td>
                         </form>
                         <form method='post' action=''>
                              <td>
                                   <input type='submit' class='btn btn-danger' name='deletta' value='Excluir'>
                                   <input type='hidden' name='del' value='$key->ColCodigo'>
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
