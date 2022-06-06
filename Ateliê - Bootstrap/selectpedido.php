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
  
  echo '<form action="interface.php" method="post">';
    echo '<div class = "center_images">';
  	echo '<h1>Escolha quais pedidos deseja exibir</h1><br>';
  	echo '<label for="status">Exibir pedidos com status: </label>';
  		echo '<select name="status" id="status">';
  		echo '<option value="Todos">Exibir todos os pedidos</option>';
  		echo '<option value="Novo">Novo</option>';
    	echo '<option value="Visto">Visto</option>';
    	echo '<option value="Em atendimento">Em atendimento</option>';
    	echo '<option value="Finalizado">Finalizado</option>';
    	echo '<option value="Cancelado">Cancelado</option>';
    	echo '<option value="Lixo">Lixo</option>';
  		echo '</select>';
  	echo '<br><br>';
  	echo '<button type="submit" formaction="interface.php" class = "button">Escolher</button><br><br>';
    echo '<button type="submit" formaction="index.html" class = "button">Início</button>';
	echo '</div>';
?>
</form>
</body>
</html>