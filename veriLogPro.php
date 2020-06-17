<?php
//iniciar uma sessao
session_start();

if($_SESSION['perfil']!='admin') {

	// nao existe sessao iniciada
	//neste caso, levamos o utilizador para a patina de login
	header('Location:login_funci.php');
	exit();
}
?>