<!DOCTYPE html>
<html lang="pt">
<head>
<link rel="stylesheet" href="style.css">

<link href="https://fonts.googleapis.com/css?family=Manrope" rel="stylesheet">

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Detalhes do pedido</title>
</head>
<body>

<?php

    include 'connect.php';
  
  	// Pega o valor do ID que foi enviado pela URL
  	$id = $_GET["id"];
  	
  	// Criando cookie que irá conter o ID selecionado para ser lido em update.php 
  	$nome = "ID";
  	$valor = $_GET["id"];
	$expira = time() + 3600;
	setcookie($nome, $valor, $expira);
  
  	// Exibindo as informações do pedido escolhido

    $sql = "SELECT id, nome, email, telefone, mensagem, tipobolo, status_pedido FROM infobolo WHERE id=$id";
  	$result = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_assoc($result)) {
      
      echo '<div class="center_images">';
 
      echo "<h1>Ordem do pedido: " . $row["id"]. "</h1><br>";
      echo '<label> Nome: '.$row["nome"].'</label><br>';
      echo '<label> Bolo escolhido: '.$row["tipobolo"].'</label><br>';
      echo '<label> Recado: '.$row["mensagem"].'</label><br>';
      echo '<label> Status atual: '.$row["status_pedido"].'</label><br><br>';
      echo "<a href=delete.php?id=$id> <button class = 'button' > Deletar pedido </button></a><br><br>";
      echo '</div>';
      
      echo '<form action="update.php" action = "delete.php" method="post">';
      echo '<div class = "center_images">';
      
      echo '<label for="status_pedido">Alterar status do pedido para: </label><br><br>';
        	echo '<select name="status_pedido" id="status_pedido">';
        	echo '<option value="Novo">Novo</option>';
        	echo '<option value="Visto">Visto</option>';
    		echo '<option value="Em atendimento">Em atendimento</option>';
    		echo '<option value="Finalizado">Finalizado</option>';
    		echo '<option value="Cancelado">Cancelado</option>';
    		echo '<option value="Lixo">Lixo</option>';
        	echo '</select>';
        	echo '<br><br>';
      
      // O forms enviará o status selecionado para update.php
      
      echo "<button type='submit' formaction='update.php' class = 'button'>Atualizar status do pedido</button>";      
      echo '</div>';
            
      echo "</div>" . "<br><br>";    
    }
?>
<form action="update.php" action="interface.php" method="post">
<div class = "center_images">
    <button type="submit" formaction="index.html" class = "button">Início</button><br>
    <button type="submit" formaction="interface.php" class = "button">Voltar para lista de pedidos</button>
</div>
</form>
</body>
</html>