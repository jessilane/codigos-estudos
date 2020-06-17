
<?php

include "banco_restaurante.php";
$numero_mesas  = $_POST ['numero_mesas'];
	
	
	
 $sql = "INSERT INTO mesas(numero_mesas) VALUES ('$numero_mesas')";
mysql_query($sql) or die ("<b> Erro:</b> problema ao inserir</br>".mysql_error()); 
	 echo "<meta charset=UTF-8> <script> alert('Dados inseridos com sucesso!') </script>";
		  echo "<script>window.location=\"i_produto.php\"</script>";

			
		


?>