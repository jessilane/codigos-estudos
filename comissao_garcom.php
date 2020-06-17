
<table cellspacing="0" summary="Tabela de dados fictícios">
      <thead>
	  <tr>
 <th>id:</th>
 <th>nome:</th>
  </thead>
      <tbody>
	  <?php
 include "banco_restaurante.php";
$ano = date('Y');
$dia_i= '01';

if($_POST['mes'])
	$mes =$_POST['mes'];
else
	$mes = date('m');

$id_garcom_array =$_POST['id_garcom_array'];
if($id_garcom_array)
  $bus_gac = "AND garcom.id_garcom IN [$id_garcom_array]"; // 1,2
$dia_f = date("t", mktime(0,0,0,$mes, $dia_i, $ano));
$dt_inicial="$ano-$mes-$dia_i";
$dt_final="$ano-$mes-$dia_f";
$queryMes= "SELECT nome, (sum(VALOR_TOTAL)*0.1)as comissao FROM garcom LEFT JOIN conta ON garcom.id_garcom = conta.id_garcom WHERE data_abertura BETWEEN '$dt_inicial' AND '$dt_final' $bus_gac GROUP BY nome;";

$result = mysql_query($queryMes) or die (mysql_error());
while($row=mysql_fetch_array($result)){
?>
	<tr>
		<td><?php echo $row[0];?></td>
		<td><?php echo $row[1];?></td>
	</tr>
<?php } ?>
	  </table>