<?php
include"banco_restaurante.php";
require"veriLogGe.php";

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
<script>$().ready(function() {
		$("#form1").validate({
			rules: {
				nome_prod: {
					required: true,
					minlength: 2
				},
				porcao: {
					required: true,
					minlength: 2
				},
				valor: {
					required: true,
					minlength: 2
				},
			
				quantEstoque: {
					required: true,
					minlength: 2
				}
				
			},
			messages: {
				nome_prod: {
					required: "Preencha o campo Nome"
				},
				porcao: {
					required: "Preencha o campo Porção"
				},
				valor:{
				     required: "Preencha o campo Valor"

				},
			
				quantEstoque: {
				     required: "Preencha o campo Quantidade De Estoque"
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
 
                 <li ><a href="area_ge.php">Área de Administração</a></li>
				<li><a href="i_produto.php">Cadastrar Produto</a>	</li>
                <li><a href="lista_prod.php">Visualizar Produtos</a></li>
	  		   <li><a href="mes.php">Calcular Comissões </a></li>
	  		  <li><a href="relatorio_mesas.php">Relatorio de Mesas</a></li>
        <?php
				 $idFunci = isset($_SESSION['id_funci']) ? $_SESSION['id_funci'] : NULL;
         if(isset($idFunci) and ($_SESSION['perfil']=='Gerente')){ ?>
                                  <li><a href="lista_gerente.php">Minha Conta!</a></li>

					<li><a onClick="return confirm('certeza que deseja SAIR?')" href="logoutGa.php">Sair</a></li>
                 <?php }else{ ?>  
                 <?php } ?>
                 
                     <?php
         $idFunci = isset($_SESSION['id_funci']) ? $_SESSION['id_funci'] : NULL;
         if(isset($idFunci) and ($_SESSION['perfil']=='admin')){ ?>
       <li><a onClick="return confirm('certeza que deseja SAIR?')" href="logoutGa.php">Sair</a></li>

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
		$sql_query="SELECT * FROM produto where id_produto= $id";//exibir os prdutos 
		$result_set = mysql_query($sql_query);//comando sql
		$row = mysql_fetch_array($result_set);//comando sql
?>

<br>
<br>


<br>
<br>
<br>
<center>

	<h1>Alterar Produto!</h1>
<br>

	
		<form name="form1" id="form1" enctype="multipart/form-data" method="POST">

	<label> Nome do Produto :</label>
	<input type="text" name="nome_prod" value="<?php echo $row['nome_prod']; ?>"> <p></p>
	<label>Porção:</label> 
	<input type="text" name="porcao" value="<?php echo $row['porcao']; ?>"> <p></p>
	<label>Valor:</label> <input type="text" name="valor" value="<?php echo $row['valor']; ?>"><p></p>
	<label>Categorias:</label><select name="categoria" id="categoria" value="<?php echo $row['categoria']; ?>">
        <option>Selecione...</option>
        <option>Massas</option>
        <option>Sobremesas</option>
        <option>Bebidas</option>
        <option>Refeições</option>
   
          </select>
		<p></p>
	<label>Quantidade de Estoque: </label><input type="text" name="quantEstoque" value="<?php echo $row['quantEstoque']; ?>"> <p></p>
<img src="<?php echo $row["imagem"];  ?>" width="200px" height="200px"/><br>
	<input name="imagem" type="file"><br>

<p></p> <td colspan="4">
				<center><input type="submit" name="botao_atualizar" class="btn btn-primary" value="atualizar">	
				<a href="lista_prod.php"><input type="button" class="btn btn-success" value="Consultar"> </button><a></center>
					<p></p>
					<a  class="btn btn-danger" href="lista_prod.php">Voltar</a>	


   


	

<?php
	if(isset($_POST['botao_atualizar']))
	{
		//recebe variáveis
		
	$nome_prod = $_POST['nome_prod'];//nome imput
	$porcao = $_POST['porcao'];//nome imput
	$valor = $_POST['valor'];//nome imput
	$categoria = $_POST['categoria'];//nome imput
	$quantEstoque = $_POST['quantEstoque'];//nome imput 
  $foto=$_FILES['imagem'];//nome imput

	$destino="imagem/";
	$arquivo=basename($foto['name']);
	$destino=$destino.$arquivo;
		
		if(move_uploaded_file($foto['tmp_name'],$destino)){//pra modificar a imagem

		
		
			$sql_query1 = "update produto set nome_prod='$nome_prod',porcao='$porcao',valor='$valor',categoria='$categoria',quantEstoque='$quantEstoque',imagem='$destino' where id_produto=".$_GET['id'];
			mysql_query($sql_query1) or die ("<b>Error:</b> problema ao ALTERAR imagem <br/>".mysql_error());
			echo "<script> window.location=\"lista_prod.php\" </script>";//comando sql
	}
}
?>
</center>
</body>
</html>