<!DOCTYPE html>
<html lang="pt">
<head>
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css?family=Manrope" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<html>
<title>Catálogo</title>
<body>
  <div class="center_images">
    <h1>Nosso catálogo de <span style="color:FFAEBC;">itens</span></h1><br>
    <label>Após escolher o bolo desejado, clique em <span style="color:FFAEBC;">Continuar</span> para prosseguir com o seu pedido</label>
  </div><br>
<?php

    include 'connect.php';

	// Obtendo o valor do status escolhido na página anterior para exibir 
  
  	$categoria = $_GET["categoria"];
  	
  	// Caso a exibição seja para todos os itens
  	if ($categoria == "Todos"){
      $sql = "SELECT id, nome_foto, nome, descricao, categoria, valor, num_fatias, data_inclusao FROM bolo ORDER BY id";
    
    // Caso a exibição seja para itens de uma categoria específica
    } else if ($categoria != "Todos") { 
      $sql = "SELECT id, nome_foto, nome, descricao, categoria, valor, num_fatias, data_inclusao FROM bolo WHERE categoria='$categoria' ORDER BY id";}
  
  	$result = mysqli_query($conn, $sql);
  
  	if (mysqli_num_rows($result) == 0) {
    echo '<div class="center_images">';
    echo "<label>Não há nenhum item com essa categoria</label><br>";
    echo '</div><br>';}

    while ($row = mysqli_fetch_assoc($result)) {
      
      echo '<div class="center_images">';
      
      $id = $row["id"];
	  
      echo "<h2> Item: " . $row["nome"] . "</h2><br>";
      echo '<div class="center_images">';
      
      echo "<img src= /crud_boleiro/bolos/" .$row["nome_foto"]. " width='400' height='350'><br><br>";
  	  echo '<label> Descrição do item: '.$row["descricao"].'</label><br>';
  	  echo '<label> Categoria do item: '.$row["categoria"].'</label><br>';
  	  echo '<label> Valor do item: R$'.$row["valor"].'</label><br>';
  	  echo '<label> Número de fatias do item: '.$row["num_fatias"].'</label><br>';
  	  echo '<label> Data de inclusão do item: '.$row["data_inclusao"].'</label><br>';
      echo '</div><br>';
		
      // Após o usuário escolher qual item ele deseja, o valor do ID do item será enviado pelo link e coletado na página seguinte   
      echo "<a href=pedido_info.php?id=$id> <button class = 'button' > Escolher item </button></a>";
            
      echo "</div><br>";
    }
?>
<form action="index.html" action = "escolher_categoria.php" method="post">
<div class = "center_images">
    <button type="submit" formaction="escolher_categoria.php" class = "button">Voltar</button>
    <button type="submit" formaction="index.html" class = "button">Início</button>
</div><br>
</form>
</body>
</html>