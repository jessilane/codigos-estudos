
<?php
	include ('pdf/mpdf.php');
	include 'banco_restaurante.php';
		
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "restaurante";

	
	//Criar a conexão
	$conn = mysqli_connect($servidor, $usuario, $senha,$dbname);
	if(!$conn){
		die("Falha na conexao: " . mysqli_connect_error());
	}else{
		//echo "Conexao realizada com sucesso";
	}
	
	$id_conta = $_GET['id'];
	$result_conta ="SELECT conta.id_conta,
	 garcom.nome_funci, 
	  conta.valor_total, 
	  conta.estado_conta , 
	  mesas.numero_mesas  FROM conta,garcom,mesas where conta.id_funci = garcom.id_funci and id_conta='$id_conta' and mesas.idMesas =  conta.idMesas";
	$resultado_conta = mysqli_query($conn, $result_conta);	
	$row_conta = mysqli_fetch_assoc($resultado_conta);	

	$pagina = 
		"<html>
			<body>
				<h1>J.T restaurant</h1>
				<h3>Relatorio de Mesas!</h3>	
				
		       <h4> Funcionario do Atendimento  >> ".$row_conta['nome_funci']." </h4>
				 <h4>Mesa do Atendimento   >> ".$row_conta['numero_mesas']."</h4>
			    <h4>Valor Total da Conta >>".$row_conta['valor_total']." </h4>
			    <h4>Estado da Conta  >>".$row_conta['estado_conta']."</h4>

			   	

				
			</body>
		</html>
		";



$arquivo = "Cadastro01.pdf";

$mpdf = new mPDF();
$mpdf->WriteHTML($pagina);

$mpdf->Output($arquivo, 'I');

// I - Abre no navegador
// F - Salva o arquivo no servido
// D - Salva o arquivo no computador do usuário
?>
