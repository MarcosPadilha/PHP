<?php
session_start();
include_once "define.php";

require_once('classes/BD.class.php');
BD::conn();


?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta charset=UTF-8>

<title> chat estilo face 2.0

</title>
<link href="css/estiloDoIndex.css" rel="stylesheet" type= "text/css" />





</head>

<body><aside class="lateral">
<img src="fotos/iluminati.png"/>
<img src="fotos/logo1.png"/>
</aside>
 <div class="formulario">
 
 <h1>Bem vindo ao chat Ilumi net, faça login</h1>
 <?php
 if(isset($_POST['acao']) && $_POST['acao'] == 'logar'){
	 $email = strip_tags(trim(filter_input(INPUT_POST,'email', FILTER_SANITIZE_STRING)));
	
	 if($email == ''){
		echo 'informe o email'; 
		  
	 }else{
		 $pegaUser = BD::conn()->prepare("SELECT * FROM usuarios WHERE email = ?");
		 $pegaUser->execute(array($email));
		
		 if($pegaUser->rowCount()== 0){
			
			echo 'nao encontramos este login'; 
						 	 
		 }else{
			 $agora= date('Y-m-d H:i:s');
			 $limite =date('Y-m-d H:i:s' , strtotime('+40 min'));
			 $update = BD::conn()->prepare("UPDATE usuarios SET horario = ? , limite = ? WHERE email=?");
			 if($update->execute(array($agora,$limite,$email)) ){
			 while($row = $pegaUser->fetchObject()){
				$_SESSION['email_logado'] = $email;
				$_SESSION['id_user'] = $row->id;
				header("Location: chat.php");
						 
			   }
			 }// seatualizou
			 
		 }
		 
	 }
 }
 ?>
  <form action="" method="post" enctype="multipart/form-data">
  <label>
   <span> Informe seu email</span>
   <input type="text" name="email" placeholder="seu email aqui" />
   
   </label>
   <input type="hidden" name ="acao" value="logar" />
   <input type="submit" value="Entrar" class="botao">
   
  </form>

 </div>
<div class="cadastro" id="conta">
<form action="" method="post" enctype="ultipart/form-data">
	<label>
		<span><h1>Não possui conta? cadastre-se</h1></span>
		  <input type="submit" value="cadastrar" class="botao2" id="btn_cadastro" onClick="window.open('cadastro.php')">

	</label>

</div>


</body>
</html>
