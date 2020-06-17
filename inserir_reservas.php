<?php
include 'banco_restaurante.php';

$id_cliente  = $_POST ['id_cliente'];
$data  = $_POST ['data'];
$id_hora  = $_POST ['id_hora'];
$qnt_pessoas  = $_POST ['qnt_pessoas'];
$idMesas  = $_POST ['idMesas'];

 $sql = "INSERT INTO reserva_mesas (`id_cliente`,`data`,`id_hora`,`qnt_pessoas`,`idMesas`) VALUES ('$id_cliente','$data','$id_hora','$qnt_pessoas','$idMesas')";
mysql_query($sql) or die ("<b> Erro:</b> problema ao inserir</br>".mysql_error()); 
	 echo "<meta charset=UTF-8> <script> alert('Dados inseridos com sucesso!') </script>";
		  echo "<script>window.location=\"lista_reservas.php\"</script>";


			
	

?>