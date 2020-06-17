
<?php
include 'banco_restaurante.php';

$id_produto_array = $_POST ['id_produto'];
$id_funci  = $_POST ['id_funci'];
$id_cliente  = $_POST ['id_cliente'];
$valor_total  = $_POST ['valor_total'];



$sql = "INSERT INTO pedido (`valor_total`,`id_funci`,`id_cliente`) VALUES ('$valor_total','$id_funci','$id_cliente')"; 
mysql_query($sql) or die ("<b> Erro:</b> problema ao inserir</br>".mysql_error()); 
$id_pedido= mysql_insert_id($conexao); 

foreach ($id_produto_array as $id_produto) {
	$sql = "INSERT INTO  item_pedido (`id_produto`,`id_pedido`) VALUES ('$id_produto','$id_pedido')"; 
mysql_query($sql) or die ("<b> Erro:</b> problema ao inserir</br>".mysql_error()); 
	 echo "<meta charset=UTF-8> <script> alert('Dados inseridos com sucesso!') </script>";
		  echo "<script>window.location=\"lista_pedido.php\"</script>";
}
 


			
		


?>