<?php

require"veriLogPro.php";
?>
<html>
<head>
	    <link rel="stylesheet" type="text/css"  href="css/css.css" />

</head>
<body background="imagem/.jpg">
<h2>Acesso Proibido!</h2>
<p>   <u>  <?php echo $_SESSION['login_funci']; ?></u> Esta páigina só podera ser acessado com seu login</p>
<br>
<p class="but" > <a href="area_pro.php">OK</a></p>