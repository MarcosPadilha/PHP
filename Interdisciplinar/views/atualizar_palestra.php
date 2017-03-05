<?php
session_start();

if((!isset ($_SESSION['login-name']) == true) and (!isset ($_SESSION['login-pass']) == true)){

     unset($_SESSION['login-name']);
	unset($_SESSION['login-pass']);
	header('location:index.php');
}


$rotaLista = "listar_palestras.php";
$btn_name = "Listar Palestras";

require_once ("includes/header.php");
require_once ("../controllers/PalestraController.php");
require_once ("../controllers/PalestranteController.php");
require_once ("../controllers/SalaController.php");
require_once ("../controllers/EventoController.php");
require_once ("../controllers/FotoUpload.php");



?>

<body>
     <div class="container">

     <?php
          $dados = PalestraController::findForId($_POST['atualizar']);
          if (isset($_POST['cadastrar'])){

               PalestraController::updatePalestra($_POST['palestraCodigo'],$_POST['palestraNome'], $_POST['palestraDescricao']);

          }
          ?>
          <div class="col-md-12">
               <form action="" method="POST" enctype='multipart/form-data'>
                    <legend>Inserir Palestra</legend>

                    <div class="form-group row">
                          <label for="nomePalestra" class="col-sm-2 col-form-label">Nome da Palestra</label>
                          <div class="col-sm-10">
                            <input name="palestraNome" type="text" class="form-control" id="nomePalestra"value="<?php echo $dados->PalNome; ?>"required>
                          </div>
                    </div>

                    <div class="form-group row">
                         <label for="descricaoPalestra" class="col-sm-2 col-form-label">Descrição</label>
                         <div class="col-sm-10">
                              <textarea class="form-control" style='resize:none;' rows="6" cols="50" name="palestraDescricao" id="descricaoPalestra" placeholder="<?php echo $dados->PalDescricao; ?>" value="<?php echo $dados->PalDescricao; ?>"required></textarea>
                         </div>
                    </div>


                    <input type="hidden" name="palestraCodigo" value="<?php echo $dados->PalCodigo; ?>">


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
