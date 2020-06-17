<!doctype html>
<html lang="en">
<?php
include 'banco_restaurante.php';
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Selectable - Display as grid</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
   <script src="jquery-ui-1.12.1.custom/jquery-1.12.4.js"></script>
  <script src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>
  <style>
  #feedback { font-size: 1.4em; }
  #idMesas .ui-selecting { background: #FECA40; }
  #idMesas .ui-selected { background: #F39814; color: white; }
  #idMesas { list-style-type: none; margin: 0; padding: 0; width: 450px; }
  #idMesas li { margin: 3px; padding: 1px; float: left; width: 100px; height: 80px; font-size: 4em; text-align: center; }
  </style>
  <script>
  $( function() {
    $( "#idMesas" ).selectable();
  } );
  </script>
</head>
<BR>
<BR>
<BR>
<body>
 <center>
<?php
   $queryMesas = "select *from mesas order by idMesas";
   $resultF = mysql_query($queryMesas) or die (mysql_error());
 ?>
 <label>Mesa:</label>
<select name="idMesas" type="file" class="ui-state-default">
 <?php 
 while ($row = mysql_fetch_array($resultF)) {
?>
<option value="<?php echo $row['idMesas'];?> "> <?php echo $row['imagem']; ?></option> 
 <?php } ?> 
 </select>
 
  </center>

</body>
</html>