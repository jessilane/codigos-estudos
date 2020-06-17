<?php
 include "banco_restaurante.php";
require"verifica_funci.php";

 

 $codigo= $_GET['id'];
  
 mysql_query("DELETE FROM produto where id_produto= $codigo");
 mysql_close($conexao);
 
 //echo "dados deletados com sucesso!";
 echo "<meta charset=UTF-8> <script> alert('Registro excluido') </script>";
 echo "<script>window.location=\"lista_prod.php\"</script>";
 ?>  