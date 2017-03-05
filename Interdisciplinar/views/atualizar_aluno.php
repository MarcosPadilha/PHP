<?php

session_start();

if((!isset ($_SESSION['login-name']) == true) and (!isset ($_SESSION['login-pass']) == true)){

     unset($_SESSION['login-name']);
	unset($_SESSION['login-pass']);
	header('location:index.php');
}

$rotaLista = "listar_alunos.php";
$btn_name = "Listar Alunos";

require_once ("includes/header.php");
require_once ("../controllers/AlunoController.php");

?>

<body>
     <div class="container">
          <?php
               $dados = AlunoController::findForId2($_POST['atualizar']);

               if (isset($_POST['cadastrar'])) {
                    $datacheck = (int) $_POST['alunoData'];
                    if($datacheck > 2016){
                         header('Location: ../views/listar_alunos.php?create=false');
                    }
                    AlunoController::updateAluno($_POST['alunoCodigo'], $_POST['alunoNome'], $_POST['alunoSobrenome'],
                    $_POST['alunoEndereco'],$_POST['alunoData'],$_POST['alunoEmail'],$_POST['alunoSenha']);
               }
          ?>

          <div class="col-md-12">
               <form action="" method="POST">
                    <legend>Inserir Aluno</legend>

                    <div class="form-group row">
                         <label for="nomeAluno" class="col-sm-2 col-form-label">Nome</label>
                         <div class="col-sm-10">
                         <input name="alunoNome" type="text" class="form-control" id="nomeAluno" value="<?php echo $dados->AluNome; ?>"required>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="sobrenomeAluno" class="col-sm-2 col-form-label">Sobrenome</label>
                         <div class="col-sm-10">
                              <input name="alunoSobrenome" type="text" class="form-control" id="sobrenomeAluno" value="<?php echo $dados->AluSobrenome; ?>"required>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="enderecoAluno" class="col-sm-2 col-form-label">Endereço</label>
                         <div class="col-sm-10">
                         <input name="alunoEndereco" type="text" class="form-control" id="enderecoAluno" value="<?php echo $dados->AluEndereco; ?>" required>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="dataAluno" class="col-sm-2 col-form-label">Data de Nascimento</label>
                         <div class="col-sm-4">
                              <input name="alunoData" type="date" class="form-control" id="dataAluno" value="<?php echo $dados->AluDataNasc; ?>"required>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="emailAluno" class="col-sm-2 col-form-label">Email</label>
                         <div class="col-sm-10">
                              <input name="alunoEmail" type="email" class="form-control" id="emailAluno" value="<?php echo $dados->AluEmail; ?>" required>
                         </div>
                    </div>


                    <div class="form-group row">
                         <label for="senhaAluno" class="col-sm-2 col-form-label">Senha</label>
                         <div class="col-sm-4">
                         <input name="alunoSenha" type="password" class="form-control" id="senhaAluno" value="<?php echo $dados->AluSenha; ?>"required>
                         </div>
                    </div>

                    <input type="hidden" name="alunoCodigo" value="<?php echo $dados->AluCodigo; ?>">

                    <div class="form-group row">
                         <div class="offset-sm-2 col-sm-10">
                              <input  name="cadastrar" id="cadastrar" type="submit" class="btn btn-primary" value="Alterar">
                         </div>
                    </div>

               </form>
          </div>
     </div>
</body>

<?php require_once ("includes/footer.php");

?>
