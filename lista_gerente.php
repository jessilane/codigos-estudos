<?php
 include "banco_restaurante.php";
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
		
<meta charset="UTF-8" />
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
 
                 <li ><a href="area_ge.php">Área de Administração</a></li>
                 <li><a href="i_produto.php">Cadastrar Produto</a>	</li>
                <li><a href="lista_prod.php">Visualizar Produtos</a></li>
	  		   <li  ><a href="mes.php">Calcular Comissões </a></li>
	  		  <li><a href="relatorio_mesas.php">Relatorio de Mesas</a></li>
                 <?php
				 $idFunci = isset($_SESSION['id_funci']) ? $_SESSION['id_funci'] : NULL;
				 if(isset($idFunci))  { ?>
                                  <li class="active"><a href="lista_gerente.php">Minha Conta!</a></li>

					<li><a onClick="return confirm('certeza que deseja SAIR?')" href="logoutGa.php">Sair</a></li>
                 <?php }else{ ?>  
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
<br><br>
<br>
<br>

<center>
<img src="imagem/ftgerente.png"  width="150px" height="150px"/><br>

<h2>Olá Gerenete  <?php echo $_SESSION['login_funci'] ?> Veja seus dados!</h2><br>


    
    <table cellspacing="0" summary="Tabela de dados fictícios">
      <thead>
      
	 <tr>
 <th>ID:</th>

 <th>Nome:</th>
  <th>Data de Nascimento:</th>
  <th>Endereço:</th>
 <th>CPF:</th> 
 <th>RG:</th>
 <th>Escolaridade:</th>
 <th>Perfil:</th>
 <th>Status:</th>
  <th>Login:</th>
  <th>Email:</th>
<th colspan="2">Operacoes</th>
</tr>

       
      </thead>
      <tbody>
<?php
echo "<meta charsert=UTF-8>";
 $sql_query ="SELECT  garcom.id_funci, 
 garcom.nome_funci,
 garcom.data,
 garcom.endereco,
 garcom.cpf,
 garcom.rg,
 escolaridade.grau_escolaridade,
 garcom.perfil,
 garcom.status, 
 garcom.login_funci,
 garcom.email FROM garcom,escolaridade where garcom.id_escolaridade = escolaridade.id_escolaridade  AND garcom.id_funci=$idFunci";
 $result_set = mysql_query ($sql_query);
 while ($row = mysql_fetch_assoc($result_set))
 {
	 ?>
	 <tr>
	<td><?php echo $row['id_funci'];?></td>
    	<td><?php echo $row['nome_funci'];?></td>

	<td><?php echo $row['data'];?></td>
	<td><?php echo $row['endereco'];?></td>
	<td><?php echo $row['cpf'];?></td>	
    <td><?php echo $row['rg'];?></td>
    <td><?php echo $row['grau_escolaridade'];?></td>
	<td><?php echo $row['perfil'];?></td>
	<td><?php echo $row['status'];?></td>
	<td><?php echo $row['login_funci'];?></td>
	<td><?php echo $row['email'];?></td>


	


	 <td><a href ="i_mensagem2.php?id=<?php echo $row['id_funci'];?>" onClick="return confirm('Você nao pode editar seu cadastro do sistema , mande mensagem para o proprietario. Enviar uma mensagem!')"><img src="imagem/edit.jpg" width="25" height="25" /></a></td>
	 <td><a href ="i_mensagem2.php?id=<?php echo $row['id_funci'];?>" onClick="return confirm('Você nao pode se excluir do sistema , mande mensagem para o proprietario. Enviar uma mensagem!')"><img src="imagem/delete.png" width="25" height="25" /></a></td>
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
	<br>
	<br>
	<br>
	<br>
	<br>
	
  <a  href="i_garcom.php" class="borda-esq">
<span class="borda-dir">
<h5>
</span>
</a><br>
<br>
 </center>


 </body>
 </html>
  