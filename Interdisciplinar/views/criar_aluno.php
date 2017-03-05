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
               if (isset($_POST['cadastrar'])) {

                    if ($_POST['alunoEmail'] != $_POST['alunoEmailConfirmacao']) {
                         header('Location: ../views/criar_aluno.php?conf=true');
                    }else if ($_POST['alunoSenha'] != $_POST['alunoSenhaConfirmacao']) {
                         header('Location: ../views/criar_aluno.php?conf=false');
                    } else {

                    $datacheck = (int) $_POST['alunoData'];
                    if($datacheck > 2016){
                         header('Location: ../views/criar_aluno.php?create=false');
                    }
                    AlunoController::newAluno($_POST['alunoNome'], $_POST['alunoSobrenome'], $_POST['alunoEndereco'],
                    $_POST['alunoData'], $_POST['alunoEmail'],$_POST['alunoSenha']);
               }}
               if(isset($_GET['conf'])) {
                    if($_GET['conf'] === 'true') {
                         echo '<div class="alert alert-danger">
                           <strong>Parabéns!</strong> O Email Não Confere
                         </div>';
                    } else {
                         echo '<div class="alert alert-danger">
                           <strong>Erro!</strong> A Senha Não Confere.
                         </div>';
                    }
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
          <div class="col-md-12">
               <form action="" method="POST">
                    <legend>Inserir Aluno</legend>

                    <div class="form-group row">
                         <label for="nomeAluno" class="col-sm-2 col-form-label">Nome</label>
                         <div class="col-sm-10">
                         <input name="alunoNome" type="text" class="form-control" id="nomeAluno" placeholder="Informe o Nome do Aluno" required>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="sobrenomeAluno" class="col-sm-2 col-form-label">Sobrenome</label>
                         <div class="col-sm-10">
                              <input name="alunoSobrenome" type="text" class="form-control" id="sobrenomeAluno" placeholder="Informe o Sobrenome do Aluno" required>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="enderecoAluno" class="col-sm-2 col-form-label">Endereço</label>
                         <div class="col-sm-10">
                         <input name="alunoEndereco" type="datepicker" class="form-control" id="enderecoAluno" placeholder="Informe o Endereço do Aluno" required>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="dataAluno" class="col-sm-2 col-form-label">Data de Nascimento</label>
                         <div class="col-sm-4">
                              <input name="alunoData" type="date"  class="form-control" id="dataAluno" placeholder="Digite o nome do evento" required>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="emailAluno" class="col-sm-2 col-form-label">Email</label>
                         <div class="col-sm-10">
                              <input name="alunoEmail" type="email" class="form-control" id="emailAluno" placeholder="Digite seu email" required>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="emailConfirmacaoAluno" class="col-sm-2 col-form-label">Confirmação de Email</label>
                         <div class="col-sm-10">
                              <input name="alunoEmailConfirmacao" type="email" class="form-control" id="emailConfirmacaoAluno" placeholder="Confirme o email" required>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="senhaAluno" class="col-sm-2 col-form-label">Senha</label>
                         <div class="col-sm-4">
                         <input name="alunoSenha" type="password" class="form-control" id="senhaAluno" placeholder="Digite sua senha" required>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="senhaConfirmacaoAluno" class="col-sm-2 col-form-label">Confirmação de Senha</label>
                         <div class="col-sm-4">
                         <input name="alunoSenhaConfirmacao" type="password" class="form-control" id="senhaConfirmacaoAluno" placeholder="Confirme a senha" required>
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
