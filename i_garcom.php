<?php
 include "banco_restaurante.php";
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
				nome_funci: {
					required: true,
					minlength: 5
				},
				data: {
					required: true,
					minlength: 5
				},
				telefone: {
					required: true,
					minlength: 5
				},
				endereco: {
					required: true,
					minlength: 5
				},
				rg: {
					required: true,
					minlength: 2
				},
				//id_escolaridade: {
					//required: true,
					//minlength: 2
				//},
				//perfil: {
					//required: true,
					//minlength: 2
				//},
				//status: {
					//required: true,
					//minlength: 2
				//},
				login_funci: {
					required: true,
					minlength: 2
				},
				senha_funci: {
					required: true,
					minlength: 2
				},
				confirma_senha: {
					required: true,
					minlength: 2,
					equalTo:"#senha_funci"
				},
				email: {
					required: true,
					minlength: 2
				}
			},
			messages: {
				nome_funci: {
					required: "Preencha o campo Nome"
				},
				data: {
					required: "Preencha o campo data"
				},
				telefone:{
				     required: "Preencha o campo telefone"

				},
				endereco: {
				     required: "Preencha o campo endereco"
				},
				
				cpf: {
				     required: "Preencha o campo cpf"
				},
				rg: {
					required: "Preencha o campo rg"
				},
				//id_escolaridade: {
					//required: "Preencha o campo escolaridade "
				//},
				//perfil: {
					//required: "Preencha o campo Perfil "
				////},	
				//status: {
					//required: "Preencha o campo Status "
				//},
				login_funci: {
					required: "Preencha o campo login"
				},
				senha_funci:{
				     required: "Preencha o campo senha"

				},
				confirma_senha: {
					required: "Preencha o campo confimar sua senha",
					equalTo:"Senha Diferente"
				},
			    email: {
					required: "Preencha o campo email"
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
             <a class="navbar-brand" href="index.php">J.T restaurant</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                
                  <li ><a href="area_pro.php">Área de Administração</a></li>
              <li><a href="area_ga.php">Atuações do Garçom</a></li>
              <li><a href="area_ge.php">Atuações do Gerente</a></li>
              <li class="active"><a href="i_garcom.php">Cadastrar Funcionario </a>  </li>
  
              <?php
         $idFunci = isset($_SESSION['id_funci']) ? $_SESSION['id_funci'] : NULL;
         if(isset($idFunci)){ ?>
                                  <li ><a href="lista_proprietario.php">Minha Conta!</a></li>

              
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
              <h1> Dados</h1>
			   <p>Informe os dados do Funcionario.</p>
            </div>
          </div>
        </div>

<center>
<form id="form1" name="form1" enctype="multipart/form-data" action="inserir_garcom.php" method="post">
<br>
<label>Nome Completo:</label>
<input id="nome_funci" type="text" name="nome_funci" size="50" />
<p></p>
<label>Data de Nascimento:</label>
<input type="date" id="data" name="data" onKeyPress="MascaraData(form1.data);"
 maxlength="10" onBlur= "ValidaDataform1.data);"><p></p>

 <label>Telefone:</label>
<input type="text" id="telefone" name="telefone" size="30" onKeyPress="MascaraTelefone(form1.telefone);" 
maxlength="14"  onBlur="ValidaTelefone(form1.telefone);">
<p></p>
<label> Endereço:</label>
<input  type="type" id="endereco" size="40" name="endereco" />
<p></p>
<label>CPF:</label>
<input type="text" id="cpf" name="cpf" size="30"  onBlur="ValidarCPF(form1.cpf);" 
onKeyPress="MascaraCPF(form1.cpf);" maxlength="14">
<p></p> 
<label>RG:  </label>
 <input type="text" id="rg" name="rg" size="25" onBlur="ValidarCPF(form1.rg);" 
onKeyPress="MascaraRG(form1.rg);" maxlength="14"><p></p>

   <?php
   $queryEscolaridade = "select *from escolaridade order by id_escolaridade";
   $resultF = mysql_query($queryEscolaridade) or die (mysql_error());
 ?>
 <label>Grau de Escolaridade:</label>
<select id="id_escolaridade" name="id_escolaridade">
 <?php 
 while ($row = mysql_fetch_array($resultF)) {
?>
<option value="<?php echo $row['id_escolaridade'];?> "> <?php echo $row['grau_escolaridade']; ?></option> 
 <?php } ?> 
 </select>
<p></p>
<label>Perfil</label>
<select  id="perfil" name="perfil">
<option value="Garçom">Garçom</option>
<option value="Gerente">Gerente</option>
<option value="admin">admin</option>

</select><p></p>
 <label>Status</label>
<select  id="status" name="status">
<option value="Ativo">Ativo</option>
<option value="Desativado">Desativado</option>
</select><p></p>
  <label>Login : </label>
 <input type="text"  name="login_funci" id="login_funci"><p></p>
 <label>Senha: </label>
<input type="password"   name="senha_funci" id="senha_funci" ><p></p>
 <label>Confirmar Senha: </label>
<input type="password"   name="confirma_senha" id="confirma_senha" ><p></p>

<label>Email  </label>
 <input type="text" id="email" name="email" size="40" maxlength="40" onBlur="ValidaEmail();"><p></p>


<input  class="btn btn-danger" type="submit"  value="SALVAR"> </button>
<input class="btn btn-primary" type="reset"  value="LIMPAR"> </button>
<br>
<br>
<a class="btn btn-default" href="lista.php"/> Garçom Cadastrados
</table>
</form>
</center>







</body>
</html>