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
      $sql = "SELECT id, nome, email, telefone, mensagem, tipobolo, status_pedido, num_fatias, data_pedido, categoria, valor FROM infobolo ORDER BY id";
    
    // Caso a exibição seja um status específico
    } else if ($status_pedido != "Todos") { 
      $sql = "SELECT id, nome, email, telefone, mensagem, tipobolo, status_pedido, num_fatias, data_pedido, categoria, valor FROM infobolo WHERE status_pedido='$status_pedido' ORDER BY id";}
  
  	$result = mysqli_query($conn, $sql);
  
  	if (mysqli_num_rows($result) == 0) {
    echo '<div class="center">';
    echo "<label>Não há nenhum pedido com esse status</label><br>";
    echo '</div>';}

    while ($row = mysqli_fetch_assoc($result)) {
      
      echo '<div class="center_images">';
      
      $id = $row["id"];
	  
      echo "<h1>Ordem do pedido: " . $row["id"]. "</h1>";
      echo '<div class="center_images">';
      echo '<br>' . $msg . '<br>';
  
  	  echo '<label> Bolo escolhido: '.$row["tipobolo"].'</label><br>';
  	  echo '<label> Preço total: R$'.$row["valor"].'</label><br>';
  	  echo '<label> Número de fatias: '.$row["num_fatias"].'</label><br>';
  	  echo '<label> Seu recado: '.$row["mensagem"].'</label><br><br>';
  	  echo '<label> Data do pedido: '.$row["data_pedido"].'</label><br>';
      echo '<label> Status atual: '.$row["status_pedido"].'</label><br><br>';
    
  	  echo '<label> Nome: '.$row["nome"].'</label><br>';
      echo '<label> Telefone: '.$row["telefone"].'</label><br>';
      echo '<label> E-mail: '.$row["email"].'</label><br>';
      echo '<label> Recado: '.$row["mensagem"].'</label><br>';
      echo '</div><br>';
		
      // Após o usuário escolher qual pedido ele deseja atualizar, o valor do ID do pedido será coletado pelo link para a outra página   
      echo "<a href=updatepedido.php?id=$id> <button class = 'button' > Atualizar pedido </button></a>";
            
      echo "</div><br>";
    }
?>
<form action="index.html" action = "selectpedido.php" method="post">
<div class = "center_images">
    <button type="submit" formaction="selectpedido.php" class = "button">Voltar</button>
    <button type="submit" formaction="index.html" class = "button">Início</button>
</div><br>
</form>
</body>
</html>