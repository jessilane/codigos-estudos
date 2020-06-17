<?php
include_once 'banco_restaurante.php';
   $data = $_GET['data'];

   $queryHora = "select hora.id_hora, hora,id_conta  from hora LEFT JOIN conta ON hora.id_hora = conta.id_hora AND data='$data' order by hora.id_hora";
   $resultF = mysql_query($queryHora) or die (mysql_error());
   $i=0;
   while($row = mysql_fetch_array($resultF)){
	   $t = verifica_disponibilidade($row["id_hora"], $data);
	   if($t<12){
		   $retorno[$i]["id_hora"] = $row["id_hora"];
		   $retorno[$i]["hora"] = $row["hora"];
		   $retorno[$i]["id_conta"] = $row["id_conta"];
		   $i++;
	   }   
   }
	$obj= json_encode($retorno);
	echo $obj;
	
 function verifica_disponibilidade($idHora, $data){
	$total = 0;
	$query = "select count(id_conta) as t_res from hora LEFT JOIN conta ON hora.id_hora = conta.id_hora AND data='$data' AND hora.id_hora='$idHora'";
   $result = mysql_query($query) or die (mysql_error());
   if($row = mysql_fetch_array($result)){
	 $total = $row['t_res'];   
   } 
   return $total;
 }
 ?>