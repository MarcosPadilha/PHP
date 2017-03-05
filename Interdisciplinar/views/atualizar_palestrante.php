<?php
session_start();

if((!isset ($_SESSION['login-name']) == true) and (!isset ($_SESSION['login-pass']) == true)){

     unset($_SESSION['login-name']);
	unset($_SESSION['login-pass']);
	header('location:index.php');
}


$rotaLista = "listar_palestrantes.php";
$btn_name = "Listar Palestrantes";

require_once ("includes/header.php");
require_once ("../controllers/PalestranteController.php");


?>

<body>
     <div class="container">

     <?php
          $dados = PalestranteController::findForId($_POST['atualizar']);
          if (isset($_POST['cadastrar'])){
               echo "BYRL";
               PalestranteController::updatePalestrante($_POST['palestranteCodigo'],$_POST['palestranteNome'], $_POST['palestranteEspec'], $_POST['palestranteDescricao']);

          }
          ?>
          <div class="col-md-12">
               <form action="" method="POST" enctype='multipart/form-data'>
                    <legend>Inserir Palestrante</legend>

                    <div class="form-group row">
                          <label for="palestranteNome" class="col-sm-2 col-form-label">Nome da Palestrante</label>
                          <div class="col-sm-10">
                            <input name="palestranteNome" type="text" class="form-control" id="palestranteNome"value="<?php echo $dados->PltNome; ?>"required>
                          </div>
                    </div>

                    <div class="form-group row">
                         <label for="palestranteEspec" class="col-sm-2 col-form-label">Especialização</label>
                         <div class="col-sm-10">
                            <input name="palestranteEspec" type="text" class="form-control" id="palestranteEspec"value="<?php echo $dados->PltEspecializacao; ?>"required>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="palestranteDescricao" class="col-sm-2 col-form-label">Descrição</label>
                         <div class="col-sm-10">
                              <textarea class="form-control" style='resize:none;' rows="6" cols="50" name="palestranteDescricao" id="palestranteDescricao" placeholder="<?php echo $dados->PltDescricao; ?>" value="<?php echo $dados->PltDescricao; ?>"required></textarea>
                         </div>
                    </div>


                    <input type="hidden" name="palestranteCodigo" value="<?php echo $dados->PltCodigo; ?>">


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
