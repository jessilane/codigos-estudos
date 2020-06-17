<?php
 include "banco_restaurante.php";
?>
<?php
	include ('pdf/mpdf.php');

	$pagina = 
     "<html>
	 
	
	 <bady>
	       <h1>J.T restaurat </h1>
		  
		   <ul>
		   <li> </li>
		   
		   </ul>
	 
	 
	 
	 
	 
	 	 </bady>

	 </html>
	 "
$arquivo = "Cadastro01.pdf";

$mpdf = new mPDF();
$mpdf->WriteHTML($pagina);

$mpdf->Output($arquivo, 'I');

// I - Abre no navegador
// F - Salva o arquivo no servido
// D - Salva o arquivo no computador do usuário
?>

