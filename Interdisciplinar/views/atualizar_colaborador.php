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
               $dados = ColaboradorController::findForId2($_POST['atualizar']);

               if (isset($_POST['cadastrar'])) {
                    $datacheck = (int) $_POST['ColaboradorData'];
                    if($datacheck > 2016){
                         header('Location: ../views/listar_colaboradores.php?create=false');
                    }
                    ColaboradorController::updateColaborador($_POST['colaboradorCodigo'], $_POST['colaboradorNome'], $_POST['colaboradorSobrenome'],
                    $_POST['colaboradorEndereco'],$_POST['ColaboradorData'],$_POST['colaboradorEmail'],$_POST['colaboradorSenha']);
               }
          ?>

          <div class="col-md-12">
               <form action="" method="POST">
                    <legend>Inserir Colaborador</legend>

                    <div class="form-group row">
                         <label for="nomeColaborador" class="col-sm-2 col-form-label">Nome</label>
                         <div class="col-sm-10">
                         <input name="colaboradorNome" type="text" class="form-control" id="nomeColaborador" value="<?php echo $dados->ColNome; ?>"required>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="sobrenomeColaborador" class="col-sm-2 col-form-label">Sobrenome</label>
                         <div class="col-sm-10">
                              <input name="colaboradorSobrenome" type="text" class="form-control" id="sobrenomeColaborador" value="<?php echo $dados->ColSobrenome; ?>"required>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="enderecoColaborador" class="col-sm-2 col-form-label">Endereço</label>
                         <div class="col-sm-10">
                         <input name="colaboradorEndereco" type="text" class="form-control" id="enderecoColaborador" value="<?php echo $dados->ColEndereco; ?>" required>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="dataColaborador" class="col-sm-2 col-form-label">Data de Nascimento</label>
                         <div class="col-sm-4">
                              <input name="ColaboradorData" type="date" class="form-control" id="dataColaborador" value="<?php echo $dados->ColDataNasc; ?>"required>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="emailColaborador" class="col-sm-2 col-form-label">Email</label>
                         <div class="col-sm-10">
                              <input name="colaboradorEmail" type="email" class="form-control" id="emailColaborador" value="<?php echo $dados->ColEmail; ?>"required >
                         </div>
                    </div>


                    <div class="form-group row">
                         <label for="senhaColaborador" class="col-sm-2 col-form-label">Senha</label>
                         <div class="col-sm-4">
                         <input name="colaboradorSenha" type="password" class="form-control" id="senhaColno" value="<?php echo $dados->ColSenha; ?>"required>
                         </div>
                    </div>

                    <input type="hidden" name="colaboradorCodigo" value="<?php echo $dados->ColCodigo; ?>">

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
