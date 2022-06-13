<!DOCTYPE html>
<html lang="pt">
<head>
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Manrope" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<html>
<title>Interface</title>
  <div class = "center_images">
    <h1> Pedidos registrados </h1><br> 
  </div>
<body>

<?php

    include 'connect.php';

	// Obtendo o valor do status escolhido na página anterior para exibir 
  
  	$status_pedido = $_GET["status"];
  	
  	// Caso a exibição seja para todos os pedidos
  	if ($status_pedido == "Todos"){
      $sql = "SELECT id, nome, email, telefone, zap, msg1, msg2, msg3, msg4, msg5, status_pedido FROM infobolo ORDER BY id";
    
    // Caso a exibição seja para pedidos com um status específico
    } else if ($status_pedido != "Todos") { 
      $sql = "SELECT id, nome, email, telefone, zap, msg1, msg2, msg3, msg4, msg5, status_pedido FROM infobolo WHERE status_pedido='$status_pedido' ORDER BY id";}
  
  	$result = mysqli_query($conn, $sql);
  
  	if (mysqli_num_rows($result) == 0) {
    echo '<div class="center_images">';
    echo "<label>Não há nenhum pedido com esse status</label><br>";
    echo '</div><br>';}

    while ($row = mysqli_fetch_assoc($result)) {
      
      echo '<div class="center_images">';
      
      $id = $row["id"];
	  
      echo "<h2>Ordem do pedido: " . $row["id"]. "</h2><br>";
      echo '<div class="center_images">';
  
  	  echo '<label> Nome: '.$row["nome"].'</label><br>';
  	  echo '<label> E-mail: '.$row["email"].'</label><br>';
  	  echo '<label> Telefone: '.$row["telefone"].'</label><br>';
  	  echo '<label> WhatsApp: '.$row["zap"].'</label><br>';
      echo '<label> Status atual: '.$row["status_pedido"].'</label><br><br>';
      
      // Após o boleiro escolher qual pedido ele deseja atualizar, o valor do ID do pedido será enviado pelo link para a seguinte página   
      
      echo "<a href=select_pedido_info.php?id=$id> <button class = 'button' > Ver pedido </button></a>";            
      echo "</div><br>";
    }

?>
<form action="index.html" action = "select_categoria_pedido.php" method="post">
<div class = "center_images">
    <button type="submit" formaction="select_categoria_pedido.php" class = "button">Voltar</button>
    <button type="submit" formaction="index.html" class = "button">Início</button>
</div><br>
</form>
</body>
</html>