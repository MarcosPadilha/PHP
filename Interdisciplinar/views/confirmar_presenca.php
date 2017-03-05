<?php

session_start();

if((!isset ($_SESSION['login-name']) == true) and (!isset ($_SESSION['login-pass']) == true)){

     unset($_SESSION['login-name']);
	unset($_SESSION['login-pass']);
	header('location:index.php');
}


$rotaLista = "listar_alunos.php";
$btn_name = "Listar Alunos";

require_once ("includes/header.php");
require_once ("../controllers/AlunoController.php");
require_once ("../controllers/PalestraController.php");
require_once ("../controllers/InscricaoController.php");

if(isset($_GET['aluno']) && isset($_GET['palestra']) ){
     InscricaoController::setValor($_GET['aluno'], $_GET['palestra'] , 1);
}
if(isset($_GET['aluno2']) && isset($_GET['palestra']) ){
     InscricaoController::setValor($_GET['aluno2'], $_GET['palestra'] , 2);
}


?>


<body>
     <div class="">
          <div class="container col-md-offset-5">
               <ul class="nav navbar-nav">
                    <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Selecionar Palestra<span class="caret"></span></a>
                         <ul class="dropdown-menu">
                              <?php
                              foreach (PalestraController::findPalestra() as $key ) {
                                   echo "
                                   <li><a href='confirmar_presenca.php?palestra=$key->PalCodigo'> ".$key->PalNome."</a></li>
                                   ";
                              }
                              ?>
                              <li role="separator" class="divider"></li>
                              <li><a href="../views/confirmar_presenca.php">Voltar Tela Inicial</a></li>
                         </ul>
                    </li>
               </ul>
          </div><br />

          <table class="table">
               <thead>
                    <tr>
                         <th>Número</th>
                         <th>Nome do Aluno</th>
                         <th>Confirmar Presença</th>
                         <th>Não Confirmar</th>
                    </tr>
               </thead>
               <tbody>
                    <?php
                    @@$variavel =$_GET['palestra'];
                         if (isset($_GET['palestra'])) {
                              $palestra = InscricaoController::findPalestra($_GET['palestra']);
                              foreach ($palestra as $key) {
                                   $aluno = AlunoController::findForId2($key->AluCodigo);
                                   ?>
                                   <tr>
                                        <th class="col-sm-3" scope="row">1</th>
                                        <td class="col-sm-3"><?php echo $aluno->AluNome; ?></td>
                                        <?php
                                             echo "
                                             <td class='col-sm-3'>
                                                  <a name='confirmar' href='confirmar_presenca.php?palestra=$variavel&aluno=$aluno->AluCodigo' id='confirmar' class='btn btn-success'>Confirmar</a>
                                             </td>
                                             <td class='col-sm-3'>
                                                  <a name='confirmar' href='confirmar_presenca.php?palestra=$variavel&aluno2=$aluno->AluCodigo' id='confirmar' class='btn btn-danger'>Negar</a>
                                             </td>
                                             ";
                                        ?>




                                   </tr>
                                   <?php
                              }
                         }
                    ?>
               </tbody>
          </table>
          <!-- SELECT AluCodigo FROM assiste WHERE PalCodigo = 42
          SELECT AluNome FROM aluno WHERE AluCodigo  (SELECT AluCodigo FROM assiste Where PalCodigo = 42); -->
     </div>
</body>

<?php require_once ("includes/footer.php"); ?>
