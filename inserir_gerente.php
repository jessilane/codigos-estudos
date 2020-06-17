<?php
include 'banco_restaurante.php';

$nome  = $_POST ['nome'];
$endereco  = $_POST ['endereco'];
$telefone  = $_POST ['telefone'];
$email  = $_POST ['email'];
$rg  = $_POST ['rg'];
$cpf  = $_POST ['cpf'];
$login  = $_POST ['login'];
$senha  = $_POST ['senha'];
$confirma_senha  = $_POST ['confirma_senha'];

 $sql = "INSERT INTO gerente(`nome`,`endereco`,`telefone`,`email`,`rg`,`cpf`,`login`,`senha`,`confirma_senha`) VALUES ('$nome','$endereco','$telefone','$email','$rg','$cpf','$login','$senha','$confirma_senha')";
mysql_query($sql) or die ("<b> Erro:</b> problema ao inserir</br>".mysql_error()); 
	 echo "<meta charset=UTF-8> <script> alert('Dados inseridos com sucesso!') </script>";
		  echo "<script>window.location=\"area_pro.php\"</script>";


			
	

?>