

<?php

include"banco_restaurante.php";
   require "verifica_login.php";



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
         	<script type="text/javascript" src="js/MascaraValidacao.js"></script>
      	<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/jquery.validate.js"></script>
	<script>
$().ready(function() {
		$("#form1").validate({
			rules: {
				nome: {
					required: true,
					minlength: 5
				},
				usuario: {
					required: true,
					minlength: 5
				},
				senha: {
					required: true,
					minlength: 5
				},
				email: {
					required: true,
					minlength: 5
				},
				
			
			},
			messages: {
				nome: {
					required: "Preencha o campo Nome"
				},
				usuario: {
					required: "Preencha o campo usuario"
				},
				senha:{
				     required: "Preencha o campo senha"

				},
				email: {
				     required: "Preencha o campo email"
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
                <li><a href="reserva_mesas.php">Resevar Mesa</a></li>
               <?php
				 session_start();
				 $idCliente = isset($_SESSION['id_cliente']) ? $_SESSION['id_cliente'] : NULL;
				 if(isset($idCliente)){ ?>
                 <li><a href="lista_cliente.php">Minha Conta!</a></li>
					<li><a onClick="return confirm('certeza que deseja SAIR?')" href="logout.php">Sair</a></li>
                 <?php }else{ ?>  
					<li><a href="i_cliente.php">Seja Nosso Cliente!</a></li>
                 <?php } ?> 
                <?php

         $idFunci = isset($_SESSION['id_funci']) ? $_SESSION['id_funci'] : NULL;
         if(isset($idFunci) and ($_SESSION['perfil']=='admin')){ ?>
                                  <li><a href="lista_cliente2.php">Clientes Cadastrados!</a></li>
                                  <?php }else{ ?>  
                 <?php } ?>      
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>
<?php
	include "banco_restaurante.php";

		$id= $_GET['id'];//produto selecionado
		$sql_query="SELECT * FROM cliente where id_cliente= $id";//exibir os prdutos 
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

	<h1>Alterar Cliente!</h1>
<br>
<br>
		<form name="form1" id="form1"  enctype="multipart/form-data" method="POST">

	<label> Nome:</label> 
	<input type="text" name="nome" id="nome" value="<?php echo $row['nome']; ?>"> <p></p>
	<label>Usuario:</label>
<input type="text" name="usuario"  id="usuario" value="<?php echo $row['usuario']; ?>"> <p></p> 
	<label>Senha:</label>
<input type="password" name="senha"  id="senha" value="<?php echo $row['senha']; ?>"> <p></p>
<label>Email:</label>
<input id="email" type="text" name="email"  value="<?php echo $row['email']; ?>"> <p></p>
	
	
	
 			<td colspan="4">
				<center><input type="submit"  class="btn btn-primary" name="botao_atualizar" value="atualizar">	
				<a href="lista_cliente2.php"><input type="button" class="btn btn-success"  value="Consultar"> </button><a></center>
		            <p></p>
					<a  class="btn btn-danger" href="lista_cliente.php">Voltar</a>	

	</form>
    
		</div>		          
        
		</div>
        </div> <!-- END of content -->
		</div> <!-- END of main -->
    
    
</div>

<?php
	if(isset($_POST['botao_atualizar']))
	{
		//recebe variáveis
		
	$nome = $_POST['nome'];//nome imput
	$usuario = $_POST['usuario'];//nome imput
	$senha = $_POST['senha'];//nome imput
	$email = $_POST['email'];//nome imput

		
			$sql_query1 = "update cliente set nome='$nome',usuario='$usuario',senha='$senha',email='$email' where id_cliente=".$_GET['id'];
			mysql_query($sql_query1) or die ("<b>false:</b> problema ao ALTERAR nome <br/>".mysql_error());
			echo "<script> window.location=\"lista_cliente.php\" </script>";//comando sql
		}
	

?>
</body>
</html>