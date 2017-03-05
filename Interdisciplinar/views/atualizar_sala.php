<?php
session_start();

if((!isset ($_SESSION['login-name']) == true) and (!isset ($_SESSION['login-pass']) == true)){

     unset($_SESSION['login-name']);
	unset($_SESSION['login-pass']);
	header('location:index.php');
}


$rotaLista = "listar_salas.php";
$btn_name = "Listar Salas";

require_once ("includes/header.php");
require_once ("../controllers/SalaController.php");


?>

<body>
     <div class="container">

     <?php
          $dados = SalaController::findForId($_POST['atualizar']);
          if (isset($_POST['cadastrar'])){
               echo "BYRL";
               SalaController::updateSala($_POST['salaCodigo'],$_POST['salaNumero'], $_POST['salaCapacidade']);

          }
          ?>
          <div class="col-md-12">
               <form action="" method="POST" enctype='multipart/form-data'>
                    <legend>Inserir Sala</legend>

                    <div class="form-group row">
                          <label for="salaNumero" class="col-sm-2 col-form-label">Número</label>
                          <div class="col-sm-10">
                            <input name="salaNumero" type="number" class="form-control" id="salaNumero" value="<?php echo $dados->SalNumero; ?>"required>
                          </div>
                    </div>

                    <div class="form-group row">
                         <label for="salaCapacidade" class="col-sm-2 col-form-label">Capacidade</label>
                         <div class="col-sm-10">
                            <input name="salaCapacidade" type="number" class="form-control" id="salaCapacidade" value="<?php echo $dados->SalCapacidade; ?>"required>
                         </div>
                    </div>

                    <input type="hidden" name="salaCodigo" value="<?php echo $dados->SalCodigo; ?>">

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
