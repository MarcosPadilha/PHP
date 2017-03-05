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
          $dados = RecursoController::findForId($_POST['atualizar']);
          if (isset($_POST['cadastrar'])){
               echo "BYRL";
               RecursoController::updateRecurso($_POST['recursoCodigo'],$_POST['recursoNome'], $_POST['recursoQuantidade']);

          }
          ?>
          <div class="col-md-12">
               <form action="" method="POST" enctype='multipart/form-data'>
                    <legend>Inserir Recurso</legend>

                    <div class="form-group row">
                          <label for="recursoNome" class="col-sm-2 col-form-label">Nome</label>
                          <div class="col-sm-10">
                            <input name="recursoNome" type="text" class="form-control" id="recursoNome" value="<?php echo $dados->RecNome; ?>"required>
                          </div>
                    </div>

                    <div class="form-group row">
                         <label for="recursoQuantidade" class="col-sm-2 col-form-label">Quantidade</label>
                         <div class="col-sm-10">
                            <input name="recursoQuantidade" type="number" class="form-control" id="recursoQuantidade" value="<?php echo $dados->RecQuantidade; ?>"required>
                         </div>
                    </div>

                    <input type="hidden" name="recursoCodigo" value="<?php echo $dados->RecCodigo; ?>">

                    <div class="form-group row">
                         <div class="offset-sm-2 col-sm-10">
                              <button name="cadastrar" type="submit" class="btn btn-primary" >Cadastrar</button>
                         </div>
                    </div>



               </form>
          </div>
     </div>
</body>

<?php require_once ("includes/footer.php"); ?>
