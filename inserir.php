
<?php

include "banco_restaurante.php";
$grau_escolaridade  = $_POST ['grau_escolaridade'];
	


	
  $sql = "INSERT INTO escolaridade(`grau_escolaridade`) VALUES ('$grau_escolaridade')");
 mysql_query($sql) or die ("<b> Erro:</b> problema ao inserir</br>".mysql_error()); 
	 echo "<meta charset=UTF-8> <script> alert('Dados inseridos com sucesso!') </script>";
		  echo "<script>window.location=\"i_garcom.php\"</script>";
?>