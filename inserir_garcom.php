
<?php
include 'banco_restaurante.php';
$nome_funci  = $_POST ['nome_funci'];
$data  = $_POST ['data'];
$telefone  = $_POST ['telefone'];
$endereco  = $_POST ['endereco'];
$cpf  = $_POST ['cpf'];
$rg  = $_POST ['rg'];
$id_escolaridade  = $_POST ['id_escolaridade'];
$perfil  = $_POST ['perfil'];
$status  = $_POST ['status'];
$login_funci  = $_POST ['login_funci'];
$senha_funci  = $_POST ['senha_funci'];
$confirma_senha  = $_POST ['confirma_senha'];
$email  = $_POST ['email'];


	
 $sql = "INSERT INTO garcom (`nome_funci`,`data`,`telefone`,`endereco`,`cpf`,`rg`,`id_escolaridade`,`perfil`,`status`,`login_funci`,`senha_funci`,`confirma_senha`,`email`) VALUES ('$nome_funci','$data','$telefone','$endereco','$cpf','$rg','$id_escolaridade','$perfil','$status','$login_funci','$senha_funci','$confirma_senha','$email')"; 
mysql_query($sql) or die ("<b> Erro:</b> problema ao inserir</br>".mysql_error()); 
	 echo "<meta charset=UTF-8> <script> alert('Dados inseridos com sucesso!') </script>";
		  echo "<script>window.location=\"lista.php\"</script>";


			
		


?>