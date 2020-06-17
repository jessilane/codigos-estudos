<?php

require"verifica_login.php";

include_once "banco_restaurante.php"; require"verifica_login.php";
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
	
 <link rel="stylesheet" href="jquery-ui-1.12.1.custom/base_jquery-ui.css">
   <link rel="stylesheet" href="/resources/demos/style.css">
 <script src="jquery-ui-1.12.1.custom/jquery-1.12.4.js"></script>
  <script src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>
  <style>
  #feedback { font-size: 1.4em; }
  #idMesas .ui-selecting { background: #FECA40; }
  #idMesas .ui-selected { background: #F39814; color: white; }
  #idMesas { list-style-type: none; margin: 0; padding: 0; width: 450px; }
  #idMesas li{ margin: 3px; padding: 1px; float: left; width: 100px; height: 80px; font-size: 4em; text-align: center; }
  </style>
  <script>
  $( function() {
    $( "#idMesas" ).selectable();
  } );
  </script>
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
  

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/jquery.validate.js"></script>
<script>

	$().ready(function() {
		$("#form1").validate({
			rules: {
				data: {
					required: true,
					minlength: 10

					},
				id_hora: {
					required: true,
					minlength: 10
				},
				idMesas: {
					required: true,
					minlength: 10
				},
				qnt_pessoas: {
					required: true,
		            minlength: 10
				},
				id_cliente: {
					required: true,
					minlength: 10
			},
			
			},
			messages: {
				data: {
					required: "Preencha"
				},
				id_hora: {
					required: "Preencha"
				},
				idMesas:{
				     required: "Preencha"

				},
				qnt_pessoas: {
				     required: "Preencha"
				},
				
				id_cliente: {
				     required: "Preencha"
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
function consultaTempo(element){
	var date = $(element).val();
	$.ajax({
      type: 'get',
      data: 'data='+date,
      url:'time.php',
      success: function(json){
        var options = "";
		$.each(JSON.parse(json), function(id_hora, hora){
		   options += '<option  class="ui-state-default" value="' + hora.id_hora + '">' + hora.hora + '</option>';
		});
        $("#id_hora").html(options); 
      }
       })
}
function consultaMesas(element){
	var date = $("#data").val();
	var id_hora = $(element).val();

	$.ajax({
      type: 'get',
	  data: { data:date, id_hora:id_hora },
      url:'mesa.php',
      success: function(json){
        var options = "";
		$.each(JSON.parse(json), function(idMesas, mesas){
		   options += '<option	 value="' + mesas.idMesas + '">' + mesas.numero_mesas + '</option>';
		});
        $("#idMesas").html(options); 
      }
       })
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
                <li class="active"><a href="reserva_mesas.php">Resevar Mesa</a></li>
                 <?php
				 session_start();
				 $idCliente = isset($_SESSION['id_cliente']) ? $_SESSION['id_cliente'] : NULL;
				 if(isset($idCliente)){ ?>
                 <li><a href="lista_cliente.php">Minha Conta!</a></li>
					<li><a onClick="return confirm('certeza que deseja SAIR?')" href="logout.php">Sair</a></li>
                 <?php }else{ ?>  
          <li><a href="i_cliente.php">Seja Nosso Cliente!</a></li>
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
          <img  src="imagem/mesas_grande.jpg" class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Faça Suas Resevas Online</h1>
              <p> Reservar uma mesa online é fácil e leva apenas alguns minutos..</p>
            </div>
          </div>
        </div>
<br>
<br>

<center>
<form id="form1" name="form1" enctype="multipart/form-data" action="inserir_reservas.php" method="post">

<td class="sobee"> 
  <img src="imagem/cale.png"   width="40px" height="40px"/> 

   <input type="date" name="data" id="data" placeholder="Data" size="10" onBlur="consultaTempo(this);" />
     <img src="imagem/relo.jpg"   width="40px" height="40px"/>


 <select id="id_hora" name="id_hora" onBlur="consultaMesas(this);">
 </select>
		     <img src="imagem/mesa.png"   width="40px" height="40px"/>
			 
<select id="idMesas" name="idMesas">
 </select>


		<img src="imagem/pesso.jpg"   width="40px" height="40px"/>
<select name="qnt_pessoas" id="qnt_pessoas">
        <option>Selecione...</option>
        <option>UMA</option>
        <option>DUAS</option>
        <option>TRES</option>
        <option>QUATRO</option>
        <option>CINCO</option>
        <option>SEIS</option>
        <option>SETE</option>
        <option>OITO</option>
        <option>NOVE</option>
        <option>DEZ</option>
   
          </select>

<img src="imagem/peso.jpg"   width="40px" height="40px"/>
<?php	
   $idCliente = $_SESSION['id_cliente'];
   $nomeCliente = $_SESSION['usuario'];
 ?>
	<input type="hidden" value="<?php echo $idCliente; ?>" name="id_cliente">
	<input type="text" value="<?php echo $nomeCliente; ?> " disabled="true" >

  <br>
  <br>
 
     

<input  class="btn btn-danger" type="submit"  value="SALVAR"> </button>
<input class="btn btn-primary" type="reset"  value="LIMPAR"> </button></td></tr>
 <br>
 <br>
  
 </td>
 </tr>
<tr>
<td>
<a class="btn btn-default" href="lista_reservas.php">Ver Minhas Resevas</a>
</td>
</tr>
</center>
<tr>

<td>
</td>
</tr>
 <br> 
 <br> 
 <br>
 <br>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="bootstrap/docs/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="bootstrap/docs/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
  
</body>
</table>
</form>