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
                         <li><a href="lista_reservas2.php">Lista de Reservas! </a></li>
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



    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img  src="imagem/locall.jpeg" class="first-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>J.T restaurant</h1>
              <p> Restaurante, feito para você, com todos os tipos de Refeições com todo conforto, fica localizado em um local tranquilo em frente a beira mar de Fortaleza. Com fachada vidrada em dois lados do edifício.</p>
              <p><a class="btn btn-lg btn-primary" href="historia.php" role="button">Promoções do dia. </a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img  src="imagem/mesass.jpg" class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Faça Suas Resevas Online</h1>
              <p>Temos variações de mesas tudo para a sua comodidade. Reservar uma mesa online é fácil e leva apenas alguns minutos.</p>
              <p><a class="btn btn-lg btn-primary" href="reserva_mesas.php" role="button">Reservar Agora</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="imagem/pedido.jpg" class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Faça seus Pedidos.</h1>
              <p>Para aqueles com pura indulgência alimentar em mente, venha ao lado e sate seus desejos com a nossa sempre mudando internacionalmente e sazonalmente inspirado pequenos pratos. Nós adoramos comida, muita comida diferente, como você.</p>
              <p><a class="btn btn-lg btn-primary" href="i_pedido.php" role="button">Fazer Pedido!</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

 
    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img  src="imagem/vinho.jpg" class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Vinhos Puros</h2>
          <p>Uma de nossas bebidas mais pedidas pro nosso clientes. Escolha o seu tipo de vinho, temos varios. Tudo de melhor para o seu paladaR</p>
          <p><a class="btn btn-default" href="bebidas.php" role="button">Ver mais &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img  src="imagem/prato3.jpg" class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Filé de Carne</h2>
          <p>Filé e uma de nossas especialidades, temos de frango e carne. Velha provar e se deliciar com essas maravilhas.</p>
          <p><a class="btn btn-default" href="cardapio.php" role="button">Ver mais  &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img src="imagem/coxinha.jpg" class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
          <h2>Fast Food</h2>
          <p>Quer fazer um refeição rapida? Conheça o nossos Fast Food e uma novidade nossa que trouxemos para facilitar a sua vida.</p>
          <p><a class="btn btn-default" href="fast_food.php" role="button">Ver mais  &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->

			          

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Voltar para o topo</a></p>
        <p>&copy; 2017 J.T restaurant.</p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
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
