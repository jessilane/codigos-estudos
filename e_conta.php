<?php
require"verifica_funci.php";
 include "banco_restaurante.php";

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
				id_funci: {
					required: true
				},
				data: {
					required: true,
					minlength: 2
					
				},
				hora_abertura: {
					required: true,
					minlength: 2
				},
				valor_total: {
					required: true,
					minlength: 2
				},
				id_produto: {
					required: true
				}
				
				
			},
			messages: {
				id_funci: {
					required: "Escolha um garçom"
				},
				data: {
					required: "Preencha o campo Data de Abertura"
				},
				hora_abertura: {
					required: "Preencha o campo Hora de Abertura"
				},
				valor_total:{
				     required: "Preencha o campo Valor"

				},
				id_produto: {
					required: "Escolha um produto"
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
function consultaTempo(element){
  var date = $(element).val();
  $.ajax({
      type: 'get',
      data: 'data='+date,
      url:'time1.php',
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
      url:'mesa1.php',
      success: function(json){
        var options = "";
    $.each(JSON.parse(json), function(idMesas, mesas){
       options += '<option   value="' + mesas.idMesas + '">' + mesas.numero_mesas + '</option>';
    });
        $("#idMesas").html(options); 
      }
       })
}
</script>	
	
	
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
 
                 <li ><a href="area_ga.php">Área de Administração</a></li>
	  		<li><a href="abrirConta.php">Abrir Conta</a>	</li>
	  		<li ><a href="lista_deConta.php">Visualizar Conta Aberta</a>	</li>
 <?php
				 $idFunci = isset($_SESSION['id_funci']) ? $_SESSION['id_funci'] : NULL;
				 if(isset($idFunci) and ($_SESSION['perfil']=='Garcom')){ ?>
                                  <li><a href="lista_garcom.php">Minha Conta!</a></li>

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

		$id= $_GET['id'];//conta selecionado
		$sql_query="SELECT * FROM conta where id_conta= $id";//exibir os prdutos 
		$result_set = mysql_query($sql_query);//comando sql
		$row = mysql_fetch_array($result_set);//comando sql
?>

<br>
<br>
<br>
<br>
<br>
<center>

	<h2>Alterar Conta!</h2>
<br>
	
		<form name="form1" id="form1" enctype="multipart/form-data" method="POST">
		 <label>Funcionario:</label>

<?php	
   $idFunci = $_SESSION['id_funci'];
   $nomeFunci = $_SESSION['login_funci'];
 ?>
	<input type="hidden" value="<?php echo $idFunci; ?>" name="id_funci">
	<input type="text" value="<?php echo $nomeFunci; ?>">
	<p></p>
  <img src="imagem/cale.png"   width="40px" height="40px"/> 
    
<input type="date" name="data" id="data" placeholder="Data" size="10" onBlur="consultaTempo(this);" value="<?php echo $row['data'];?>"/>
       <p></p>

     <img src="imagem/relo.jpg"   width="40px" height="40px"/>


 <select id="id_hora" name="id_hora" onBlur="consultaMesas(this);" value="<?php echo $row['id_hora'];?>">
 </select>    <p></p>

		     <img src="imagem/mesa.png"   width="40px" height="40px"/>
			 
<select id="idMesas" name="idMesas" value="<?php echo $row['idMesas'];?>">
 </select>    
    <p></p>
<label>Associa um Produto:</label> 
  <?php
   $queryProdto = "select *from produto order by id_produto";
   $resultF = mysql_query($queryProdto) or die (mysql_error());
 ?>
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
<p></p>  <a class="btn btn-warning" href="i_produto.php">Inserir Produto</a><p></p>

<label>Valor Total:</label>
<input  name="valor_total" id="valor_total" type="text" size="30"  value="<?php echo $row['valor_total'];?>"/>
 <p></p>	 
 <label>Estado da Conta: Aberta  </label> - <input id="estado_conta" type="checkbox" name="estado_conta" value="Aberta" size="10" />  | <label> Cancelada </label>- <input id="estado_conta" type="checkbox" name="estado_conta" value="Cancelada" size="10" <?php echo $row['estado_conta']; ?>  />  
 <br><br>


<td colspan="4">
				<center><input type="submit" name="botao_atualizar" class="btn btn-primary" value="atualizar">	
				<a href="lista_deConta.php"><input type="button" class="btn btn-success" value="Consultar"> </button><a></center>
					<p></p>
					<a  class="btn btn-danger" href="lista_deConta.php">Voltar</a>	

			 <br><br>

   


	

<?php
	if(isset($_POST['botao_atualizar']))
	{
		//recebe variáveis
		
	$id_funci = $_POST['id_funci'];//nome imput
	$data_abertura = $_POST['data'];//nome imput
	$id_hora = $_POST['id_hora'];//nome imput
	$valor_total = $_POST['valor_total'];//nome imput
	$id_produto = $_POST['id_produto'];//nome imput 
	$estado_conta = $_POST['estado_conta'];//nome imput 
	$idMesas = $_POST['idMesas'];//nome imput 

 
	
  

		
			$sql_query1 = "update conta set id_funci='$id_funci',data='$data',id_hora='$id_hora',valor_total='$valor_total',id_produto='$id_produto',estado_conta='$estado_conta',idMesas='$idMesas' where id_conta=".$_GET['id'];
			mysql_query($sql_query1) or die ("<b>false:</b> problema ao ALTERAR id_garcom <br/>".mysql_error());
			echo "<script> window.location=\"lista_deConta.php\" </script>";//comando sql
		}
	

?>
</center>
</body>
</html>