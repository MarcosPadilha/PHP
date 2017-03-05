<?php

require_once ("../controllers/AlunoController.php");
require_once ("../controllers/ColaboradorController.php");

$mensagem = "";

if(!empty($_POST['login'])){

     session_start();

     $login = $_POST['login-name'];
     $senha = $_POST['login-pass'];

     if (AlunoController::loginAluno($_POST['login-name'], $_POST['login-pass'])){
          $_SESSION['login-name'] = $login;
          $_SESSION['login-pass'] = $senha;
          header('location:listar_palestrasAluno.php');
     } else if (ColaboradorController::loginColaborador($_POST['login-name'], $_POST['login-pass'])){
          $_SESSION['login-name'] = $login;
          $_SESSION['login-pass'] = $senha;
          header('location:home.php');
     } else{
          unset ($_SESSION['login-name']);
          unset ($_SESSION['login-pass']);
          header('location:index.php?login=true');
     }

     if(isset($_GET['logout'])) {
          if($_GET['logout'] === 'true') {
               $mensagem = "Erro, informe um RA ou Senha validos";               
          }
     }

}

?>

<!DOCTYPE html>
<html >
<head>
     <meta charset="UTF-8">
     <title>Login</title>
     <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <body>
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Login</h1>
			</div>

               <form action="index.php" method="POST">
     			<div class="login-form">

     				<div class="control-group">
     				<input name="login-name" type="text" class="login-field" placeholder="RA" id="login-name">
     				<label class="login-field-icon fui-user" for="login-name"></label>
     				</div>

     				<div class="control-group">
     				<input name="login-pass" type="password" class="login-field" placeholder="Senha" id="login-pass">
     				<label class="login-field-icon fui-lock" for="login-pass"></label>
     				</div>

                         <?php if ($mensagem!="") {
                              echo "<div class='alert alert-danger' style='color:red; font-family:times;'> $mensagem </div>";
                         } ?>

     				<input class="btn btn-primary btn-large btn-block" type="submit" value="Login" name="login">
     				<a class="login-link" href="#">Consulta RA</a>
                         <a class="login-link" href="#">Esqueceu sua Senha?</a>
     			</div>
               </form>
		</div>
	</div>
</body>


</body>
</html>
