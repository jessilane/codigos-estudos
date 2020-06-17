<?php
 include "banco_restaurante.php";



 

 $codigo= $_GET['id'];
  
 mysql_query("DELETE FROM mesas where idMesas = $codigo");
 mysql_close($conexao);
 
 //echo "dados deletados com sucesso!";
echo "<script> confirm('Você tem certeza que deseja excluir este item?')</script>";
 echo "<meta charset=UTF-8> <script> alert('Registro excluido') </script>";
 echo "<script>window.location=\"area_ga.php\"</script>";
 ?>  