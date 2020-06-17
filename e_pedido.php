<?php
 include "banco_restaurante.php";
 require"verifica_login.php";

?>
<html>
<head>    
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="imagem/ico.png">

		<title>J.T restaurant</title>
				

	   <link href="bootstrap/docs/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
	<script language="JavaScript" type="text/javascript" src="js/MascaraValidacao.js"></script>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/jquery.validate.js"></script>
<script>

	$().ready(function() {
		$("#form1").validate({
			rules: {
				id_produto: {
					required: true,
					minlength:2 
				},
			
				id_funci: {
					required: trues
				},
				id_cliente: {
					required: true,
					minlength: 2
				},
			
			},
			messages: {
				id_produto: {
					required: "Escolha um Produto"
				},
			
				id_funci:{
				     required: "Escolha um Garçom"

				},
				id_cliente: {
				     required: "Preencha o campo com seu nome"
				},
			
				
			
			}
		});
	});
	
	
ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}

function calcula(ele) {
  var t2 = $(ele).siblings('.valor').text(); // Vai pegar apenas o irmão com id correspondente.
  var v = $('#valor_total').val(); 
  var valor = Number(v) + Number(t2);
  $('#valor_total').val(valor);
}
function calcula(ele) {
  var t2 = $(ele).siblings('.valor').text(); // Vai pegar apenas o irmão com id correspondente.
  var v = $('#valor_total').val(); 
  var valor = Number(v) + Number(t2);
  $('#valor_total').val(valor);
}
</script>	
      	
		

	</head>
<body>
  
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">J.T restaurant</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="cardapio.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cardápio <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="bebidas.php">Bebidas</a></li>
                    <li><a href="sobremesa.php">Sobremesas</a></li>
                    <li><a href="fast_food.php">Fast food</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Pratos do dia</li>
                    <li><a href="cardapio.php">Filé de Frango</a></li>
                    <li><a href="cardapio.php">Filé de Carne</a></li>
					 </ul>
					  </li>
                <li ><a href="reserva_mesas.php">Resevar Mesa</a></li>
                <li ><a href="i_pedido.php">Fazer um Pedido!</a></li>
              <?php
				 session_start();
				 $idCliente = isset($_SESSION['id_cliente']) ? $_SESSION['id_cliente'] : NULL;
				 if(isset($idCliente)){ ?>
                 <li><a href="lista_cliente.php">Minha Conta!</a></li>
					<li><a onClick="return confirm('certeza que deseja SAIR?')" href="logout.php">Sair</a></li>
                 <?php }else{ ?>  
					<li><a href="usuario.php">Seja Nosso Cliente!</a></li>
                 <?php } ?>       
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>
<center>


<?php
	include "banco_restaurante.php";

		$id= $_GET['id'];//pedido selecionado
		$sql_query="SELECT * FROM pedido where id_pedido= $id";//exibir os prdutos 
		$result_set = mysql_query($sql_query);//comando sql
		$row = mysql_fetch_array($result_set);//comando sql
?>

<br>
<br>
<br>


<br>
<br>
<br>
<center>

	<h2>Alterar Pedido!</h2>
<br>
	
<form  id="form1" name="form1" enctype="multipart/form-data"  method="post">
<br>
<br>
<?php
   $queryProduto = "select *from produto order by id_produto";
   $resultF = mysql_query($queryProduto) or die (mysql_error());
 ?>
 <label>Pedido:</label><br>
 <?php 
 while ($row = mysql_fetch_array($resultF)) {
?>
<TABLE BORDER=2> 
<tr> 
<td><input name="id_produto[]" id="id_produto" type="checkbox" onclick="calcula(this);" class="id_produto" value="<?php echo $row['id_produto'];?> "> <?php echo $row ['nome_prod']; ?> <br>
Valor R$<div class="valor">
<?php echo $row ['valor']; ?> </div>
</td><td>
<img class="img-thumbnail" src="<?php echo $row ['imagem'];?>" width="100" height="100"/>

</td></tr>
<?php }
?>
</table>

  
 
<p></p>
<label>Valor Total:</label>
<input  name="valor_total" id="valor_total" type="number" size="30" value="<?php echo $row['valor_total']; ?>"/>
 <p></p>
 <?php
   $queryGarcom = "select *from garcom order by id_funci";
   $resultF = mysql_query($queryGarcom) or die (mysql_error());
 ?>
 <label>Escolha um Garçom:</label>
<select name="id_funci">
 <?php 
 while ($row = mysql_fetch_array($resultF)) {
?>
<option value="<?php echo $row['id_funci'];?> "> <?php echo $row['nome_funci']; ?></option> 
 <?php } ?> 
 </select><p></p>
 
 <?php
   $queryCliente = "select *from cliente order by id_cliente";
   $resultF = mysql_query($queryCliente) or die (mysql_error());
 ?>
 <label>Cliente:</label>
<?php	
   $idCliente = $_SESSION['id_cliente'];
   $nomeCliente = $_SESSION['usuario'];
 ?>
	<input type="hidden" value="<?php echo $idCliente; ?>" name="id_cliente">
	<input type="text" value="<?php echo $nomeCliente; ?>">
<br>
<br>
<td colspan="4">

				<center><input type="submit" class="btn btn-primary" name="botao_atualizar" value="atualizar">	
				<a href="lista_pedido.php"><input type="button" class="btn btn-success"  value="Consultar"> </button><a></center>
		
		<p></p>
					<a  class="btn btn-danger" href="lista_pedido.php">Voltar</a>	

   


	

<?php
	if(isset($_POST['botao_atualizar']))
	{
		//recebe variáveis
		
	$id_produto = $_POST['id_produto'];//nome imput
	$id_garcom = $_POST['id_garcom'];//nome imput
	
	
  

		
			$sql_query1 = "update pedido set id_produto='$id_produto',id_garcom='$id_garcom' where id_pedido=".$_GET['id'];
			mysql_query($sql_query1) or die ("<b>false:</b> problema ao ALTERAR id_produto <br/>".mysql_error());
			echo "<script> window.location=\"lista_pedido.php\" </script>";//comando sql
		}
	

?>
</center>
</body>
</html>