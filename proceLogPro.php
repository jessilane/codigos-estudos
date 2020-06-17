<?php
 // começar ou retomar uma sessao 
 session_start();
 // se vier um pedido para login 
 if (!empty($_POST)) {
 
	// estabelecer ligação com a base de dados 
	include "banco_restaurante.php";
	
	// receber o pedido de login com segurança 
	$login = mysql_real_escape_string($_POST['login']);
	$senha = SHA1($_POST['senha']);
	 
	 //verificar o ultilizador em questao (pretendemos obter uma única linha de registro)
	 $logar = mysql_query("SELECT pro_id,  pro_login FROM loginproprietario WHERE  pro_login = '$login' AND   pro_senha ='$senha'");
	 
	 if ($logar && mysql_num_rows($logar) == 1) {
		 
		  // o utilizador está correctamente validado
		  //guardamos as suas informações numa sessão 
		  $_SESSION[' pro_id'] = mysql_result($logar,0,0);
		  $_SESSION[' pro_login']= mysql_result($logar,0,1);
		  		  		

		  echo "<p>Sess&atilde;o iniciado com sucesso como {$_SESSION['usu_login']}</p>";
          echo"<script> window.location=\"area_pro.php\" </script> ";
	 } else {
		 //falhou o login 
echo "<meta charset=UTF-8> <script> alert('Login ou Senha Invalidos,Tente Novamente') </script>";
		  echo "<script>window.location=\"loginPro.php\"</script>";	 }
 }
 ?>
		 
		  
	
	