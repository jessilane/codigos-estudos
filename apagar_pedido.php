<?php
 include "banco_restaurante.php";
   require "verifica_login.php";





 $codigo= $_GET['id'];
  
 mysql_query("DELETE FROM pedido where id_pedido = $codigo");
 mysql_close($conexao);
 
 //echo "dados deletados com sucesso!";
 echo "<meta charset=UTF-8> <script> alert('Registro excluido') </script>";
 echo "<script>window.location=\"lista_pedido.php\"</script>";
 ?>  