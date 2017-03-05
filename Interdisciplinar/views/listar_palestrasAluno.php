<?php

session_start();

if((!isset ($_SESSION['login-name']) == true) and (!isset ($_SESSION['login-pass']) == true)){

     unset($_SESSION['login-name']);
	unset($_SESSION['login-pass']);
	header('location:index.php');
}


$rotaLista = "home.php";

require_once ("includes/headerAluno.php");
require_once ("../controllers/PalestraController.php");
require_once ("../controllers/AlunoController.php");
require_once ("../controllers/InscricaoController.php");
require_once ("../controllers/PalestranteController.php");


$aluno = AlunoController::findForId2($_SESSION['login-name']);

if(!empty($_POST['palestraInscrita'])){
     InscricaoController::inscreverAluno($aluno->AluCodigo, $_POST['palestraInscrita']);
     header("Location:listar_palestrasAluno.php?inserido=true");
}

?>

<body>
     <div class="container">
          <?php
          $caminho = "../views/images/";
          foreach (PalestraController::findPalestra() as $key) {
               $palestrante = PalestranteController::findForId($key->PltCodigo);
               echo "
               <div class='container'>
				<div class='row'>
					<div class='col-md-12'>
						<div class='panel panel-default'>
						     <div class='panel-heading'>
							     <h3 class='panel-title'>$key->PalNome</h3>
						     </div>
						     <div class='panel-body'>
							     <div class='row'>
								     <div class='col-md-3'>
									     <a href='#' class='thumbnail'>
									          <img src=".  $caminho . $key->PalFotoCapa." alt='Errou!!'>
									     </a>
								     </div>

								     <div class='col-md-9'>
									     <p style='font-size: 16px; text-align: justify; color: #888;'>
										     $key->PalDescricao
									     </p>


                                                  <div class='pull-left h4'>
                                                       <p>
                                                       <span class='alert alert-success'>palestrante</span>
                                                       </p><br />
                                                       <img style='border-radius:30pt; height:60px; width:60px;' src='images/$palestrante->PltFoto' />
                                                       <span class=''>".$palestrante->PltNome."</span>
                                                  </div>

                                                  <div class='pull-right'>
                                                       <span class='label label-success'>$key->PalDataInicio</span>
                                                  </div><br /><br />



                                                  ";
                                                  if (InscricaoController::findForId($aluno->AluCodigo, $key->PalCodigo)) {
                                                       echo "
                                                            <form action='' method='POST'>
                                                                 <p name='palestraInscrita' id='palestraInscrita' value='$key->PalCodigo' class='btn btn-warning pull-right'>Inscrito</p>
                                                            </form>
                                                       ";
                                                  } else{
                                                       echo "
                                                            <form action='' method='POST'>
                                                                 <button name='palestraInscrita' id='palestraInscrita' value='$key->PalCodigo' class='btn btn-info pull-right'>Inscrever-se</button>
                                                            </form>
                                                       ";
                                                  }
                                                  echo "
                                             </div>
				                    </div>
				               </div>
				          </div>
				     </div>
                    </div>
               </div> ";
          }
     ?>




     </div>
</body>

<?php require_once ("includes/footer.php"); ?>
