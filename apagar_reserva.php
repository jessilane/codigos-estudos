<?php
 include "banco_restaurante.php";
   require "verifica_login.php";



 $codigo= $_GET['id'];
  
 mysql_query("DELETE FROM reserva_mesas where id_reserva = $codigo");
 mysql_close($conexao);
 
 echo "dados deletados com sucesso!";

 echo "<meta charset=UTF-8> <script> alert('dados deletados com sucesso!') </script>";
 echo "<script>window.location=\"lista_reservas.php\"</script>";
 ?>  
