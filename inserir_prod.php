
<?php
include 'banco_restaurante.php';

$nome_prod  = $_POST ['nome_prod'];
$porcao  = $_POST ['porcao'];
$valor  = $_POST ['valor'];
$categoria  = $_POST ['categoria'];
$quantEstoque  = $_POST ['quantEstoque'];
$imagem = $_FILES['imagem'];
 $destino = "imagem/";
 $arquivo = basename($imagem['name']);
 $destino = $destino.$arquivo;
if(move_uploaded_file($imagem['tmp_name'],$destino)){	

	 mysql_query("INSERT INTO produto(id_produto,nome_prod,porcao,valor,categoria,quantEstoque,imagem) VALUES (null,'$nome_prod','$porcao','$valor','$categoria','$quantEstoque','$destino')") or die ("Não inseriu");
 echo "<script> window.location=\"lista_prod.php\"</script>";
 
}else{
 echo "<meta charset=UTF-8> <script> alert('Ocorreu um erro. preencha todos os CAMPOS corretamente') </script>";
		  echo "<script>window.location=\"i_produto.php\"</script>";


}
?>