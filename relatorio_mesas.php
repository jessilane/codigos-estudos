<?php

include_once "banco_restaurante.php";
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
  
 <link rel="stylesheet" href="jquery-ui-1.12.1.custom/base_jquery-ui.css">
   <link rel="stylesheet" href="/resources/demos/style.css">
 <script src="jquery-ui-1.12.1.custom/jquery-1.12.4.js"></script>
  <script src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>

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
           minlength: 2

        },
        data_final: {
          required: true,
          minlength: 2
          
        }
        
        
      },
      messages: {
        data: {
          required: "Preencha o campo Data de inicio"
        },
        data_final: {
          required: "Preencha o campo Data de Final"
        }
        
      },
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
	  		  <li class="active"><a href="relatorio_mesas.php">Relatorio de Mesas</a></li>
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
<br><br>
<br>
<br><br>
<br>
<br>
<br>

<center>
    <form id="form1" name="form1"  action="inserir_relatorio.php" method="post">
     <h2>Escolha um Intervalo de Datas:</h2>
     <br>

     <label>Data de Inicio</label>
     <input type="date" id="data" name="data"><br><br>
     <label>Data Final</label>
     <input type="date" id="data_final" name="data_final"><br><br>
     <input  class="btn btn-danger" type="submit"  value="Enviar"> </button>
</form>
</center>
</body>
</html>










