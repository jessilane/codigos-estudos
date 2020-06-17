<?php

include"banco_restaurante.php";
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
          minlength: 2
        },
        id_funci: {
          required: true
        },
        id_cliente: {
          required: true,
          minlength: 2
        }
        
      },
      messages: {
        id_produto: {
          required: "Preencha o campo Nome"
        },
        id_funci: {
          required: "Preencha o campo Porção"
        },
        id_cliente:{
             required: "Preencha o campo Valor"

        }
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
                <li class="active"><a href="i_pedido.php">Fazer um Pedido!</a></li>
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
   <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
  
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="imagem/pedido4.jpg" class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Faça seu Pedido!</h1>
			   <p> Trazemos sempre o melhor sabor para você.</p>
            </div>
          </div>
        </div>


<center>
         
<form  id="form1" name="form1" enctype="multipart/form-data" action="inserir_pedido.php" method="post">
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
</td>
<td>
<img class="img-thumbnail" src="<?php echo $row ['imagem'];?>" width="100" height="100"/>

</td></tr>
</table>

 <?php } ?> 
 </select>
   <a class="btn btn-success" href="cardapio.php">Visitar Cardápio</a>
<p></p>
<label>Valor Total:</label>
<input  name="valor_total" id="valor_total" type="text" size="30"  />
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

<input  class="btn btn-danger" type="submit"  value="SALVAR"> </button>
<input class="btn btn-primary" type="reset"  value="LIMPAR"> </button></td></tr>
<br>
<br>
 <a class="btn btn-default" href="lista_pedido.php">Últimos Pedidos</a>


<br>
<br>
</table>
</form>
</center>







</body>
</html>