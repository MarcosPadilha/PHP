<?php

session_start();

if((!isset ($_SESSION['login-name']) == true) and (!isset ($_SESSION['login-pass']) == true)){

     unset($_SESSION['login-name']);
	unset($_SESSION['login-pass']);
	header('location:index.php');
}


$rotaLista = "listar_recursos.php";
$btn_name = "Listar Recursos";
require_once ("includes/header.php");
require_once ("../controllers/RecursoController.php");
?>

<body>
     <div class="container">

          <?php

               if (isset($_POST['cadastrar'])) {
                    RecursoController::newRecurso($_POST['recursoNome'], $_POST['recursoQuantidade']);

               }

               if(isset($_GET['create'])) {
                    if($_GET['create'] === 'true') {
                         echo '<div class="alert alert-success">
                           <strong>Parabéns!</strong> Recurso cadastrado com sucesso.
                         </div>';
                    } else {
                         echo '<div class="alert alert-danger">
                           <strong>Erro!</strong> Não foi possivel cadastrar o usuário.
                         </div>';
                    }
               }
          ?>
          <div class="col-md-12">
               <form action="" method="POST">
                    <legend>Inserir Recurso</legend>

                    <div class="form-group row">
                          <label for="nomeRecurso" class="col-sm-2 col-form-label">Nome</label>
                          <div class="col-sm-10">
                            <input name="recursoNome" type="text" class="form-control" id="nomeRecurso" placeholder="Digite o nome do recurso" required>
                          </div>
                    </div>

                    <div class="form-group row">
                          <label for="quantidadeRecurso" class="col-sm-2 col-form-label">Quantidade</label>
                          <div class="col-sm-5">
                            <input name="recursoQuantidade" type="number" class="form-control" id="quantidadeRecurso" placeholder="Informe a Quantidade" required>
                          </div>
                    </div>

                    <div class="form-group row">
                     <div class="offset-sm-2 col-sm-10">
                       <button name="cadastrar" type="submit" class="btn btn-primary">Cadastrar</button>
                     </div>
                    </div>

               </form>
          </div>
     </div>
</body>

<?php require_once ("includes/footer.php"); ?>
