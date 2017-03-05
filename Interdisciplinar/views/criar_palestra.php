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
require_once ("../controllers/RecursoController.php");
require_once ("../controllers/FotoUpload.php");



?>

<body>
     <div class="container">

          <?php

          if (! empty($_FILES['palestraFoto']) && (isset($_POST['cadastrar']))){
               $datacheck = (int) $_POST['palestraDataInicio'];
               if($datacheck > 2016){
                    header('Location: ../views/criar_palestra.php?create=false');
               }
               $datacheck = (int) $_POST['palestraDataTermino'];
               if($datacheck > 2016){
                    header('Location: ../views/criar_palestra.php?create=false');
               }
               $upload = new FotoUpload($_FILES['palestraFoto'], 250, 250, "../views/images/");

               PalestraController::newPalestra($_POST['palestraNome'], $_POST['palestraDescricao'],
               $upload->salvar(), $_POST['palestraDataInicio'], $_POST['palestraDataTermino'],
               $_POST['palestraSala'], $_POST['palestraPalestrante'], $_POST['palestraEvento'], $_POST['palestraRecurso']);

          }

          if(isset($_GET['create'])) {
               if($_GET['create'] === 'true') {
                    echo '<div class="alert alert-success">
                      <strong>Parabéns!</strong> Palestra cadastrada com sucesso.
                    </div>';
               } else {
                    echo '<div class="alert alert-danger">
                      <strong>Erro!</strong>  Formato de data Invalido.
                    </div>';
               }
          }
          ?>
          <div class="col-md-12">
               <form action="" method="POST" enctype='multipart/form-data'>
                    <legend>Inserir Palestra</legend>

                    <div class="form-group row">
                          <label for="nomePalestra" class="col-sm-2 col-form-label">Nome da Palestra</label>
                          <div class="col-sm-10">
                            <input name="palestraNome" type="text" class="form-control" id="nomePalestra" placeholder="Informe o nome da palestra" required>
                          </div>
                    </div>

                    <div class="form-group row">
                         <label for="descricaoPalestra" class="col-sm-2 col-form-label">Descrição</label>
                         <div class="col-sm-10">
                              <textarea class="form-control" style='resize:none;' rows="6" cols="50" name="palestraDescricao" id="descricaoPalestra" placeholder="Informe a Descrição da Palestra!" required></textarea>
                         </div>
                    </div>

                    <div class="form-group row">
                          <label for="dataInicioPalestra" class="col-sm-2 col-form-label">Data de Inicio</label>
                          <div class="col-sm-4">
                               <input name="palestraDataInicio" type="datetime-local" class="form-control" id="dataInicioPalestra" placeholder="Digite o nome do evento" required>
                          </div>
                    </div>

                    <div class="form-group row">
                         <label for="dataTerminoPalestra" class="col-sm-2 col-form-label">Data de Termino</label>
                         <div class="col-sm-4">
                              <input name="palestraDataTermino" type="datetime-local" class="form-control" id="dataTerminoPalestra" placeholder="Digite o nome do evento" required>
                         </div>
                    </div>


                    <div class="form-group row">
                         <label for="salaPalestra" class="col-sm-2 col-form-label">Sala</label>
                         <div class="col-sm-10">
                              <select class="btn btn-default dropdown-toggle" name="palestraSala" id="salaPalestra" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <?php
                                        foreach (SalaController::findSala() as $key ) {
                                             echo "

                                                  <option value=".$key->SalCodigo."> ".$key->SalNumero." </option>

                                             ";
                                        }
                                   ?>
                              </select>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="palestrantePalestra" class="col-sm-2 col-form-label">Palestrante</label>
                         <div class="col-sm-10">
                              <select class="btn btn-default dropdown-toggle" name="palestraPalestrante" id="palestrantePalestra" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <?php
                                        foreach (PalestranteController::findPalestrante() as $key ) {
                                             echo "

                                                  <option value=".$key->PltCodigo."> ".$key->PltNome." </option>

                                             ";
                                        }
                                   ?>
                              </select>
                         </div>
                    </div>



                    <div class="form-group row">
                         <label for="eventoPalestra" class="col-sm-2 col-form-label">Evento</label>
                         <div class="col-sm-10">
                              <select class="btn btn-default dropdown-toggle" name="palestraEvento" id="eventoPalestra" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <?php
                                        foreach (EventoController::findEvento() as $key ) {
                                             echo "

                                                  <option value=".$key->EveCodigo."> ".$key->EveNome." </option>

                                             ";
                                        }
                                   ?>
                              </select>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="recursoPalestra" class="col-sm-2 col-form-label">Recurso</label>
                         <div class="col-sm-10">
                              <select class="btn btn-default dropdown-toggle" name="palestraRecurso" id="recursoPalestra" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <?php
                                        foreach (RecursoController::findRecurso() as $key ) {
                                             echo "

                                                  <option value=".$key->RecCodigo."> ".$key->RecNome." </option>

                                             ";
                                        }
                                   ?>
                              </select>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="fotoPalestra" class="col-sm-2 col-form-label">Foto</label>
                         <div class="col-sm-10">
                              <input type="file" name="palestraFoto" id="palestraFoto" required>
                         </div>
                    </div>

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
