<?php    
include"banco_restaurante.php";
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
				nome: {
					required: true,
					minlength: 5
				},
			
				email: {
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
			
			},
			messages: {
				nome: {
					required: "Preencha o campo Nome"
				},
				
				email: {
				     required: "Preencha o campo email"
				},
				usuario: {
					required: "Preencha o campo usuario"
				},
				senha:{
				     required: "Preencha o campo senha"

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
                <li ><a href="reserva_mesas.php">Resevar Mesa</a></li>
                <?php
				 $idCliente = isset($_SESSION['id_cliente']) ? $_SESSION['id_cliente'] : NULL;
				 if(isset($idCliente)){ ?>
					<li><a href="logout.php">Sair</a></li>
                 <?php }else{ ?>  
          <li class="active"><a href="i_cliente.php">Seja Nosso Cliente!</a></li>
                 <?php } ?>  
                           <?php

         $idFunci = isset($_SESSION['id_funci']) ? $_SESSION['id_funci'] : NULL;
         if(isset($idFunci) and ($_SESSION['perfil']=='admin')){ ?>
                                  <li><a href="lista_cliente2.php">Clientes Cadastrados!</a></li>
                                         <li><a onClick="return confirm('certeza que deseja SAIR?')" href="logoutGa.php">Sair</a></li>

                                  <?php }else{ ?>  
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
          <img src="imagem/cadastro.jpg" class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Dados do Cliente!</h1>
			   <p>Informe seus dados abaixo!</p>
            </div>
          </div>
        </div>
<center>
<form  id="form1" name="form1" enctype="multipart/form-data" action="inserir_cliente.php" method="post">
 <br>
 <label>Nome:</label>
 <input type="text" name="nome" size="30" id="nome"/>
<p></p>

<label>Email:</label>
<input id="email" type="text" name="email" size="45" />
<p></p>
<label>Usuário:</label>
<input type="text" name="usuario" size="25" id="usuario" />
 <p></p>
<label>Senha:</label>
<input type="password" name="senha" size="25" id="senha" />
<p></p>

<p></p>
<input  class="btn btn-danger" type="submit"  value="SALVAR"> </button>
<input class="btn btn-primary" type="reset"  value="LIMPAR"> </button>
<br>
<br>
<a  class="btn btn-default"  href="usuario.php"/> Já Sou Cliente
</table>
</form>
</center>


  




</body>
</html>