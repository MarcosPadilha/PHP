<?php

session_start();

if((!isset ($_SESSION['login-name']) == true) and (!isset ($_SESSION['login-pass']) == true)){

     unset($_SESSION['login-name']);
	unset($_SESSION['login-pass']);
	header('location:index.php');
}

$rotaLista = "listar_Eventos.php";
$btn_name = "Listar Eventos";

require_once ("includes/header.php");
require_once ("../controllers/EventoController.php");

?>

<body>
     <div class="container">
          <?php
               $dados = EventoController::findForId($_POST['atualizar']);

               if (isset($_POST['cadastrar'])) {
                    EventoController::updateEvento($_POST['eventoCodigo'], $_POST['eventoNome']);
               }
          ?>

          <div class="col-md-12">
               <form action="" method="POST">
                    <legend>Inserir Evento</legend>

                    <div class="form-group row">
                         <label for="nomeEvento" class="col-sm-2 col-form-label">Nome</label>
                         <div class="col-sm-10">
                         <input name="eventoNome" type="text" class="form-control" id="nomeEvento" value="<?php echo $dados->EveNome; ?>"required>
                         </div>
                    </div>

                    <input type="hidden" name="eventoCodigo" value="<?php echo $dados->EveCodigo; ?>">

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
