<!DOCTYPE html>
<html lang="pt">
<head>
<link rel="stylesheet" href="style.css">

<link href="https://fonts.googleapis.com/css?family=Manrope" rel="stylesheet">

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<title>Interface</title>
</head>
<body>
<form>
<?php
  
  // Essa página ira coletar o valor do status que o usuário deseja exibir e enviará para a pagina interface.php
  
  echo '<form action="catalogo.php" method="post">';
    echo '<div class = "center_images">';
  	echo '<h1>Escolha qual categoria deseja deseja exibir</h1><br>';
  	echo '<label for="categoria">Exibir itens da categoria: </label>';
  		echo '<select name="categoria" id="categoria">';
  		echo '<option value="Todos">Exibir de todas as categorias</option>';
  		echo '<option value="Bolo de Casamento">Bolo de Casamento</option>';
    	echo '<option value="Bolo de Aniversário">Bolo de Aniversário';
    	echo '<option value="Bolo Confeitado">Bolo Confeitado</option>';
    	echo '<option value="Torta">Torta</option>';
  		echo '</select>';
  	echo '<br><br>';
  	echo '<button type="submit" formaction="catalogo.php" class = "button">Escolher</button><br><br>';
    echo '<button type="submit" formaction="index.html" class = "button">Início</button>';
	echo '</div>';
?>
</form>
</body>
</html>