<?php
include_once 'banco_restaurante.php';
   $data = $_GET['data'];

   $queryHora = "select hora.id_hora, hora,id_reserva  from hora LEFT JOIN reserva_mesas ON hora.id_hora = reserva_mesas.id_hora AND data='$data' order by hora.id_hora";
   $resultF = mysql_query($queryHora) or die (mysql_error());
   $i=0;
   while($row = mysql_fetch_array($resultF)){
	   if($row["id_reserva"]==null){
		   $retorno[$i]["id_hora"] = $row["id_hora"];
		   $retorno[$i]["hora"] = $row["hora"];
		   $retorno[$i]["id_reserva"] = $row["id_reserva"];
		   $i++;
	   }   
   }
	$obj= json_encode($retorno);
	echo $obj;
 ?>