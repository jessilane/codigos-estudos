<?php 
  error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
  $servidor = 'localhost';
  $banco='restaurante';
  $usuario='root';
  $senha='';
  
  $conexao = mysql_connect($servidor,$usuario,$senha);
  if (!($conexao)) {
	   echo "Não foi possivel estabelecer uma conexão com MYSQL.";
	   exit;
  }
   $selecao = mysql_select_db($banco,$conexao);
   if(!(selecao)){
	  echo "Não foi possivel selecionar o gerenciador MYSQL.";
	  exit;
   }
 ?>