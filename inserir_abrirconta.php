<?php
include 'banco_restaurante.php';

$id_funci  = $_POST ['id_funci'];
$data  = $_POST ['data'];
$id_hora  = $_POST ['id_hora'];
$valor_total  = $_POST ['valor_total'];
$id_produto_array = $_POST ['id_produto'];
$estado_conta = $_POST ['estado_conta'];
$idMesas = $_POST ['idMesas'];



	
 $sql = "INSERT INTO conta (`id_funci`,`data`,`id_hora`,`valor_total`,`id_produto`,`estado_conta`,`idMesas`) VALUES ('$id_funci','$data','$id_hora','$valor_total','$id_produto','$estado_conta','$idMesas')"; 
mysql_query($sql) or die ("<b> Erro:</b> problema ao inserir</br>".mysql_error()); 
$id_pedido= mysql_insert_id($conexao); 

foreach ($id_produto_array as $id_produto) {
	$sql = "INSERT INTO  item_pedido (`id_produto`,`id_pedido`) VALUES ('$id_produto','$id_pedido')"; 
mysql_query($sql) or die ("<b> Erro:</b> problema ao inserir</br>".mysql_error()); 
	 echo "<meta charset=UTF-8> <script> alert('Dados inseridos com sucesso!') </script>";
		  echo "<script>window.location=\"lista_deConta.php\"</script>";
}

			
		


?>