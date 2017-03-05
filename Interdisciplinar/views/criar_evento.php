<?php

session_start();

if((!isset ($_SESSION['login-name']) == true) and (!isset ($_SESSION['login-pass']) == true)){

     unset($_SESSION['login-name']);
	unset($_SESSION['login-pass']);
	header('location:index.php');
}


$rotaLista = "listar_eventos.php";
$btn_name = "Listar Eventos";
require_once ("includes/header.php");
require_once ("../controllers/EventoController.php");
?>

<body>
     <div class="container">

          <?php

               if (isset($_POST['cadastrar'])) {

                    $datacheck = (int) $_POST['eventoDataInicio'];
                    if($datacheck > 2016){
                         header('Location: ../views/criar_evento.php?create=false');
                    }
                    $datacheck = (int) $_POST['eventoDataTermino'];
                    if($datacheck > 2016){
                         header('Location: ../views/criar_evento.php?create=false');
                    }
                    

                    EventoController::newEvento($_POST['eventoNome'], $_POST['eventoDataInicio'], $_POST['eventoDataTermino'], $_POST['eventoDescricao']);

               }

               if(isset($_GET['create'])) {
                    if($_GET['create'] === 'true') {
                         echo '<div class="alert alert-success">
                           <strong>Parabéns!</strong> Evento cadastrado com sucesso.
                         </div>';
                    } else {
                         echo '<div class="alert alert-danger">
                           <strong>Erro!</strong> Formato de Data Invalido.
                         </div>';
                    }
               }
          ?>

          <div class="col-md-12">
               <form action="" method="POST">
                    <legend>Inserir Evento</legend>

                    <div class="form-group row">
                          <label for="nomeEvento" class="col-sm-2 col-form-label">Nome do Evento</label>
                          <div class="col-sm-10">
                            <input name="eventoNome" type="text" class="form-control" id="nomeEvento" placeholder="Digite o nome do evento" required>
                          </div>
                    </div>

                    <div class="form-group row">
                          <label for="dataInicioEvento" class="col-sm-2 col-form-label">Data de Inicio</label>
                          <div class="col-sm-4">
                               <input name="eventoDataInicio" type="datetime-local" class="form-control" id="dataInicioEvento" placeholder="Digite o nome do evento" required>
                          </div>
                    </div>

                    <div class="form-group row">
                         <label for="dataTerminoEvento" class="col-sm-2 col-form-label">Data de Termino</label>
                         <div class="col-sm-4">
                              <input name="eventoDataTermino" type="datetime-local" class="form-control" id="dataTerminoEvento" placeholder="Digite o nome do evento" required>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="descricaoEvento" class="col-sm-2 col-form-label">Descrição</label>                         <div class="col-sm-10">
                              <textarea style="resize:none;" class="form-control" rows="6" cols="50" name="eventoDescricao" id="descricaoEvento" placeholder="Informe a Descrição do evento!" required></textarea>
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
