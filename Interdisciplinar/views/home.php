<?php

session_start();

if((!isset ($_SESSION['login-name']) == true) and (!isset ($_SESSION['login-pass']) == true)){

     unset($_SESSION['login-name']);
	unset($_SESSION['login-pass']);
	header('location:index.php');
}

require_once ('../controllers/ColaboradorController.php');

$colaborador = ColaboradorController::findForId2($_SESSION['login-name']);



$rotaLista = "home.php";
$btn_name = "";

require_once ("includes/header.php");

?>

<body>

<h1 style="text-align:center;">Bem Vindo <?php echo $colaborador->ColNome; ?> !</h1>
<h2 style="text-align:center;">Acesse pelos menus de navegação da Direita</h2>

</body>

<?php require_once ("includes/footer.php"); ?>
