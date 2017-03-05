<?php

include_once "define.php";
require_once('classes/BD.class.php');
BD::conn();

?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta charset=UTF-8>

<title>cadastro

</title>
<link href ="css/cadastro.css" rel="stylesheet" type="text/css"/>
<body>
<header>
	<div class="cAling">
	<a href="#"><img src="fotos/logo1.fw.png" alt="Illumis net" /></a>
</div><!--cAling-->

</header><!--header-->

<div class="cAling">
<div id="content">
	<!--content-->
	<div id="left">
<ul>
	<li>eu sou</li>
	<li>data nascimento</li>
	<li>meu email</li>
	<li>nova senha</li>
	
</ul>



	</div><!--left-->
	<h1>Welcome</h1>
	<div id="formulario">
	
		<?php
	session_start();
		if(isset($_POST['enviar'])){

			$nome= strip_tags(trim($_POST['nome']));
			$sobrenome= strip_tags(trim($_POST['sobrenome']));
			$email= strip_tags(trim($_POST['email']));
			$senha= strip_tags(trim($_POST['senha']));
			$sexo= strip_tags(trim($_POST['sexo']));
			$dia=$_POST['dia'];
			$mes=$_POST['mes'];
			$ano=$_POST['ano'];
			//$nascimento =strip_tags(trim($_POST["$ano-$mes-$dia"]));
			//$nascimento= strip_tags(trim($_POST['$ano-$mes-$dia']));
			//$senhaInsert=sha1($senha);
			$nascimento=$ano+'-';
			$nascimento.=$mes+'-';
			$nascimento.=$dia;

			$verificar=BD::conn()->prepare("SELECT id FROM usuarios WHERE email=?");
	if ($verificar->execute(array($email))){
		if($verificar->rowCount()>=1){
			echo 'cadastro já existente';
		}else{

			$inserir = BD::conn()->prepare("INSERT INTO usuarios (nome, sobrenome,email, sexo,nascimento,senha) VALUES (?,?,?,?,?,?)");
			$arrayInsert = array($nome,$sobrenome, $email,$sexo,$nascimento,$senha);
			$inserir->execute($arrayInsert);
			
			
			session_destroy();
			header('cadastro.php');

		}
	}

			
			
		}

	//$nome, $sobrenome,$email, $sexo,$nascimento,$senha
//"INSERT INTO usuarios SET nome=? sobrenome=?,email=?, sexo=? ,nascimento=?,senha=? ");
			

		
		?>
<form name="cadastro" method="post" action="" enctype="multipart/form-data" >
	<div>
		<div class="inputFloat">
			<span>nome</span>
			<input type="text" name="nome"  class="inputTxt" value=""/></div>
			<div class="inputFloat">
			<span>sobrenome</span>
			<input type="text" name="sobrenome" 	 class="inputTxt" value=""/></div>	
		</div>
	<span class="spanHide"> eu sou</span>
	<select name="sexo">
		<option value="masculino">masculino</option>
				<option value="feminino">feminino</option>

</select>

<span class="spanHide"> data de nascimento</span>
	<select name="dia">
		<?php
		for($d=1; $d<=31;$d++){
			$zero=($d<10) ? 0:''; 
			echo'<option value="'.$zero,$d,'"> ',$zero,$d,' </option>';

		}
		?>
		
    </select><!--dia-->
<select name="mes">
	<?php
	
		for($m=1; $m<=12;$m++){
			$zero=($m<10) ? 0 :''; 
						echo'<option value="'.$zero,$m,'"> ',$zero,$m,' </option>';


		}
		?>
		
	</select><!--mes-->
	<select name="ano">
		<?php
		for($m=1900; $m<=2016;$m++){
			$zero=($m<10) ? 0 :''; 
						echo'<option value="'.$zero,$m,'"> ',$zero,$m,' </option>';


		}
		?>
	</select><!--ano-->

<span class="spanHide">seu email</span>
			<input type="text" name="email"	 class="inputTxt"/>
			<span class="spanHide">senha</span>
			<input type="text" name="senha"	 class="inputTxt"/>
				
	
		
			
	<span>&nbsp;</span>
<input type="submit" value="cadastrar" class="botao" name="enviar"/>
	<input type="submit" value="login" class="botao" name="logar" onClick="window.open('index.php')" />
<img id="piramide" src="fotos/iluminati3.png"/>
</div>


</form>

</div>

		</div><!--formulario-->


</div><!--cAlign-->
<footer><p> &copy;Copyright Illumi net 2016 - todos os direitos reservados</p>
</footer>



	</body>
	</html>