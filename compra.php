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
  
  $id_pedido = "32";
  $result_pedido ="SELECT pedido.id_pedido, 
  garcom.id_funci,
  cliente.id_cliente, 
  item_pedido.id_produto, 
  produto.nome_prod,
   pedido.valor_total FROM pedido,cliente,produto,item_pedido where pedido.id_funci = garcom.id_funci and item_pedido.id_produto = produto.id_produto and id_pedido='$iid_pedido' LIMIT '32'";
  $resultado_pedido = mysqli_query($conn, $result_pedido);  
  $row_pedido = mysqli_fetch_assoc($resultado_pedido);  
  
  
  $pagina = 
    "<html>
      <body>

      <br>
      <br>
      <br>
        <h2>Informações da Compra</h2>
        Numero da Compra:  ".$row_pedido['id_pedido']."<br>
        Funcionario do Atendimento: ".$row_pedido['nome_funci']."<br>
        item Pedidos: ".$row_pedido['nome_prod']."<br>
         Valor Total da Compra: ".$row_pedido['valor_total']."<br>
        
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
