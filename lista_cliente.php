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
		

       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script src="js/jquery.tablesorter.min.js"></script>
    <script src="js/jquery.tablesorter.pager.js"></script>
		<link rel="stylesheet" href="css/custom.css" media="screen" />
		

      
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
                 <li  class="active"><a href="lista_cliente.php">Minha Conta!</a></li>
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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<center>
<img src="imagem/usu.png"  width="90px" height="95px"/>
<h2>Olá <?php echo $_SESSION['usuario'] ?> Veja seus dados!</h2>

  <br>
<br>  
    <table cellspacing="0" summary="Tabela de dados fictícios">
      <thead>
      
<tr>
 <th>Codigo</th>
  <th>Nome:</th>
 <th>Usuario:</th>
 <th>Senha:</th>
 <th>Email:</th>

 
<th colspan="2">Operacoes</th>
</tr>

       
      </thead>
      <tbody>
<?php
echo "<meta charsert=UTF-8>";
 $sql_query ="SELECT *FROM cliente WHERE  cliente.id_cliente=$idCliente";
 $result_set = mysql_query ($sql_query);
 while ($row = mysql_fetch_assoc($result_set))
 {
	 ?>
	 <tr>
	 <td><?php echo $row['id_cliente'];?></td>
     	 <td><?php echo $row['nome'];?></td>

	<td><?php echo $row['usuario'];?></td>
	<td><?php echo $row['senha'];?></td>
	<td><?php echo $row['email'];?></td>

<td><a href ="e_cliente.php?id=<?php echo $row['id_cliente'];?>"><img src="imagem/edit.png" width="25" height="25" /></a></td>
	 <td><a href ="apagar_reserva.php?id=<?php echo $row['id_cliente'];?>"  onclick="return confirm('Você tem certeza que deseja excluir este item?')"><img src="imagem/delete.png" width="25" height="25" /></a></td>
		 </tr>
		 <?php
 }
 ?>
 
 
 
 </table>
 <div id="pager" class="pager">
    	<form>
				<span>
					Exibir <select class="pagesize">
							<option selected="selected"  value="10">10</option>
							<option value="20">20</option>
							<option value="30">30</option>
							<option  value="40">40</option>
					</select> registros
				</span>

				<img src="imagem/first.png" class="first"/>
    		<img src="imagem/prev.png" class="prev"/>
    		<input type="text" class="pagedisplay"/>
    		<img src="imagem/next.png" class="next"/>
    		<img src="imagem/last.png" class="last"/>
    	</form>
    </div>
    
    <script>
    $(function(){
      
      $('table > tbody > tr:odd').addClass('odd');
      
      $('table > tbody > tr').hover(function(){
        $(this).toggleClass('hover');
      });
      
      $('#marcar-todos').click(function(){
        $('table > tbody > tr > td > :checkbox')
          .attr('checked', $(this).is(':checked'))
          .trigger('change');
      });
      
      $('table > tbody > tr > td > :checkbox').bind('click change', function(){
        var tr = $(this).parent().parent();
        if($(this).is(':checked')) $(tr).addClass('selected');
        else $(tr).removeClass('selected');
      });
      
      $('form').submit(function(e){ e.preventDefault(); });
      
      $('#pesquisar').keydown(function(){
        var encontrou = false;
        var termo = $(this).val().toLowerCase();
        $('table > tbody > tr').each(function(){
          $(this).find('td').each(function(){
            if($(this).text().toLowerCase().indexOf(termo) > -1) encontrou = true;
          });
          if(!encontrou) $(this).hide();
          else $(this).show();
          encontrou = false;
        });
      });
      
      $("table") 
        .tablesorter({
          dateFormat: 'uk',
          headers: {
            0: {
              sorter: false
            },
            5: {
              sorter: false
            }
          }
        }) 
        .tablesorterPager({container: $("#pager")})
        .bind('sortEnd', function(){
          $('table > tbody > tr').removeClass('odd');
          $('table > tbody > tr:odd').addClass('odd');
        });
      
    });
    </script>

 </center>


 </body>
 </html>
  