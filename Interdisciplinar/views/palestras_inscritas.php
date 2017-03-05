<?php

session_start();

if((!isset ($_SESSION['login-name']) == true) and (!isset ($_SESSION['login-pass']) == true)){

     unset($_SESSION['login-name']);
	unset($_SESSION['login-pass']);
	header('location:index.php');
}

require_once ("includes/headerAluno.php");
require_once ("../controllers/PalestraController.php");
require_once ("../controllers/AlunoController.php");
require_once ("../controllers/InscricaoController.php");
require_once ("../controllers/PalestranteController.php");


$aluno = AlunoController::findForId2($_SESSION['login-name']);

if(!empty($_POST['desistir'])){
     InscricaoController::deletaInscricao($aluno->AluCodigo, $_POST['desistir']);
     //header("Refresh:0");
}

?>

<body>
     <div class="container">
          <?php
          $caminho = "../views/images/";
          foreach (PalestraController::findPalestra() as $key) {
               if (InscricaoController::findForId($aluno->AluCodigo, $key->PalCodigo)) {
               $confirmacao = InscricaoController::findForId($aluno->AluCodigo, $key->PalCodigo);
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


                                                  <div class='pull-right'>
                                                       <form action='' method='POST'>

                                                            ";
                                                            if ($confirmacao->AssConfirmacao == 1) {
                                                                 echo "<a name='desistir' target='_blank' id='palestraInscrita'class='btn btn-primary'>Assistida</a> &nbsp;";
                                                                 echo  "<a name='documento' href='imprimir.php?aluno=$aluno->AluNome&palestra=$key->PalNome' id='documento' target='_blank' class='btn btn-primary'>Emitir Certificado</a>";
                                                            } if ($confirmacao->AssConfirmacao == 0){
                                                                 echo "<button name='desistir' id='palestraInscrita' value='$key->PalCodigo' class='btn btn-danger'>Desistir</button> &nbsp;";
                                                                 echo  "<a name='documento' id='documento' target='_blank' class='btn btn-danger'>Emitir Certificado</a>";
                                                            }if ($confirmacao->AssConfirmacao == 2){
                                                                 echo  "<a name='documento' id='documento' target='_blank' class='btn btn-warning'>Essa Palestra já acabou e você Perdeu</a>";
                                                            }

                                                            echo "
                                                       </form>
                                                  </div>
                                             </div>
				                    </div>
				               </div>
				          </div>
				     </div>
                    </div>
               </div> ";
          }
     }
     ?>


<?php require_once ("includes/footer.php"); ?>
