<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title>Área de Confimação</title>

    <!-- Bootstrap core CSS -->
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
 </head><!-- Formulário de Login -->
<br>
<br>
<form nome="form1" id="form1" action="processa_login.php" method="post">

<center>
<fieldset>
<img src="imagem/usu.png"  width="90px" height="95px"/>
<br>
<br>
<h1>Dados do Login </h1>
<br><br>
  <label for="usuario">Usuário:</label>
  <input type="text"  name="usuario" id="usuario" maxlength="25" />
  <br><br>


  <label for="senha">Senha:</label>
  <input type="password" class="input-medium search-query" name="senha" id="senha" />
<br><br>
 <a class="btn btn-success"   href="i_cliente.php" > Cadastra-se </a> 
<input  class="btn btn-danger" type="submit"  value="Entrar"> </button> 

</fieldset>
</center>
</form>