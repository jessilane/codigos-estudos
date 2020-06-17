
<?php
 include "banco_restaurante.php";

require"verifica_funci.php";




 $codigo= $_GET['id'];
  
 mysql_query("DELETE FROM conta where id_conta = $codigo");
 mysql_close($conexao);
 
 //echo "dados deletados com sucesso!";
 echo "<meta charset=UTF-8> <script> alert('Conta Fechada') </script>";
 echo "<script>window.location=\"lista_deConta.php\"</script>";
 ?>  
