
<html>
<head>
	<title>J.T restaurant</title>
		<meta charset="utf-8">

	<link rel="stylesheet" media="screen" href="css/screen.css">
	<script src="js/jquery.js"></script>
	<script src="js/jquery.validate.js"></script>
	<script>
	$(function() {
		// highlight
		var elements = $("input[type!='submit'], textarea, select");
		elements.focus(function() {
			$(this).parents('li').addClass('highlight');
		});
		elements.blur(function() {
			$(this).parents('li').removeClass('highlight');
		});

		$("#forgotpassword").click(function() {
			$("#password").removeClass("required");
			$("#login").submit();
			$("#password").addClass("required");
			return false;
		});

		$("#login").validate()
	});
	</script>
</head>
<body>
<div id="page">
	<div id="header">
		<h1>Área Administrativa</h1>
	</div>
	<div id="content">
		<p id="status"></p>
		<form action="proceLogGe.php" method="POST" id="login">
			<fieldset>
				<ul>
					<li>
									<legend>Login do Gerente!</legend>
<center>
<img src="imagem/ftgerente.png"  width="70px" height="75px"/>
</center>
<br>
								<label for="login">
					<span class="required">USUÁRIO</span>
						</label>
						<input name="login" type="text" class="text required login" id="login" minlength="4" maxlength="20">
					</li>
					<li>
						<label for="senha">
							<span class="required">SENHA</span>
						</label>
						<input name="senha" type="password" class="text required senha" id="senha" minlength="4" maxlength="20">
					</li>
					<li>
						<label class="centered info"><a id="forgotpassword" href="#">login my senha...</a>
						</label>
					</li>
				</ul>
			</fieldset>
			<fieldset class="submit">
				<input type="submit" class="button" value="Enviar...">
			</fieldset>
			<div class="clear"></div>
		</form>
	</div>
</div>
</body>
</html>
