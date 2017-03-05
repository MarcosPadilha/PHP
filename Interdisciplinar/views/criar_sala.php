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

               if (isset($_POST['cadastrar'])) {
                    SalaController::newSala($_POST['salaNumero'], $_POST['salaCapacidade']);

               }

               if(isset($_GET['create'])) {
                    if($_GET['create'] === 'true') {
                         echo '<div class="alert alert-success">
                           <strong>Parabéns!</strong> Sala cadastrada com sucesso.
                         </div>';
                    } else {
                         echo '<div class="alert alert-danger">
                           <strong>Erro!</strong> Não foi possivel cadastrar a Sala.
                         </div>';
                    }
               }
          ?>
          <div class="col-md-12">
               <form action="" method="POST">
                    <legend>Inserir Sala</legend>

                    <div class="form-group row">
                          <label for="nomeSala" class="col-sm-2 col-form-label">Número</label>
                          <div class="col-sm-5">
                            <input name="salaNumero" type="number" class="form-control" id="nomeSala" placeholder="Digite o Número da Sala" required>
                          </div>
                    </div>

                    <div class="form-group row">
                          <label for="capacidadeSala" class="col-sm-2 col-form-label">Capacidade</label>
                          <div class="col-sm-5">
                            <input name="salaCapacidade" type="number" class="form-control" id="capacidadeSala" placeholder="Informe a Capacidade" required>
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
