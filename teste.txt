<?php
include_once 'banco_restaurante.php';
   $data = $_GET['data'];

   $queryMesas = "select mesas.idMesas, numero_mesas,id_reserva  from mesas LEFT JOIN reserva_mesas ON mesas.idMesas = reserva_mesas.idMesas AND data='$data' order by mesas.idMesas";
   $resultF = mysql_query($queryMesas) or die (mysql_error());
   $i=0;
   while($row = mysql_fetch_array($resultF)){
	   if($row["id_reserva"]==null){
		   $retorno[$i]["idMesas"] = $row["idMesas"];
		   $retorno[$i]["numero_mesas"] = $row["numero_mesas"];
		   $retorno[$i]["id_reserva"] = $row["id_reserva"];
		   $i++;
	   }   
   }
	$obj= json_encode($retorno);
	echo $obj;
 ?>