<?php
include_once 'banco_restaurante.php';
   $data = $_GET['data'];
   $id_hora = $_GET['id_hora'];

   $queryHora = "select mesas.idMesas,numero_mesas, id_conta from mesas LEFT JOIN conta ON mesas.idMesas = conta.idMesas AND data='$data' AND id_hora=$id_hora;";
   $resultF = mysql_query($queryHora) or die (mysql_error());
   $i=0;
   while($row = mysql_fetch_array($resultF)){
	   if($row["id_conta"]==null){
		   $retorno[$i]["idMesas"] = $row["idMesas"];
		   $retorno[$i]["numero_mesas"] = $row["numero_mesas"];
		   $retorno[$i]["id_conta"] = $row["id_conta"];
		   $i++;
	   }   
   }
	$obj= json_encode($retorno);
	echo $obj;
 ?>