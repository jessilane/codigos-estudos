
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
	  		   <li  class="active"><a href="mes.php">Calcular Comissões </a></li>
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

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<center>

<form method="post" action="mes.php" id="frm-filtro">
      <p>
        <label for="pesquisar">Mês De Atuação:</label>
       <select name="mes">
		<option value="01">	Janeiro</option>
		<option value="02">Fevereiro</option>
		<option value="03">Março</option>
		<option value="04">Abril</option>
		<option value="05">Maio</option>
		<option value="06">Junho</option>
		<option value="07">Julho</option>
		<option value="08">Agosto</option>
		<option value="09">Setembro</option>
		<option value="10">Outubro</option>
		<option value="11">Novembro</option>
		<option value="12"> Dezembro</option>
	   </select>
	     <input type="submit" width="10" height="15" value="Buscar" class="btn btn-primary">
      </p>
	
    </form>
    
    <table cellspacing="0" summary="Tabela de dados fictícios">
      <thead>
	  <tr>
 <th>Nome:</th>
 <th>Comissão:</th>
  </thead>
      <tbody>
 <?php
$ano = date('Y');
$dia_i= '01';
echo $_POST['mes'];
if($_POST['mes'])
	$mes =$_POST['mes'];
else
	$mes = date('m');

$id_funci_array =$_POST['id_funci_array'];
if($id_funci_array)
  $bus_gac = "AND garcom.id_funci IN [$id_funci_array]"; // 1,2
$dia_f = date("t", mktime(0,0,0,$mes, $dia_i, $ano));
$dt_inicial="$ano-$mes-$dia_i";
$dt_final="$ano-$mes-$dia_f";
$queryMes= "SELECT nome_funci, (sum(VALOR_TOTAL)*0.1)as comissao FROM garcom LEFT JOIN conta ON garcom.id_funci = conta.id_funci WHERE conta.data BETWEEN '$dt_inicial' AND '$dt_final' $bus_gac GROUP BY nome_funci;";

$result = mysql_query($queryMes) or die (mysql_error());
while($row=mysql_fetch_array($result)){
?>
	
	<tr>
		<td><?php echo $row[0];?></td>
		<td><?php echo $row[1];?></td>
	</tr>
<?php } ?>
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
    


	 </center>


 </body>
 </html>
  