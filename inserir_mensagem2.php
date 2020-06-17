<?php
include 'banco_restaurante.php';



$id_funci  = $_POST ['id_funci'];
$tipo  = $_POST ['tipo'];
$observacao  = $_POST ['observacao'];

 $sql = "INSERT INTO mensagem(`id_funci`,`tipo`,`observacao`) VALUES ('$id_funci','$tipo','$observacao')";
mysql_query($sql) or die ("<b> Erro:</b> problema ao inserir</br>".mysql_error()); 
	 echo "<meta charset=UTF-8> <script> alert('Sua messagem foi enviada!') </script>";
		  echo "<script>window.location=\"lista_gerente.php\"</script>";


			
	

?>