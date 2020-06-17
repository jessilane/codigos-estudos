
<?php

include "banco_restaurante.php";
require"veriLogGa.php";

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

      <script src="js/jquery.js"></script>
	<script src="js/jquery.validate.js"></script>
	<script>
	$().ready(function() {
		$("#form1").validate({
			rules: {
				numero_mesas: {
					required: true,
					minlength: 5
				}
			},
			messages: {
				numero_mesas: {
					required: "insira uma nova mesa"
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
</script>	
      	
		

	</head>
	

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
              <a class="navbar-brand" href="#">J.T restaurant</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.html">Home</a></li>
	  		<li><a href="abrirConta.php">Abrir Conta</a>	</li>
	  		<li><a href="lista_deConta.phph">Visualizar Contas Abertas</a>	</li>
                 
               
              </ul>
            </div>
          </div>
        </nav>
		  </div>
    </div>


<br>
<br>
<br>
<br>
<br>
<br>
<br>


<br>
<center>
<h1> Inserir uma nova mesa </h1>
<br>
<br>

<form id="form1" name="form1" enctype="multipart/form-data" action="inserir_mesas.php" method="post">

<label>Mesa:</label>
<input id="numero_mesas" type="text" name="numero_mesas" size="20" />
<p></p>
<br>
<br>
<input  class="btn btn-danger" type="submit" name="Inserir" id="Inserir" value="Inserir"> </button>
<input class="btn btn-primary" type="reset"  value="LIMPAR"> </button>
 <br>
 <br>
     <a class="btn btn-success" href="i_produto.php"><<- Voltar</a><p></p>

</form>
</center>






</body>
</html>