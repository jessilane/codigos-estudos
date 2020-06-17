<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="imagem/ico.png">

    <title>J.T restaurant</title>

    <!-- Bootstrap core CSS -->
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
  </head>
<!-- NAVBAR
================================================== -->
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
                <li><a href="reserva_mesas.php">Resevar Mesa</a></li>
                 <?php
				 session_start();
				 $idCliente = isset($_SESSION['id_cliente']) ? $_SESSION['id_cliente'] : NULL;
				 if(isset($idCliente)){ ?>
                 <li><a href="lista_cliente.php">Minha Conta!</a></li>
					<li><a onclick="return confirm('certeza que deseja SAIR?')" href="logout.php">Sair</a></li>
                 <?php }else{ ?>  
          <li><a href="i_cliente.php">Seja Nosso Cliente!</a></li>
                 <?php } ?> 
                          <?php
         $idFunci = isset($_SESSION['id_funci']) ? $_SESSION['id_funci'] : NULL;
         if(isset($idFunci) and ($_SESSION['perfil']=='admin')){ ?>  
                                  <li ><a href="lista_reservas2.php">Lista de Reservas!</a></li>

                                  <li><a href="lista_cliente2.php">Clientes Cadastrados!</a></li>
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

<center>

<h1> Pratos Tradicionais!<img src="imagem/pratodo.png" width="90px" height="80px"/></h1>

 <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img  src="imagem/prato3.jpg"  class="img-thumbnail"  width="300px" height="300px" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Refeições Tradicionais </h2>
          <p>Na escolha de nossos pratos tradiçonais e acompanhado <br>
um vilho por Conta da casa.<br>
   <p>Preço: 45,00 </p>

        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img   src="imagem/prato6.jpg" class="img-thumbnail" width="300px" height="300px" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Batatas Fritas com Frango</h2>
          <p>Um de nosso pratos mais pedidos<br>
 são essas delicias de frangos com batatas fritas.</p> 
  <p>Preço: 30,00 </p> 
        </div><!-- /.col-lg-4 -->
         <div class="col-lg-4">
          <img  src="imagem/prato4.jpg" class="img-thumbnail" width="300px" height="300px" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Peixe com Batatas Fritas </h2>
          <p>Um Porção de delicia de peixe <br>
fresco com batatas fritas. </p> 
  <p>Preço: 40,00 </p>

        </div><!-- /.col-lg-4 -->
      </div><!-- /.row --> 
		
 <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img  src="imagem/prato7.jpg"  class="img-thumbnail"  width="300px" height="300px" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2> Frango Assado com Verduras</h2>
          <p>Um Prato Caprichado com frango assado na brasa <br>
com uma linda salada de verduras para entrar nos seus pradroes .<br>
  <p>Preço: 30,00 </p>
        </div><!-- /.col-lg-4 -->
		
        <div class="col-lg-4">
          <img   src="imagem/prato8.jpg" class="img-thumbnail" width="300px" height="300px" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Peixe com Frutas</h2>
          <p>Essa e um porção de carne adcinada a farinha <br>
fresca com acresentação de frutas.</p>  
 <p>Preço: 40,00 </p>
        </div><!-- /.col-lg-4 -->
         <div class="col-lg-4">
          <img  src="imagem/prato2.jpg" class="img-thumbnail" width="300px" height="300px" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2> Filé de Carne Fresca</h2>
          <p>Um de nosso pratos especiais e essa carne fresca <br>
com pomates feita na hora. </p> 
  <p>Preço: 55,00 </p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row --> 

</center>
   <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="bootstrap/docs/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="bootstrap/docs/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>


</html>