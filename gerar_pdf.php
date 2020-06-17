
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
	$result_conta ="SELECT conta.id_conta, garcom.nome_funci, conta.data, hora.hora, conta.valor_total, mesas.numero_mesas FROM conta,garcom,mesas,hora where conta.id_funci = garcom.id_funci and id_conta='$id_conta' and mesas.idMesas =  conta.idMesas  and hora.id_hora =  conta.id_hora ";
	$resultado_conta = mysqli_query($conn, $result_conta);	
	$row_conta = mysqli_fetch_assoc($resultado_conta);	
	
	
	$pagina = 
		"<html>
			<body>
				<h1>J.T restaurant</h1>
				<h3>INFORMAÇÕES DA CONTA</h3>
				Numero da Conta:  ".$row_conta['id_conta']."<br>
				Funcionario do Atendimento: ".$row_conta['nome_funci']."<br>
				Data de Abertura da Conta: ".$row_conta['data']."<br>
				Hora de Abertura da Conta:  ".$row_conta['hora']."<br>
			   Valor Total da Conta: ".$row_conta['valor_total']."<br>
			   	Mesa do Atendimento : ".$row_conta['numero_mesas']."<br>

				
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
