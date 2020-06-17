<?php
//iniciar uma sessao
session_start();

if(empty ($_SESSION['usuario'] )) {

	// nao existe sessao iniciada
	//neste caso, levamos o utilizador para a patina de login
	header('Location:usuario.php');
	exit();
}
?>