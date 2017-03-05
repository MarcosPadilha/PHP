<?php

session_start();

if((!isset ($_SESSION['login-name']) == true) and (!isset ($_SESSION['login-pass']) == true)){

     unset($_SESSION['login-name']);
	unset($_SESSION['login-pass']);
	header('location:index.php');
}


$rotaLista = "listar_colaboradores.php";
$btn_name = "Listar Colaboradores";
require_once ("includes/header.php");
require_once ("../controllers/ColaboradorController.php");
?>

<body>
     <div class="container">

          <?php

               if (isset($_POST['cadastrar'])) {

                    if ($_POST['colaboradorEmail'] != $_POST['colaboradorEmailConfirmacao']) {                         
                         header('Location: ../views/criar_colaborador.php?conf=true');
                    }else if ($_POST['colaboradorSenha'] != $_POST['colaboradorSenhaConfirmacao']) {
                         header('Location: ../views/criar_colaborador.php?conf=false');
                    } else {

                    $datacheck = (int) $_POST['colaboradorData'];

                    if($datacheck > 2016){
                         header('Location: ../views/criar_colaborador.php?create=false');
                    }
                    ColaboradorController::newColaborador($_POST['colaboradorNome'], $_POST['colaboradorSobrenome'],
                    $_POST['colaboradorEndereco'], $_POST['colaboradorData'], $_POST['colaboradorEmail'],
                    $_POST['colaboradorSenha']);
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
                           <strong>Parabéns!</strong> Colaborador cadastrado com sucesso.
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
                    <legend>Inserir Colaborador</legend>

                    <div class="form-group row">
                          <label for="nomeColaborador" class="col-sm-2 col-form-label">Nome</label>
                          <div class="col-sm-10">
                            <input name="colaboradorNome" type="text" class="form-control" id="nomeColaborador" placeholder="Digite seu nome" required>
                          </div>
                    </div>

                    <div class="form-group row">
                         <label for="sobrenomeColaborador" class="col-sm-2 col-form-label">Sobrenome</label>
                         <div class="col-sm-10">
                              <input name="colaboradorSobrenome" type="text" class="form-control" id="sobrenomeColaborador" placeholder="Informe o Sobrenome do Aluno" required>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="enderecoColaborador" class="col-sm-2 col-form-label">Endereço</label>
                         <div class="col-sm-10">
                              <input name="colaboradorEndereco" type="text" class="form-control" id="enderecoColaborador" placeholder="Informe o Endereço do Aluno" required>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="dataColaborador" class="col-sm-2 col-form-label">Data de Nascimento</label>
                         <div class="col-sm-4">
                              <input name="colaboradorData" type="date" class="form-control" id="dataColaborador" placeholder="Digite o nome do evento" required>
                         </div>
                    </div>

                    <div class="form-group row">
                          <label for="emailColaborador" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input name="colaboradorEmail" type="email" class="form-control" id="emailColaborador" placeholder="Digite seu email" required>
                          </div>
                    </div>

                    <div class="form-group row">
                         <label for="emailConfirmacaoColaborador" class="col-sm-2 col-form-label">Confirmação de Email</label>
                         <div class="col-sm-10">
                              <input name="colaboradorEmailConfirmacao" type="email" class="form-control" id="emailConfirmacaoColaborador" placeholder="Confirme o email" required>
                         </div>
                    </div>


                    <div class="form-group row">
                          <label for="senhaColaborador" class="col-sm-2 col-form-label">Senha</label>
                          <div class="col-sm-5">
                            <input name="colaboradorSenha" type="password" class="form-control" id="senhaColaborador" placeholder="Digite sua senha" required>
                          </div>
                    </div>

                    <div class="form-group row">
                         <label for="senhaConfirmacaoColaborador" class="col-sm-2 col-form-label">Confirmação de Senha</label>
                         <div class="col-sm-4">
                         <input name="colaboradorSenhaConfirmacao" type="password" class="form-control" id="senhaConfirmacaoColaborador" placeholder="Confirme a senha" required>
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
