<?php
session_start();
include_once "define.php";

require_once('classes/BD.class.php');
BD::conn();
if(!isset($_SESSION['email_logado'], $_SESSION['id_user'])){
	//header("Location: index.php");
	
}
//coloca o usuario on line
$pegaUser = BD::conn()->prepare("SELECT * FROM usuarios WHERE email =? ");
		$pegaUser->execute(array($_SESSION['email_logado']));
	$dadosUser = $pegaUser->fetch();
	if(isset($_GET['acao']) && $_GET['acao']=='sair'){//se clicar em sair destroi a session
		unset($_SESSION['email_logado']);
		unset($_SESSION['id_user']);
		session_destroy();
		header("Location: index.php");
		
	}
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<meta charset=UTF-8>

<title> chat illumi net

</title>
<link href="css/estilo.css" rel="stylesheet" type= "text/css" />
<script type="text/javascript" src="js/function.js"></script>
<script type="text/javascript">
 $.noConflict();

</script>


</head>

<body>
<span class = "user_online" id="<?php echo $dadosUser['id'];?>"></span><!--div lateral onde ficam listados os usuarios-->
<a id="sair" href ="?acao=sair"><h3>sair</h3></a>
<h2> Welcome, <?php echo $dadosUser['nome'];?> </h2>
 <aside id="users_online">
  <ul>
<?php $pegaUsuarios = BD:: conn()->prepare("SELECT * FROM usuarios WHERE id!=?  ");
$pegaUsuarios->execute(array($_SESSION['id_user']));
while($row = $pegaUsuarios->fetch()){
	$foto = ($row['foto']=='') ? 'default.jpg' : $row['foto'];//seleciona a foto do usuairo, caso não esteja on, aparece foto default.
	$blocks = explode(',', $row['blocks']);
	$agora = date('Y-m-d H:i:s');
	
	if(!in_array($_SESSION['id_user'],$blocks)){//agulha no palheiro
		$status = 'on';
		
		if($agora>= $row['limite']){//verifica limite de tempo
			$status = 'off';
			
		}
 ?>



   <li id="<?php echo $row['id'];?>"  >
    <div class="imgSmall"> <img src="fotos/<?php echo $foto;?>" border="0" />
    </div>
      <a href="#"  id="<?php echo $_SESSION['id_user'].':'.$row['id'];?>" class="comecar"> <?php echo utf8_encode($row['nome']);?></a>
       <span id="<?php echo $row['id'];?>"  class="status <?php echo $status; ?>" ></span>

   </li>

<?php }} 
?>
  </ul>
 </aside>

<aside id="chats" >

 


</aside>
<script type="text/javascript" src="js/functions.js"></script>


<!--
<div class="window" id="janela_x">
 
 
  <div class="header_window"> <a href="#" class="close">x</a>
   <span class="name" >fulano</span><span id="5"  class="status on" ></span></div>
 
   <div class="body">
	  <div class="mensagens">
	    <ul>
			
	    </ul>
		</div>
		<div class="send_message" id="3:5">
			<input type="text" name="mensagem" class="msg"  id"3:5"/>
	  </div>
	  -->
	
	 
 </div>
</div>
</body>
</html>