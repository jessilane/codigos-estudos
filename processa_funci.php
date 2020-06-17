

<?php

session_start();
 // se vier um pedido para login 
 if (!empty($_POST)) {
 
	// estabelecer ligação com a base de dados 
	include "banco_restaurante.php";
	
$login = mysql_real_escape_string($_POST['login_funci']);
$senha = ($_POST['senha_funci']);
//$idFunci = ($_POST['id_funci']);
//$perfil = ($_POST['perfil']);

$result=mysql_query ("SELECT id_funci,login_funci,perfil FROM garcom WHERE login_funci = '$login' AND senha_funci = '$senha'");
if($row=mysql_fetch_row($result)){
	//if($perfil[2]=='1'){
	  session_start();
	  $_SESSION['id_funci']=$row[0];
	  $_SESSION['login_funci']=$row[1];
	  $_SESSION['perfil']=$row[2];
	   if($_SESSION['perfil']=='Garcom'){
			header('Location:area3.php');
			 }elseif($_SESSION['perfil']=='Gerente'){
			header('Location:area2.php');
		}elseif($_SESSION['perfil']=='admin')
			header('Location:area_pro.php');
	
}else{
		header('Location:login_funci.php?msg=O usuario não esta ativo contate o administrador: admin@dominio.com.br');
	}
  }else{
	header('Location:login_funci.php?msg=usuario invalido');
}


?>