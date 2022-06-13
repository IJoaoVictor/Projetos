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
  
  	// Obtendo o valor do ID que foi enviado pela URL
  	$id = $_GET["id"];
  	
  	// Criando cookie que irá conter o ID selecionado para ser lido em update_bolo.php 
  	$nome = "ID";
  	$valor = $_GET["id"];
	$expira = time() + 3600;
	setcookie($nome, $valor, $expira);
  
  	// Exibindo as informações do item escolhido

    $sql = "SELECT id, nome_foto, nome, descricao, categoria, valor, num_fatias, data_inclusao FROM bolo WHERE id=$id";
  	$result = mysqli_query($conn, $sql);
    
    while ($row = mysqli_fetch_assoc($result)) {
      
      echo '<div class="center_images">';
 
	  echo "<h1> Item: " . $row["nome"] . "</h1><br>";
      
      echo "<img src= bolos/" . $row["nome_foto"] . " width='400' height='350'><br><br>";
  	  echo '<label> Descrição do item: '.$row["descricao"].'</label><br>';
  	  echo '<label> Categoria do item: '.$row["categoria"].'</label><br>';
  	  echo '<label> Valor do item: R$'.$row["valor"].'</label><br>';
  	  echo '<label> Número de fatias do item: '.$row["num_fatias"].'</label><br>';
  	  echo '<label> Data de inclusão do item: '.$row["data_inclusao"].'</label><br><br>';
      
      echo "<a href=delete.php?id=$id> <button class = 'button' > Deletar item </button></a><br><br>";
      echo '</div>';
    }
  // Abaixo o boleiro irá inserir os novos dados do pedido
?>
<form action="update.php" action="select_categoria.php" method="post" enctype="multipart/form-data">
    
    <div class = "center_button">
      <h1> Especificações do item </h1>
    </div><br>
    
    <div class = "center_button">
      
        <h2> Selecione um arquivo para fazer upload </h2><br>
      	<input type="file" name="fileToUpload" id="fileToUpload"><br><br>

        <label> Nome do item </label><br><br>
        <input type="text" name="nome" id="nome" placeholder = "Digite"><br><br>
    
    	<label> Descrição do item  </label><br><br>
        <textarea id="descricao" name="descricao" placeholder = "Digite" rows="4" cols="50"></textarea><br><br>
      
      	<label for="categoria">Categoria do item </label><br><br>
        	<select name="categoria" id="categoria">
        		<option value="Bolo de Casamento">Bolo de Casamento</option>
        	    <option value="Bolo de Aniversário">Bolo de Aniversário</option>
    		    <option value="Bolo Confeitado">Bolo Confeitado</option>
    		    <option value="Torta">Torta</option>
        	</select>
        	<br><br>
      
        <label> Valor do item </label><br><br>
        <input type="text" name="valor" id="valor" placeholder = "Digite"><br><br>

    	<label>Número de fatias que o item será dividido </label><br><br>
        <input type="text" name="num_fatias" id="num_fatias" placeholder = "Digite"><br><br>  
           
    	<div class="buttons">
      		 <button type='submit' formaction='update_bolo.php' class = 'button'>Atualizar item</button>
    	</div><br>
      
    </div>
    
<div class = "center_images">
    <button type="submit" formaction="select_categoria.php" class = "button">Retornar</button>
    <button type="submit" formaction="index.html" class = "button">Início</button><br>
</div>
</form>
</body>
</html>