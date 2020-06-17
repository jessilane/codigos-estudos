<?php

include"banco_restaurante.php";
 require"veriLogPro.php";

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
					minlength: 2
				},
				endereco: {
					required: true,
					minlength: 2
				},
				telefone: {
					required: true,
					minlength: 2
				},
				email: {
					required: true,
					minlength: 2
				},
				rg: {
					required: true,
					minlength: 2
				},
				cpf: {
					required: true,
					minlength: 2
				},
				login: {
					required: true,
					minlength: 2
				},
				senha: {
					required: true,
					minlength: 2
				},
				confirma_senha: {
					required: true,
					minlength: 2,
					equalTo:"#senha"
				}
			},
			messages: {
				nome:{
					required: "Preencha o campo nome"
				},
				endereco: {
					required: "Preencha o campo endereço"
				},
				telefone: {
					required: "Preencha o campo telefone"
				},
				email: {
					required: "Preencha o campo email"
				},
				rg: {
					required: "Preencha o campo rg"
				},
				cpf: {
					required: "Preencha o campo cpf"
				},
				login: {
					required: "Preencha o campo login"
				},
				senha:{
				     required: "Preencha o campo senha"

				},
				confirma_senha: {
					required: "Preencha o campo confimar sua senha",
					equalTo:"Senha Diferente"
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
             <li><a href="area_ga.php">Atuações do Garçom</a></li>
	        <li><a href="area_ge.php">Atuações do Gerente</a></li>
        	  		<li class="active"><a href="i_gerente.php">Cadastrar Gerente </a>	</li>
                 
               
              </ul>
            </div>
          </div>
        </nav>
		  </div>
    </div>
<br><br>
<br><br>
<br><br>
<br><br>
<center>
         <h2>  Inserir um novo Gerente!  </h2>
<form id="form1" name="form1" enctype="multipart/form-data" action="inserir_gerente.php" method="post">
<br>

 <label>Nome Completo: </label>
 <input id="nome" type="text"  name="nome" size="50" /><p></p>
 <label> Endereço:  </label>
 <input id="endereco" type="text"  name="endereco" size="50" /><p></p>
  <label> Telefone:  </label>
  <input type="text" id="telefone" size="25" name="telefone" onKeyPress="MascaraTelefone(form1.telefone);" 
maxlength="14"  onBlur="ValidaTelefone(form1.telefone);"><p></p>
  <label>Email  </label>
 <input type="text" id="email" name="email" size="40" maxlength="40" onBlur="ValidaEmail();"><p></p>
   <label>RG:  </label>
 <input type="text" id="rg" name="rg" size="25" onBlur="ValidarCPF(form1.rg);" 
onKeyPress="MascaraRG(form1.rg);" maxlength="14"><p></p>
  <label>CPF:  </label>
 <input type="text" id="cpf" name="cpf"size="25" onBlur="ValidarCPF(form1.cpf);" 
onKeyPress="MascaraCPF(form1.cpf);" maxlength="14"><p></p>
  <label>Login : </label>
 <input type="text"  name="login" id="login"><p></p>
 <label>Senha: </label>
<input type="password"   name="senha" id="senha" ><p></p>
 <label>Confirmar Senha: </label>
<input type="password"   name="confirma_senha" id="confirma_senha" ><p></p>

<br>
<input  class="btn btn-danger" type="submit"  value="SALVAR"> </button>
<input class="btn btn-primary" type="reset"  value="LIMPAR"> </button>
<p></p>
<a class="btn btn-default" href="area_pro.php"/> Gerente Cadastrados


</form>
</center>







</body>
</html>