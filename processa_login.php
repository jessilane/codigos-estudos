<?php
 // começar ou retomar uma sessao 
 session_start();
 // se vier um pedido para login 
 if (!empty($_POST)) {
 
	// estabelecer ligação com a base de dados 
	include "banco_restaurante.php";
	
	// receber o pedido de login com segurança 
	$login = mysql_real_escape_string($_POST['usuario']);
	$senha = ($_POST['senha']);
	 
	 //verificar o ultilizador em questao (pretendemos obter uma única linha de registro)
	 $logar = mysql_query("SELECT id_cliente, usuario FROM cliente WHERE  usuario = '$login' AND  senha ='$senha'");
	 
	 if ($logar && mysql_num_rows($logar) == 1) {
		 
		  // o utilizador está correctamente validado
		  //guardamos as suas informações numa sessão 
		  session_start();
		  var_dump(mysql_result($logar,0,0));
		   var_dump(mysql_result($logar,0,1));
		  $_SESSION['id_cliente'] = mysql_result($logar,0,0);
		  $_SESSION['usuario']= mysql_result($logar,0,1);
		  		  		

		  echo "<p>Sess&atilde;Olá  {$_SESSION['usuario']} Seja bem vindo(a)</p>";
          echo"<script> window.location=\"area.php\" </script> ";
	 } else {
		 //falhou o login 
		  echo "<meta charset=UTF-8> <script> alert('Login ou Senha Invalidos, Tente Novamente') </script>";
		  echo "<script>window.location=\"usuario.php\"</script>";

	 }
 }
 ?>
		 
		  
	
	