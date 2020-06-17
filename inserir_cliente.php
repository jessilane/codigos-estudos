<?php
include 'banco_restaurante.php';


$nome  = $_POST ['nome'];
$email  = $_POST ['email'];
$usuario  = $_POST ['usuario'];
$senha  = $_POST ['senha'];

 $sql = "INSERT INTO cliente(`nome`,`email`,`usuario`,`senha`) VALUES ('$nome','$email','$usuario','$senha')";
mysql_query($sql) or die ("<b> Erro:</b> problema ao inserir</br>".mysql_error()); 
	 echo "<meta charset=UTF-8> <script> alert('Dados inseridos com sucesso!') </script>";
		  echo "<script>window.location=\"usuario.php\"</script>";


			
	

?>