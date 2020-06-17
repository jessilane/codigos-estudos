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
	 $logar = mysql_query("SELECT ger_id, ger_login FROM logingerente WHERE ger_login = '$login' AND  ger_senha ='$senha'");
	 
	 if ($logar && mysql_num_rows($logar) == 1) {
		 
		  // o utilizador está correctamente validado
		  //guardamos as suas informações numa sessão 
		  $_SESSION['ger_id'] = mysql_result($logar,0,0);
		  $_SESSION['ger_login']= mysql_result($logar,0,1);
		  		  		

		  echo "<p>Sess&atilde;o iniciado com sucesso como {$_SESSION['usu_login']}</p>";
          echo"<script> window.location=\"area_ge.php\" </script> ";
	 } else {
		 //falhou o login 
echo "<meta charset=UTF-8> <script> alert('Login ou Senha Invalidos,Tente Novamente') </script>";
		  echo "<script>window.location=\"loginGe.php\"</script>";	 }
 }
 ?>
		 
		  
	
	