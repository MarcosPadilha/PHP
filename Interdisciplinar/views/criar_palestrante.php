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
require_once ("../controllers/FotoUpload.php");

?>

<body>
     <div class="container">

          <?php
               if (! empty($_FILES['palestranteFoto']) && (isset($_POST['cadastrar']))){

                    echo "entrei aqui";
                    $upload = new FotoUpload($_FILES['palestranteFoto'], 100, 100, "../views/images/");

                    PalestranteController::newPalestrante($_POST['palestranteNome'], $_POST['palestranteEspec'],
                    $_POST['palestranteDescricao'], $upload->salvar());

               }

               if(isset($_GET['create'])) {
                    if($_GET['create'] === 'true') {
                         echo '<div class="alert alert-success">
                           <strong>Parabéns!</strong> Palestrante cadastrado com sucesso.
                         </div>';
                    } else {
                         echo '<div class="alert alert-danger">
                           <strong>Erro!</strong> Não foi possivel cadastrar o Palestrante.
                         </div>';
                    }
               }
          ?>
          <div class="col-md-12">
               <form action="" method="POST" enctype='multipart/form-data'>
                    <legend>Inserir Palestrante</legend>

                    <div class="form-group row">
                          <label for="nomePalestrante" class="col-sm-2 col-form-label">Nome</label>
                          <div class="col-sm-10">
                            <input name="palestranteNome" type="text" class="form-control" id="nomePalestrante" placeholder="Digite seu nome" required>
                          </div>
                    </div>

                    <div class="form-group row">
                          <label for="especPalestrante" class="col-sm-2 col-form-label">Especialização</label>
                          <div class="col-sm-10">
                            <input name="palestranteEspec" type="text" class="form-control" id="especPalestrante" placeholder="Informe sua especialização" required>
                          </div>
                    </div>

                    <div class="form-group row">
                         <label for="descricaoPalestrante" class="col-sm-2 col-form-label">Descrição</label>                         <div class="col-sm-10">
                              <textarea style='resize:none;'  class="form-control" rows="6" cols="50" name="palestranteDescricao" id="descricaoPalestrante" placeholder="Informe a Descrição do Palestrante!" required></textarea>
                         </div>
                    </div>

                    <div class="form-group row">
                         <label for="palestranteFoto" class="col-sm-2 col-form-label">Foto</label>
                         <div class="col-sm-10">
                              <input type="file" name="palestranteFoto" id="palestranteFoto" required>
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
