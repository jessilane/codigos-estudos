<?php
 include "banco_restaurante.php";
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
				data: {
					required: true,
					minlength: 10
				},
				hora: {
					required: true,
					minlength: 5
				},
				idMesas: {
					required: true,
					minlength: 5
				},
				qnt_pessoas: {
					required: true,
					minlength: 5
				},
				id_cliente: {
					required: true,
					minlength: 5
				},
			
			},
			messages: {
				data: {
					required: "Preencha"
				},
				hora: {
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
                <li ><a href="reserva_mesas.php">Resevar Mesa</a></li>
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

<?php
	include "banco_restaurante.php";

		$id= $_GET['id'];//produto selecionado
		$sql_query="SELECT * FROM reserva_mesas where id_reserva= $id";//exibir os prdutos 
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

	<h2>Alterar Reservas</h2>
<br>
<br>
<table>

		<form name="form1" id="form1"  enctype="multipart/form-data" method="POST">
<tr>
<td class="sobee"> 
  <img src="imagem/cale.png"   width="40px" height="40px"/> 
 <input type="date" name="data"  onBlur="consultaTempo(this);" value="<?php echo $row['data']; ?>"><img src="imagem/relo.jpg"   width="40px" height="40px"/>
	   <select id="id_hora" name="id_hora" onBlur="consultaMesas(this);" value="<?php echo $row['id_hora']; ?>">
     
   
          </select><img src="imagem/mesa.png"   width="40px" height="40px"/>
			 
<select id="idMesas" name="idMesas" value="<?php echo $row['idMesas']; ?>">
 </select>

	<img src="imagem/pesso.jpg"   width="40px" height="40px"/>
<select name="qnt_pessoas" id="qnt_pessoas" value="<?php echo $row['qnt_pessoas']; ?>">
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
	<input type="text" value="<?php echo $nomeCliente; ?>"> 
 			</td></tr>
<br>
 <td colspan="4">
				<center>
                <br><br>
				<input type="submit" name="botao_atualizar" class="btn btn-primary" value="atualizar">	
				<a href="lista_reservas.php"><input type="button" class="btn btn-success" value="Consultar"> </button><a>
					<p></p>
					<a  class="btn btn-danger" href="lista_reservas.php">Voltar</a>	
</center>
			</td></tr>
			</table>
			</center>
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
		
	$data = $_POST['data'];//nome imput
	$id_hora = $_POST['id_hora'];//nome imput
	$idMesas = $_POST['idMesas'];//nome imput
	$qnt_pessoas = $_POST['qnt_pessoas'];//nome imput

  
		
			$sql_query1 = "update reserva_mesas set data='$data',id_hora='$id_hora',idMesas='$idMesas',qnt_pessoas='$qnt_pessoas' where id_reserva=".$_GET['id'];
			mysql_query($sql_query1) or die ("<b>false:</b> problema ao ALTERAR data <br/>".mysql_error());
			echo "<script> window.location=\"lista_reservas.php\" </script>";//comando sql
		}
	

?>
</body>
</html>