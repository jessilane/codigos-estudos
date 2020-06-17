<?php

require"banco_restaurante.php";
  require"verifica_funci.php";
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



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/jquery.validate.js"></script>
<script>

	$().ready(function() {
		$("#form1").validate({
			rules: {
				id_funci:{
				required: true,
					minlength: 1
				},
				
				tipo: {
					required: true,
					minlength: 1
				},
				observacao: {
					required: true,
					minlength: 1
				},
				
			
			},
			messages: {
				id_funci:{
					required: "Não deixe de Selecionar"
				},
				tipo: {
					required: "Escolha um tipo"
				},
			
				observacao: {
				     required: "Preencha o campo observação"
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

<br><br>
<br><br>


<center> 
<h1> Deixe suas Mensagem! <img src="imagem/mensagem.png" width="40" height="45" /> </h1>
<form  id="form1" name="form1" enctype="multipart/form-data" action="inserir_mensagem.php" method="post">

<table border="10">      
<tr>
<td>
<br>

 <label> Funcionario: </label>
<?php	
   $idFunci = $_SESSION['id_funci'];
   $nomeFunci = $_SESSION['login_funci'];
 ?>
	<input type="hidden" value="<?php echo $idFunci; ?>" name="id_funci">
	<input type="text" value="<?php echo $nomeFunci; ?>">
 <br>
 <br>

 <label>Tipo da Messagem: </label> <select name="tipo" id="tipo">
         <option>Editar Cadastro</option>

        <option>Se Demitir</option>
          </select>
		 <br>
		 <br>
  
  
 <label>Motivos: </label><textarea id="observacao" type="text" name="observacao" size="40" ></textarea>	
	</td>  
	<br>
	<br>
	<br>
	<br>

 
</table> 
<br> 
<input  class="btn btn-danger" type="submit"  value="SALVAR"> </button>
<input class="btn btn-primary" type="reset"  value="LIMPAR"> </button>
<p></p>
<a  class="btn btn-default"  href="lista_garcom.php"/> Voltar

</tr>
<br>
